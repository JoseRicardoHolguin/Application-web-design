<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OpenAIImageAnalysisService
{
    public function analyzeImage(string $imagePath): string
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

        $config = config('services.openai');
        if (empty($config['api_key'])) {
            Log::error('OpenAI API key missing or empty');
            return "Análisis IA no disponible - configura OPENAI_API_KEY en .env.";
        }

        // Convert image to base64
        $imageBase64 = base64_encode($imageData);
        $mimeType = $this->getMimeType($imagePath);
        
        $payload = [
            'model' => $config['model'],
            'messages' => [
                [
                    'role' => 'user',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Describe esta imagen en español de forma breve y concisa. Enfócate en los elementos principales que serían relevantes para un ticket de soporte técnico.'
                        ],
                        [
                            'type' => 'image_url',
                            'image_url' => [
                                'url' => "data:{$mimeType};base64,{$imageBase64}"
                            ]
                        ]
                    ]
                ]
            ],
            'max_tokens' => 150,
            'temperature' => 0.7
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $config['api_key'],
            'Content-Type' => 'application/json',
        ])->timeout(120)
          ->post($config['endpoint'], $payload);

        if ($response->successful()) {
            $result = $response->json();
            $analysis = $result['choices'][0]['message']['content'] ?? null;
            if ($analysis && trim($analysis) !== '') {
                Log::info('OpenAI analysis success', ['analysis' => $analysis, 'model' => $config['model']]);
                return "🤖 IA (OpenAI): " . trim($analysis);
            }
        }

        Log::error('OpenAI API failed', [
            'status' => $response->status(),
            'response' => $response->body(),
            'model' => $config['model']
        ]);
        
        return "Análisis IA temporalmente no disponible. Verifica logs para detalles.";
    }

    private function getMimeType(string $imagePath): string
    {
        $extension = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'bmp' => 'image/bmp'
        ];

        return $mimeTypes[$extension] ?? 'image/jpeg';
    }
}
