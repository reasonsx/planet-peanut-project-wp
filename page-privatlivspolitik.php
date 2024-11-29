<?php get_header(); ?>

<?php $policy_headline = get_field('policy_headline'); ?>
<div class="max-w-4xl mx-auto pt-12 px-4 my-14">
    <h2
        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-800 md:text-4xl lg:text-4xl dark:text-white font-pally text-center">
        <?php echo esc_html($policy_headline); ?>
    </h2>
</div>
<section class="policies max-w-4xl mx-auto pb-12 px-4">
    <div class="category mb-10">
        <?php
        $policies = new WP_Query(array(
            'post_type' => 'policy',
            'posts_per_page' => -1,
        )); ?>

        <?php if ($policies->have_posts()): ?>
            <?php while ($policies->have_posts()):
                $policies->the_post(); ?>
                <?php
                $policy_title = get_field('policy_title');
                $policy_text = get_field('policy_text');
                ?>

                <h3 class="text-xl font-bold text-gray-800 mb-2">
                    <?php echo esc_html($policy_title); ?>
                </h3>
                <p class="mb-4">
                    <?php
                    if ($policy_text) {
                        // Allow HTML tags like <a>, <br>, <p>, etc.
                        echo wp_kses_post(nl2br($policy_text));
                    }
                    ?>
                </p>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>

<style>
    .policies a {
        color: #2563eb;
    }

    .policies a:hover {
        color: #1e40af;
    }
</style>

<?php get_footer(); ?>