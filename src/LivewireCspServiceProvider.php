<?php

namespace WillSho1\CspHelper;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireCspServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 1. Tell Laravel where to find this package's views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'csp-helper');

        // 2. Register our custom Blade directive
        Blade::directive('livewireCspScripts', function ($expression) {
            // Pass expressions (like nonce) to the view
            return "<?php echo view('csp-helper::scripts', ['expression' => {$expression}])->render(); ?>";
        });
    }
}