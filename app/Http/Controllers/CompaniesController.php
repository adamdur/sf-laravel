<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SuperFaktura\ApiClient\ApiClient;
use Throwable;

class CompaniesController extends Controller
{
    public function show(Request $request)
    {
        $response = null;
        $error = null;

        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'mail' => 'nullable|email',
                'api_key' => 'nullable|string',
                'app_title' => 'nullable|string',
                'company_id' => 'nullable|numeric',
            ]);
            try {
                $apiClientFactory = app('apiClientFactory');
                $api = $apiClientFactory($validatedData);
                $response = $api->companies->getAll();
            } catch (Throwable $e) {
                $error = $e->getMessage();
            }
        }

        return view('companies', [
            'response' => $response,
            'error' => $error,
            'formData' => $request->except('_token'),
        ]);
    }
}
