<?php

if (!function_exists('ratting')) {
    /**
     * undocumented function summary.
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    function ratting($value)
    {
        if ($value == 0) {
            return ['color' => 'danger-dk', 'rate' => 'Poor', 'bg' => '#f92718'];
        }
        switch ($value) {
            case $value >= 85.643:
                return ['color' => 'success-dk', 'rate' => 'Excellent', 'bg' => '#3fa343'];
                break;
            case $value >= 71.286:
                return ['color' => 'primary-dk', 'rate' => 'Good', 'bg' => '#3345a8'];
                break;
            case $value >= 56.929:
                return ['color' => 'info-dk', 'rate' => 'Average', 'bg' => '#078bf4'];
                break;
            case $value >= 42.57:
                return ['color' => 'warning-dk', 'rate' => 'Fair', 'bg' => '#ecb100'];
                break;
            default:
                return ['color' => 'danger-dk', 'rate' => 'Poor', 'bg' => '#f92718'];
                break;
        }
    }
}
if (!function_exists('isActive')) {
    /**
     * Set the active class to the current opened menu.
     *
     * @param string|array $route
     * @param string       $className
     *
     * @return string
     */
    function isActive($route, $className = 'active')
    {
        $check = function ($route) use ($className) {
            if (request()->path() == $route) {
                return $className;
            }
            if (request()->is($route)) {
                return $className;
            }
        };
        if (is_array($route)) {
            foreach ($route as $value) {
                $test = $check($value);
                if ($test != null) {
                    return $test;
                }
            }

            return;
        }

        return $check($route);
    }//end isActive()
}//end if
