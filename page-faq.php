<?php get_header(); ?>

<div class="max-w-4xl mx-auto pt-12 px-4 my-14">
    <h2
        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-NormalBlue md:text-4xl lg:text-4xl dark:text-white font-pally text-center">
        Ofte stillede spørgsmål</h2>
</div>

<section class="max-w-5xl mx-auto pb-12 px-4">

    <?php
    // Fetch all FAQs (no taxonomy query, since category is an ACF field)
    $faqs = new WP_Query(array(
        'post_type' => 'faq', // Your custom post type for FAQs
        'posts_per_page' => -1, // Display all FAQs
        
    ));

    if ($faqs->have_posts()) {
        $categories = array(); // To store unique categories
    
        while ($faqs->have_posts()) {
            $faqs->the_post();

            // Get the category from ACF
            $category = get_field('category');

            if ($category) {
                // Group FAQs by category (if it hasn't been grouped already)
                if (!in_array($category, $categories)) {
                    $categories[] = $category;
                    ?>
                    <div class="category mb-10">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4"><?php echo esc_html($category); ?></h2>

                        <div class="space-y-4">
                            <?php
                }
                ?>
                        <div class="faq-item">
                            <button
                                class="faq-question w-full text-left py-4 px-6 bg-gray-100 text-gray-800 flex justify-between items-center hover:bg-gray-200 focus:outline-none rounded-lg">
                                <span><?php
                                // Display the answer field from ACF
                                $question = get_field('question');
                                echo esc_html($question);
                                ?></span>
                                <span class="text-gray-600">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white transition-transform duration-300"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m19 9-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-answer px-6 py-4 hidden">
                                <p class="text-gray-800">
                                    <?php
                                    // Display the answer field from ACF
                                    $answer = get_field('answer');
                                    echo esc_html($answer);
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php
            }
        }

        // Close the last category container
        if (!empty($categories)) {
            echo '</div></div>';
        }

        wp_reset_postdata();
    }
    ?>
</section>



<?php get_footer(); ?>