@extends('layout')

@section('content')
    <div class="w-full px-6 mx-auto bg-white">
        <h2 class="text-2xl font-semibold text-center text-gray-700">API Credentials</h2>
        @if($error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4" role="alert">
                <strong class="font-bold">Uff!</strong>
                <span class="block sm:inline">{{ $error }}</span>
            </div>
        @endif
        <form action="{{ route('companies') }}" method="POST" class="flex flex-wrap -mx-3 mb-6">
            @csrf
            <div class="w-full px-3 mb-6 md:mb-0">
                <label for="api_key" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">API Key</label>
                <input value="{{ old('api_key', $formData['api_key'] ?? '') }}" type="text" name="api_key" placeholder="Enter API key" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="mail" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Mail</label>
                <input value="{{ old('mail', $formData['mail'] ?? '') }}" type="email" name="mail" placeholder="Enter your e-mail" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="app_title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">App Title</label>
                <input value="{{ old('app_title', $formData['app_title'] ?? '') }}" type="text" name="app_title" placeholder="Enter your App title" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="company_id" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Company ID</label>
                <input value="{{ old('company_id', $formData['company_id'] ?? '') }}" type="number" min="1" name="company_id" placeholder="Enter your Company ID" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="w-full px-3 mb-6 md:mb-0">
                <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                    Try API
                </button>
                <p class="text-xs text-center text-gray-600 mt-1">
                    Input your SF credentials to test API with those credentials or simply hit the <strong><u>Try API</u></strong>
                    button and test API with credentials from .env file.
                </p>
            </div>
        </form>
    </div>
    @if($response)
        <div class="w-full px-6 mx-auto bg-white">
            <hr class="h-px my-8 bg-gray-300 border-0 dark:bg-gray-700">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">API Response</h2>
            <pre class="bg-gray-100 p-3 rounded text-sm">{{ json_encode($response, JSON_PRETTY_PRINT) }}</pre>
        </div>
    @endif
@endsection
