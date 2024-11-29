<?php get_header(); ?>


<?php 
$about_title = get_field('about_title');
$about_text = get_field('about_text');
$about_image = get_field('about_image');
$team_title = get_field('team_title');
?>
<div class="max-w-4xl mx-auto pt-12 px-4">
</div>
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-lg px-4 py-12 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
      <div class="mr-auto place-self-center text-left lg:col-span-6 order-last lg:order-first">
        <h2 class="mb-4 text-5xl font-extrabold tracking-tight leading-none text-NormalBlue dark:text-white font-pally">
          <?php echo ($about_title); ?>
        </h2>
        <p class="max-w-2xl font-light text-gray-800 md:text-lg lg:text-xl ">
          <?php 
            if ($about_text) {
              echo nl2br(esc_html($about_text));
            }
          ?>
        </p>
      </div>
      <div class="lg:col-span-6 lg:flex lg:mt-0 mt-8 flex justify-center">
        <img src="<?php echo esc_url($about_image['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($about_image["alt"]); ?>" class="w-96 h-96 object-contain">
      </div>
    </div>
</section>

<div class="bg-white py-6 sm:py-8 max-w-screen-md mx-auto">
  <h2 class="mb-4 text-5xl font-extrabold tracking-tight leading-none text-NormalBlue dark:text-white font-pally text-center">
    <?php echo ($team_title); ?>
  </h2>

  <div class="mx-auto grid max-w-7xl gap-20 px-6 lg:px-8 xl:grid-cols-2">
    <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-1 sm:gap-y-16 xl:col-span-2">
      <?php
        $members = new WP_Query(array(
            'post_type' => 'member',
            'posts_per_page' => -1,
        ));

        if ($members->have_posts()):
          while ($members->have_posts()): $members->the_post(); 
            $member_image = get_field('member_image');
            $member_name = get_field('member_name');
            $member_role = get_field('member_role');
            $member_text = get_field('member_text');
      ?>
        <li>
          <div class="flex flex-col lg:flex-row items-center lg:items-start gap-x-6">
            <img class="w-60 h-60 rounded-full object-cover" src="<?php echo esc_url($member_image['sizes']['medium']); ?>" alt="<?php echo esc_attr($member_image["alt"]); ?>">
            <div>
              <h3 class="text-base/7 font-semibold tracking-tight text-gray-900"><?php echo esc_html($member_name); ?></h3>
              <p class="text-sm/6 font-semibold text-NormalBlue font-pally"><?php echo esc_html($member_role); ?></p>
              <p class="text-sm/6 font-semibold text-gray-600"><?php echo esc_html($member_text); ?></p>
            </div>
          </div>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </ul>
  </div>
</div>

<?php get_footer(); ?>
