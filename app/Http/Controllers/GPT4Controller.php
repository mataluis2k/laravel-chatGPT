<?php

namespace App\Http\Controllers;

use App\Services\GPT4Service;
use Illuminate\Http\Request;

class GPT4Controller extends Controller
{
    private $gpt4Service;

    public function __construct(GPT4Service $gpt4Service)
    {
        $this->gpt4Service = $gpt4Service;
    }

    public function generate(Request $request)
    {
        $generatedText = $this->gpt4Service->generateText($request->input('prompt'));
        return view('generated', compact('generatedText'));
    }
}