<?php

return [
    [
        'icon' => 'nav-icon fas fa-tachometer-alt',
        'route' => 'dashboard.dashboard',
        'title' => 'Dashboard',
        'active' => 'dashboard.dashboard',
    ],
    [
        'icon' => 'fas fa-tags nav-icon',
        'route' => 'dashboard.categories.index',
        'title' => 'Categories',
        'active' => 'dashboard.categories.*',
    ],

    [
        'icon' => 'fas fa-tags nav-icon',
        'route' => 'dashboard.movies.index',
        'title' => 'Movies',
        'badge' => 'New',
        'active' => 'dashboard.movies.*',
    ],
    [
        'icon' => 'fas fa-users nav-icon',
        'route' => 'dashboard.users.index',
        'title' => 'Users',
        'active' => 'dashboard.users.*',
    ],
];
