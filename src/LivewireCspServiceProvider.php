<?php

namespace WillSho1\CspHelper;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireCspServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 1. Tell Laravel where to find this package's views
        $viewsPath = realpath(__DIR__.'/../resources/views');
        $this->loadViewsFrom($viewsPath, 'csp-helper');

        // 2. Register our custom Blade directive
        Blade::directive('livewireCspScripts', function ($expression) {
            // Pass expressions (like nonce) to the view
            $expression = empty($expression) ? '[]' : $expression;
            return "<?php echo view('csp-helper::scripts', ['expression' => {$expression}])->render(); ?>";
        });
    }
}