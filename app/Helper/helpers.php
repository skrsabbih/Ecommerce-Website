<?php

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
/** Check if product have discount */

function checkDiscount($product) {
    $currentDate = date('Y-m-d');

    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    }

    return false;
}


