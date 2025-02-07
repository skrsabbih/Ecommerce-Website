?<?php

/*Set sidebar item active*/if (!function_exists('setActive')) {
    /**
     * Set the 'active' class for the navigation menu based on the current route.
     *
     * @param string|array $routes
     * @param string $class
     * @return string
     */
    function setActive($routes, $class = 'active')
    {
        // Check if routes is an array or a single route string
        if (is_array($routes)) {
            foreach ($routes as $route) {
                if (request()->routeIs($route)) {
                    return $class;
                }
            }
        } else {
            if (request()->routeIs($routes)) {
                return $class;
            }
        }

        return '';
    }
}

