<?php get_header(); ?>
<?php $service_headline = get_field('service_headline'); ?>
<div class="max-w-4xl mx-auto pt-12 px-4 my-14">
    <h2
        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-800 md:text-4xl lg:text-4xl dark:text-white font-pally text-center">
        <?php echo $service_headline; ?>
    </h2>
</div>
<section class="terms max-w-4xl mx-auto pb-12 px-4">
    <div class="category mb-10">
        <?php
        $terms_of_service = new WP_Query(array(
            'post_type' => 'term_of_service',
            'posts_per_page' => -1,
        )); ?>
        <?php if ($terms_of_service->have_posts()): ?>
            <?php while ($terms_of_service->have_posts()):
                $terms_of_service->the_post(); ?>
                <?php
                $terms_of_service_title = get_field('terms_of_service_title');
                $terms_of_service_text = get_field('terms_of_service_text');
                ?>
                <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo $terms_of_service_title; ?></h3>
                <p class="mb-4"><?php
                if ($terms_of_service_text) {
                    echo wp_kses_post(nl2br($terms_of_service_text));
                }
                ?></p>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
<style>
    .terms a {
        color: #2563eb;
    }

    .terms a:hover {
        color: #1e40af;
    }
</style>
<?php get_footer(); ?>