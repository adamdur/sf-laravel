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
            try {
                $apiClientFactory = app('apiClientFactory');
                $api = $apiClientFactory($request->only(['mail', 'api_key', 'app_title', 'company_id']));
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
