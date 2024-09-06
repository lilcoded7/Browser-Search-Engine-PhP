<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchEngine extends Controller
{
    public function searchBrowser(Request $request)
{
    // Retrieve the user's input
    $query = $request->input('searContent');

    if (empty($query)) {
        $data = [];
        $error = 'Please enter a search query.';
    } else {
        $endpoint = 'http://127.0.0.1:8000/api/search/browser/';
        
        $response = Http::get($endpoint, [
            'query' => $query,
            'type' => 'image',
            'region' => 'wt-wt',
            'safesearch' => 'off',
            'timelimit' => 'y',
            'max_results' => 10,
        ]);
        
        if ($response->successful()) {
            $data = $response->json() ?? [];
            echo $data;
            $error = null;
        } else {
            $data = [];
            $error = 'Failed to fetch results.';
        }
    }

    $data = 'none';
    return view('search.results_partial', ['data' => $data, 'error' => $error]);
}

}
