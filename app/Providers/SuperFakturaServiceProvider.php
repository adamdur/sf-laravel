<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SuperFaktura\ApiClient\ApiClient;
use SuperFaktura\ApiClient\Authorization\SimpleProvider;
use SuperFaktura\ApiClient\MarketUri;

class SuperFakturaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('apiClientFactory', function ($app) {
            return function ($credentials = []) {
                $mail = $credentials['mail'] ?? env('SF_MAIL');
                $apiKey = $credentials['api_key'] ?? env('SF_API_KEY');
                $appTitle = $credentials['app_title'] ?? env('SF_APP_TITLE');
                $companyId = $credentials['company_id'] ?? env('SF_COMPANY_ID');

                return new ApiClient(
                    new SimpleProvider($mail, $apiKey, $appTitle, $companyId),
                    MarketUri::SLOVAK_SANDBOX // Adjust as necessary
                );
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
