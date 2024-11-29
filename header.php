<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
        content="Lær matematik, Sjove værktøjer til matematiklæring, Matematik i klassen, Holdkonkurrencer, Holdspil, Matematik-konkurrencer, Online matematikspil, Sund konkurrence">
    <!-- Correct way to enqueue styles -->
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="/img/logo-icon.png" type="image/svg+xml">
    <!-- Title Tag -->
    <title><?php wp_title('|', true, 'right');
    bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="fixed top-0 left-0 w-full z-50 font-pally">
    <nav class="bg-white border-b-2 border-gray-00 px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap items-center justify-center mx-auto max-w-screen-xl">
            <!-- Logo -->
            <a href="<?php echo home_url(); ?>" class="flex items-center justify-center lg:mb-4 lg:w-full">
                <span class="self-center text-3xl font-bold text-NormalBlue font-pally whitespace-nowrap">
                    Planet Peanut
                </span>
            </a>

            <!-- Mobile Menu Button -->
            <button data-collapse-toggle="mobile-menu" type="button"
                class="inline-flex items-center p-2 ml-auto text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only"><?php echo __('Open main menu', 'your-theme-textdomain'); ?></span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <!-- Navigation Links -->
            <div class="hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu">
                <ul class="flex flex-col mt-4 lg:flex-row lg:space-x-8 lg:mt-0 text-lg">
                    <li>
                        <a href="<?php echo home_url(); ?>"
                            class="block py-2 pr-4 pl-3 text-gray-800 font-bold border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-DarkBlue lg:p-0">
                            Hjem
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_permalink(get_page_by_path('konkurrence')->ID); ?>"
                            class="block py-2 pr-4 pl-3 text-gray-800 font-bold border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-DarkBlue lg:p-0">
                            Konkurrence
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_permalink(get_page_by_path('om-os')->ID); ?>"
                            class="block py-2 pr-4 pl-3 text-gray-800 font-bold border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-DarkBlue lg:p-0">
                            Om os
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_permalink(get_page_by_path('faq')->ID); ?>"
                            class="block py-2 pr-4 pl-3 text-gray-800 font-bold border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-DarkBlue lg:p-0">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_permalink(get_page_by_path('kontakt')->ID); ?>"
                            class="block py-2 pr-4 pl-3 text-gray-800 font-bold hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-DarkBlue lg:p-0">
                            Kontakt
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

