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
            case $value >= 80:
                return ['color' => 'success-dk', 'rate' => 'Excellent', 'bg' => '#3fa343'];
                break;
            case $value >= 60:
                return ['color' => 'primary-dk', 'rate' => 'Very Good', 'bg' => '#3345a8'];
                break;
            case $value >= 40:
                return ['color' => 'info-dk', 'rate' => 'Good', 'bg' => '#078bf4'];
                break;
            case $value >= 20:
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
