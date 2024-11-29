<?php get_header(); ?>
<script src="https://unpkg.com/@rive-app/canvas@2.20.0"></script>

<section class="hero">
  <div class="relative w-full h-screen overflow-hidden flex items-center justify-center mt-16 sm:mt-8">
    <?php
    $display_option = get_field('display_option');
    $rive_file = get_field('rive_file');
    $rive_state_machine = get_field('rive_state_machine');
    $hero_image = get_field('hero_image');
    $hero_background_color = get_field('hero_background_color');
    $hero_title = get_field('hero_title');
    $hero_text = get_field('hero_text');
    $app_store_button_url = get_field('app_store_button_url');
    $google_play_button_url = get_field('google_play_button_url');
    ?>

    <!-- Background Canvas for Rive Animation -->
    <?php if ($display_option === 'rive' && $rive_file && $rive_state_machine): ?>
      <canvas id="canvas-<?php echo get_the_ID(); ?>"
        class="absolute w-[calc(100vw+100px)] h-full left-[-50px] top-0 z-0"></canvas>
      <script>
        const riveInstance<?php echo get_the_ID(); ?> = new rive.Rive({
          src: "<?php echo esc_url($rive_file['url']); ?>",
          canvas: document.getElementById("canvas-<?php echo get_the_ID(); ?>"),
          autoplay: true,
          stateMachines: "<?php echo esc_attr($rive_state_machine); ?>",
          onLoad: () => {
            riveInstance<?php echo get_the_ID(); ?>.resizeDrawingSurfaceToCanvas();
          },
        });
      </script>
    <?php endif; ?>

    <!-- Centered Content -->
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12 relative z-10">
      <div class="hero-container"
        style="<?php echo ($display_option === 'color' && $hero_background_color) ? 'background-color: ' . esc_attr($hero_background_color) . ';' : ''; ?>">

        <!-- Hero Image -->
        <?php if ($display_option === 'image' && $hero_image): ?>
          <div class="hero-image" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
          </div>
        <?php endif; ?>

        <!-- Hero Title -->
        <?php if ($hero_title): ?>
          <h1
            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white font-pally">
            <?php echo esc_html($hero_title); ?>
          </h1>
        <?php endif; ?>

        <!-- Hero Text -->
        <?php if ($hero_text): ?>
          <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            <?php echo wp_kses_post(nl2br($hero_text)); ?>
          </p>
        <?php endif; ?>

        <!-- Buttons -->
        <div
          class="hero-buttons items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
          <!-- App Store Button -->
          <?php if ($app_store_button_url): ?>
            <a href="<?php echo esc_url($app_store_button_url); ?>" target="_blank"
              class="w-full sm:w-auto bg-NormalBlue  transition-colors focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
              <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                <path fill="currentColor"
                  d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z">
                </path>
              </svg>
              <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Download på</div>
                <div class="-mt-1 font-sans text-sm font-semibold">App Store</div>
              </div>
            </a>
          <?php endif; ?>

          <!-- Google Play Button -->
          <?php if ($google_play_button_url): ?>
            <a href="<?php echo esc_url($google_play_button_url); ?>" target="_blank"
              class="w-full sm:w-auto bg-NormalBlue  transition-colors focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
              <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                  d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z">
                </path>
              </svg>
              <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Få det på </div>
                <div class="-mt-1 font-sans text-sm font-semibold">Google Play</div>
              </div>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if (is_front_page()): ?>
  <?php
  $args = array(
    'post_type' => 'home_card',
    'posts_per_page' => -1,
  );

  $query = new WP_Query($args);

  if ($query->have_posts()):
    while ($query->have_posts()):
      $query->the_post();

      // Get ACF fields
      $display_option = get_field('display_option');
      $rive_file = get_field('rive_file');
      $rive_state_machine = get_field('rive_state_machine');
      $home_image = get_field('home_image');
      $home_title = get_field('home_title');
      $home_text = get_field('home_text');
      $home_show_button = get_field('home_show_button');
      $home_button_text = get_field('home_button_text');
      $home_button_url = get_field('home_button_url');
  ?>
    <section class="info-section bg-white dark:bg-gray-900">
      <div class="grid max-w-screen-lg px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12">
        <div class="text-content mr-auto place-self-center text-left lg:col-span-6">
          <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-NormalBlue font-pally">
            <?php echo $home_title; ?>
          </h2>
          <p class="max-w-2xl font-light text-gray-800 md:text-lg lg:text-xl dark:text-gray-400">
            <?php
            if ($home_text) {
              echo wp_kses_post(nl2br($home_text));
            }
            ?>
          </p>
          <?php if ($home_show_button && $home_button_text && $home_button_url): ?>
            <a href="<?php echo esc_url($home_button_url); ?>"
              class="bg-NormalBlue text-white hover:bg-DarkBlue transition-colors inline-flex focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-4 font-pally"><?php echo esc_html($home_button_text); ?></a>
          <?php endif; ?>
        </div>
        <div class="canvas-container lg:col-span-6 lg:flex lg:mt-0 mt-8 flex justify-center">
          <?php
          if ($display_option === 'rive' && $rive_file && $rive_state_machine): ?>
            <canvas id="canvas-<?php echo get_the_ID(); ?>" class="home-canvas"></canvas>
            <script>
              const riveInstance<?php echo get_the_ID(); ?> = new rive.Rive({
                src: "<?php echo esc_url($rive_file['url']); ?>",
                canvas: document.getElementById("canvas-<?php echo get_the_ID(); ?>"),
                autoplay: true,
                stateMachines: "<?php echo esc_attr($rive_state_machine); ?>",
                onLoad: () => {
                  riveInstance<?php echo get_the_ID(); ?>.resizeDrawingSurfaceToCanvas();
                },
              });
            </script>
          <?php elseif ($display_option === 'image' && $home_image): ?>
            <img src="<?php echo esc_url($home_image['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($home_image['alt']); ?>"
              class="max-w-full max-h-96">
          <?php else: ?>
            <p>No media available.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <?php
    endwhile;
    wp_reset_postdata();
  else:
    echo '<p>No info sections found.</p>';
  endif;
  ?>
<?php endif; ?>

<?php if (is_front_page()): ?>
  <section class="bg-white">
  


    <div class="statistics-section bg-white sm:py-32 items-center flex flex-col sm:max-w-90 px-4 mx-auto">

      <?php
      // Define variables for custom fields
      $statistics_title = get_field('statistics_title');
      $statistic_1_amount = get_field('statistic_1_amount');
      $statistic_1_text = get_field('statistic_1_text');
      $statistic_2_amount = get_field('statistic_2_amount');
      $statistic_2_text = get_field('statistic_2_text');
      $statistic_3_amount = get_field('statistic_3_amount');
      $statistic_3_text = get_field('statistic_3_text');
      ?>

      <!-- Statistics Title -->
      <?php if ($statistics_title): ?>
        <h2 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white font-pally max-w-screen-lg text-center">
          <?php echo esc_html($statistics_title); ?>
        </h2>
      <?php endif; ?>
<style>
    .statistics-section {
  background-image: url('<?php echo get_template_directory_uri(); ?>/img/statictis-background-new.svg');
  background-repeat: no-repeat;
  background-position: center;
  object-fit: cover;
  width: 100%;
  height: 700px; /* Adjust height as necessary */
  display: flex; /* Use flexbox for alignment */
  align-items: center; /* Vertically center content */
  justify-content: center; /* Horizontally center content */
  
}

@media screen and (max-width: 1024px) {
  .statistics-section {
    height: 960px;
    background-image: url('<?php echo get_template_directory_uri(); ?>/img/statistics-bg-copy.svg');
  }
  
}
</style>
      <!-- Statistics Section -->
      <div class="mx-auto max-w-7xl px-6 lg:px-8 my-8">
        <dl class="grid grid-cols-1 gap-x-8 gap-y-8 text-center lg:grid-cols-3">
          
          <!-- Statistic #1 -->
          <?php if ($statistic_1_amount && $statistic_1_text): ?>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base/7 font-semibold text-white">
                <?php echo esc_html($statistic_1_text); ?>
              </dt>
              <dd class="counter order-first text-5xl font-semibold tracking-tight text-white font-pally">
                <?php echo number_format($statistic_1_amount, 0, '.', ','); ?>
              </dd>
            </div>
          <?php endif; ?>

          <!-- Statistic #2 -->
          <?php if ($statistic_2_amount && $statistic_2_text): ?>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base/7 font-semibold text-white">
                <?php echo esc_html($statistic_2_text); ?>
              </dt>
              <dd class="counter order-first text-5xl font-semibold tracking-tight text-white font-pally">
                <?php echo number_format($statistic_2_amount, 0, '.', ','); ?>
              </dd>
            </div>
          <?php endif; ?>

          <!-- Statistic #3 -->
          <?php if ($statistic_3_amount && $statistic_3_text): ?>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base/7 font-semibold text-white">
                <?php echo esc_html($statistic_3_text); ?>
              </dt>
              <dd class="counter order-first text-5xl font-semibold tracking-tight text-white font-pally">
                <?php echo number_format($statistic_3_amount, 0, '.', ','); ?>
              </dd>
            </div>
          <?php endif; ?>

        </dl>
      </div>
    </div>
  </section>
<?php endif; ?>





<?php get_footer(); ?>