<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$uri = str_replace(BASE_URL, '', $uri);


$routes = [
    '/' => 'controllers/index.php',

    // customer routes
    '/online-order' => 'controllers/online-order.php',
    '/reservation' => 'controllers/reservation.php',
    '/gallery' => 'controllers/gallery.php',
    '/facility' => 'controllers/facility.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/register' => 'controllers/register.php',
    '/login' => 'controllers/login.php',
    '/cart' => 'controllers/cart.php',
    '/my-account' => 'controllers/my-account.php',
    '/logout' => 'controllers/logout.php',
    '/checkout' => 'controllers/checkout.php',

    // admin routes
    '/admin-login' => 'controllers/admin/admin-login.php',
    '/admin-dashboard' => 'controllers/admin/dashboard.php',
    '/admin-logout' => 'controllers/admin/admin-logout.php',

    //admin ajax routes
    '/admin/AJAX/add_category' => 'controllers/admin/AJAX/add_category.php',
    '/admin/AJAX/edit_category' => 'controllers/admin/AJAX/edit_category.php',
    '/admin/AJAX/delete_category' => 'controllers/admin/AJAX/delete_category.php',
    '/admin/AJAX/delete_food' => 'controllers/admin/AJAX/delete_food.php',
    '/admin/AJAX/change_order_status' => 'controllers/admin/AJAX/change_order_status.php',
    '/admin/AJAX/change_reservation_status' => 'controllers/admin/AJAX/change_reservation_status.php',
    '/admin/AJAX/delete_branch' => 'controllers/admin/AJAX/delete_branch.php',
    '/admin/AJAX/delete_member' => 'controllers/admin/AJAX/delete_member.php',

    // customer ajax routes
    '/AJAX/addToCart' => 'controllers/AJAX/addToCart.php',
    '/AJAX/cartControll' => 'controllers/AJAX/cartControll.php',
    '/AJAX/reservation' => 'controllers/AJAX/reservation.php',
    '/AJAX/search' => 'controllers/AJAX/search.php',
    
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        require 'controllers/404.php';
    }
}



routeToController($uri, $routes);