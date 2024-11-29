<?php
// Enqueue Tailwind CSS and other stylesheets
function my_tailwind_theme_enqueue_scripts() {
    // Option 1: Enqueue Tailwind from CDN
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css', [], null, 'all');

    // Option 2: Uncomment to use locally compiled Tailwind CSS (ensure this is the correct path)
    // wp_enqueue_style('tailwind', get_template_directory_uri() . '/assets/css/output.css', [], '1.0', 'all');

    // Enqueue Flowbite (if using Flowbite for additional UI components)
    wp_enqueue_style('flowbite', 'https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css', [], '2.5.2', 'all');

    // Enqueue custom styles (your additional CSS)
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', [], '1.0', 'all');

    // Enqueue compiled Tailwind CSS (ensure files exist)
    wp_enqueue_style('input-css', get_template_directory_uri() . '/src/input.css');
    wp_enqueue_style('output-css', get_template_directory_uri() . '/src/output.css');
}
add_action('wp_enqueue_scripts', 'my_tailwind_theme_enqueue_scripts');

// Enqueue specific scripts for FAQ and Math Competition pages
function load_custom_scripts() {
    // Enqueue script for FAQ page
    if (is_page('faq')) {
        wp_enqueue_script('faq-script', get_template_directory_uri() . '/js/faq-script.js', [], null, true);
    }
}
add_action('wp_enqueue_scripts', 'load_custom_scripts');

// Enqueue Math Competition page styles
function load_math_competition_styles() {
    // Enqueue Math Competition specific stylesheet
    if (is_page('konkurrence')) {
        wp_enqueue_style('math-competition-style', get_template_directory_uri() . '/css/math-competition-style.css');
    }
}
add_action('wp_enqueue_scripts', 'load_math_competition_styles');

// Allow custom file types (Rive and SVG)
function allow_custom_upload_types($file_types) {
    // Allow .riv and .svg files
    $file_types['riv'] = 'application/json';
    $file_types['svg'] = 'image/svg+xml';
    return $file_types;
}
add_filter('upload_mimes', 'allow_custom_upload_types');

// Load Pally font
function load_pally_font() {
    wp_enqueue_style('pally-font', get_template_directory_uri() . '/fonts/pally.css', [], null);
}
add_action('wp_enqueue_scripts', 'load_pally_font');


?>
