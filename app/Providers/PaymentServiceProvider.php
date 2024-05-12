<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PaymentService;

class PaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('payment', function () {
            return new PaymentService(); 
        });
    }
}
