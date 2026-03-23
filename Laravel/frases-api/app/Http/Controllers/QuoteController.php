<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return Quote::all();
    }

    public function store(Request $request)
    {
        $quote = Quote::create($request->all());
        return response()->json($quote, 201);
    }

    public function show($id)
    {
        return Quote::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->update($request->all());

        return response()->json($quote);
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return response()->json(['message' => 'Quote deleted']);
    }
}