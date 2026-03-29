<?php

// Load Tailwind CSS and Vite assets
function theme_assets() {
    $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';

    if(!file_exists($manifest_path)){
        die('Vite manifest not found. Run npm run build.');
    }

    $manifest = json_decode(file_get_contents($manifest_path), true);

    $js_file = $manifest['resources/js/app.js']['file'];
    $css_file = $manifest['resources/js/app.js']['css'][0];

    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/dist/' . $css_file,
        [],
        null,
    );

    wp_enqueue_script(
        'theme-script',
        get_template_directory_uri() . '/dist/' . $js_file,
        [],
        null,
        true
    );
}

function theme_fonts() {
    wp_enqueue_style(
        'cormorant-font',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap',
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'theme_fonts');

// function theme_assets() {

//     wp_enqueue_script(
//         'vite-client',
//         'http://localhost:5173/@vite/client',
//         [],
//         null,
//         true
//     );

//     wp_enqueue_script(
//         'theme-script',
//         'http://localhost:5173/resources/js/app.js',
//         [],
//         null,
//         true
//     );

// }


add_action('wp_enqueue_scripts', 'theme_assets');

//Load Alpine.js
function theme_scripts() {
    wp_enqueue_script(
        'alpine',
        'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js',
        [],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'theme_scripts');

function register_projects_cpt() {
    register_post_type('projects', [
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'projects'],
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true, // Gutenberg
    ]);
}
add_action('init', 'register_projects_cpt');

function register_project_categories() {
    register_taxonomy('project_category', 'projects', [
        'labels' => [
            'name' => 'Project Categories',
            'singular_name' => 'Project Category',
        ],
        'hierarchical' => true, // kjo lejon subkategori
        'public' => true,
        'rewrite' => ['slug' => 'project-category'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_project_categories');

function register_products_cpt() {
    register_post_type('products', [
        'labels' => [
            'name' => 'Products',
            'singular_name' => 'Product',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'products'],
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true, // Gutenberg
    ]);
}
add_action('init', 'register_products_cpt');

function register_product_categories() {
    register_taxonomy('product_category', 'products', [
        'labels' => [
            'name' => 'Product Categories',
            'singular_name' => 'Product Category',
        ],
        'hierarchical' => true, // kjo lejon subkategori
        'public' => true,
        'rewrite' => ['slug' => 'product-category'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_product_categories');

//Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Menus
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'top-right-menu' => 'Top Right Menu Location',
        'products-hover-menu' => 'Products Hover Menu Location',
        'projects-hover-menu' => 'Projects Hover Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    )
);