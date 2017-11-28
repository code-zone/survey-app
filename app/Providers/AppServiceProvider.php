<?php

namespace App\Providers;

use App\Entities\Project;
use Illuminate\Support\Str;
use App\Support\URLGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            /*
             * add @shield and @endshield to blade compiler
             */
            $bladeCompiler->directive('shield', function ($expression) {
                return "<?php if(auth()->user()->hasPermission({$this->stripParentheses($expression)})): ?>";
            });

            $bladeCompiler->directive('endshield', function ($expression) {
                return '<?php endif; ?>';
            });

            /*
             * add @is and @endis to blade compiler
             */
            $bladeCompiler->directive('is', function ($expression) {
                return "<?php if(auth()->user()->isAn({$this->stripParentheses($expression)})): ?>";
            });

            $bladeCompiler->directive('endis', function ($expression) {
                return '<?php endif; ?>';
            });
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton('url.generator', function () {
            return new URLGenerator(new Project());
        });
    }

    /**
     * Strip the parentheses from the given expression.
     *
     * @param string $expression
     *
     * @return string
     */
    private function stripParentheses($expression)
    {
        if (Str::startsWith($expression, '(')) {
            $expression = substr($expression, 1, -1);
        }
        if (Str::startsWith($expression, '[')) {
            $expression = substr($expression, 1, -1);
        }

        return $expression;
    }
}
