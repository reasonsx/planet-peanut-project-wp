<?php get_header(); ?>
<section class="bg-white dark:bg-gray-900 flex items-center pt-32 justify-center">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 my-auto">
        <div class="mx-auto max-w-screen-sm text-center">
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500 font-pally">
                <?php pll_e('404'); ?>
            </h1>
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white font-pally">
                <?php pll_e("Something's missing."); ?>
            </p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">
                <?php pll_e("Sorry, we can't find that page. You'll find lots to explore on the home page."); ?>
            </p>
            <a href="<?php echo home_url(); ?>" class="bg-NormalBlue transition-colors text-white hover:bg-DarkBlue inline-flex focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-4 font-pally">
                <?php pll_e('Back to Homepage'); ?>
            </a>
        </div>   
    </div>
</section>
<?php get_footer(); ?>
