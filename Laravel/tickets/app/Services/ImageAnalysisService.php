<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageAnalysisService
{
    public function analyzeImage(string $imagePath): string
    {
        // Primero intentar con HuggingFace
        $hfResult = $this->tryHuggingFace($imagePath);
        if ($hfResult && !str_contains($hfResult, 'no disponible')) {
            return $hfResult;
        }

        // Si HuggingFace falla, intentar con OpenAI
        $openaiResult = $this->tryOpenAI($imagePath);
        if ($openaiResult && !str_contains($openaiResult, 'no disponible')) {
            return $openaiResult;
        }

        return "IA no disponible";
    }

    private function tryHuggingFace(string $imagePath): ?string
    {
        if (!Storage::disk('public')->exists($imagePath)) {
            Log::warning('Image file not found in storage', ['path' => $imagePath]);
            return "Imagen no encontrada para análisis.";
        }

        $imageData = Storage::disk('public')->get($imagePath);
        if (empty($imageData)) {
            Log::error('Cannot read image file from storage', ['path' => $imagePath]);
            return "No se puede leer el archivo de imagen.";
        }

        $config = config('services.huggingface');
        if (empty($config['token'])) {
            Log::warning('HuggingFace token missing');
            return null;
        }

        $imageBase64 = base64_encode($imageData);
        $payload = ['inputs' => $imageBase64];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $config['token'],
            'Content-Type' => 'application/json',
        ])->timeout(60)
          ->post($config['endpoint'], $payload);

        if ($response->successful()) {
            $result = $response->json();
            $analysis = $result[0]['generated_text'] ?? null;
            if ($analysis && trim($analysis) !== '') {
                Log::info('HuggingFace analysis success', ['analysis' => $analysis, 'model' => $config['model']]);
                return "🤖 IA (HF): " . $analysis;
            }
        }

        Log::warning('HuggingFace API failed', [
            'status' => $response->status(),
            'model' => $config['model']
        ]);
        
        return null;
    }

    private function tryOpenAI(string $imagePath): ?string
    {
        $config = config('services.openai');
        if (empty($config['api_key'])) {
            Log::warning('OpenAI API key missing');
            return null;
        }

        try {
            $openaiService = new OpenAIImageAnalysisService();
            return $openaiService->analyzeImage($imagePath);
        } catch (\Exception $e) {
            Log::error('OpenAI service failed', ['error' => $e->getMessage()]);
            return null;
        }
    }
}

