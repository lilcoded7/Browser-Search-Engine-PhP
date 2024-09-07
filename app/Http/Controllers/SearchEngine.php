<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SearchEngine extends Controller

{   
    public function getsearchData(Request $request){
        $endpoint = 'http://127.0.0.1:7000/api/search/browser/';
        $response = Http::get($endpoint, [
            'query' => 'Ai',
            'type' => 'image',
            'region' => 'wt-wt',
            'safesearch' => 'off',
            'timelimit' => 'y',
            'max_results' => 10,
        ]);

        Log::info('API response: ' . $response->body());
        return $response->body();
    }


    public function searchBrowser(Request $request)
    {
        $query = $request->input('searContent');
        Log::info('User search query: ' . $query);

        if (empty($query)) {
            $data = [];
            $error = 'Please enter a search query.';
        } else {
            $endpoint = 'http://127.0.0.1:7000/api/search/browser/';
            
            try {
                $response = Http::get($endpoint, [
                    'query' => $query,
                    'type' => 'image',
                    'region' => 'wt-wt',
                    'safesearch' => 'off',
                    'timelimit' => 'y',
                    'max_results' => 50,
                ]);

                Log::info('API response: ' . $response->body());

                if ($response->successful()) {
                    $data = $response->json();
                    $error = null;
                } else {
                    $data = [];
                    $error = 'Failed to fetch results.';
                }
            } catch (\Exception $e) {
                $data = [];
                $error = 'An error occurred: ' . $e->getMessage();
            }
        }

        return view('browser', ['data' => $data, 'error' => $error]);
    }
}
