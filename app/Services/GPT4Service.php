<?php

namespace App\Services;

use GuzzleHttp\Client;

class GPT4Service
{
    private $client;
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GPT_4_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
                         ],
             ]);
    }
  
      
    public function generateText(string $prompt, int $maxTokens = 50)
    {
        $response = $this->client->post('chat/completions', [
            'json' => [
                'model' => "gpt-3.5-turbo", // Here you can select from the following models : gpt-4, gpt-4-0314, gpt-4-32k, gpt-4-32k-0314, gpt-3.5-turbo, gpt-3.5-turbo-0301 
                'messages' => [ 
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],                
                'max_tokens' => $maxTokens,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);     
        return  $responseData['choices'][0]['message']['content'];
    }
}
