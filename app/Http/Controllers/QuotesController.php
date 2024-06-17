<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\QuoteModel;

class QuotesController extends Controller
{
    //
    public function index()
    {
        $data = $this->getQuotes();
        return view('quotes', compact('data'));
    }
    public function showEditor()
    {
        return view('quote.new');
    }
    public function getUserQuotes()
    {
        $Quotes = QuoteModel::all();
        return view('quote.list', ['Quotes' => $Quotes]);
    }
    public function getQuotes()
    {
        $response = Http::withOptions(['verify' => false])->get('https://api.quotable.io/quotes/random');
        if ($response->successful()) {
            $data = $response->json();
            return  $data;
        }
        return [];
    }
    public function createQuote(Request $req)
    {
        $validatedData = $req->validate([
            'content' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $content = $validatedData['content'];
        $author = $validatedData['author'];
        $len = Str::length($content);
        $quote = QuoteModel::create([
            'content' => $content,
            'length' => $len,
            'author' => $author,
        ]);

        if (!$quote) {
            return back()->with(['message' => 'An error has occurred.']);
        }
        return back()->with(['message' => 'Quote created successfully']);
    }
}
