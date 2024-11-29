<?php get_header(); ?>
<?php $previous_winners_title = get_field('previous_winners_title'); ?>
<?php $general_title = get_field('general_title'); ?>
<?php $small_title_left = get_field('small_title_left'); ?>
<?php $small_title_right = get_field('small_title_right'); ?>
<?php $small_title_middle = get_field('small_title_middle'); ?>
<?php $text_left = get_field('text_left'); ?>
<?php $text_middle = get_field('text_middle'); ?>
<?php $text_right = get_field('text_right'); ?>
<?php $hero_title_small = get_field('hero_title_small'); ?>
<?php $hero_image = get_field('hero_image'); ?>
<?php $hero_title_left = get_field('hero_title_left'); ?>
<?php $hero_title_right = get_field('hero_titile_right'); ?>
<!-- Hero Section -->
<div class="hero">
      <div class="hero-content">
        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
    </div>
</div>

<script src="https://unpkg.com/@rive-app/canvas@2.20.0"></script>
<?php

// Query to fetch posts of custom post type 'competition_card'
$args = array(
    'post_type' => 'competition_card', // Adjust post type name if needed
    'posts_per_page' => -1, // Adjust as needed
);

$query = new WP_Query($args);

if ($query->have_posts()): 
    while ($query->have_posts()): 
        $query->the_post();

        // Get ACF fields with updated prefix 'competition_'
        $display_option = get_field('display_option');
        $rive_file = get_field('rive_file'); // File field
        $rive_state_machine = get_field('rive_state_machine');
        $competition_image = get_field('competition_image');
        $competition_title = get_field('competition_title');
        $competition_text = get_field('competition_text');
        $competition_video = get_field('competition_video'); // Assuming you have a youtube_url field
        $competition_show_button = get_field('competition_show_button'); // True/False field
        $competition_button_text = get_field('competition_button_text'); // Button Text field
        $competition_button_url = get_field('competition_button_url'); // Button URL field

        ?>
  <section class="competition-info-section bg-white dark:bg-gray-900">
  <div class="grid max-w-screen-lg px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
    <!-- Text Content Section -->
    <div class="competition-text-content mr-auto place-self-center text-left lg:col-span-6">
      <h2 class="mb-4 text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-none text-NormalBlue font-pally">
        <?php echo $competition_title; ?>
      </h2>
      <p class="max-w-2xl font-light text-gray-800 md:text-lg lg:text-xl dark:text-gray-400 sm:text-base">
        <?php
        if ($competition_text) {
          echo wp_kses_post(nl2br($competition_text));
        }
        ?>
      </p>
      <?php if ($competition_show_button && $competition_button_text && $competition_button_url): ?>
        <a href="<?php echo esc_url($competition_button_url); ?>"
          class="bg-NormalBlue text-white hover:bg-DarkBlue transition-colors inline-flex focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-4 font-pally">
          <?php echo esc_html($competition_button_text); ?>
        </a>
      <?php endif; ?>
    </div>

    <!-- Media Section -->
    <div class="competition-canvas-container lg:col-span-6 lg:flex lg:mt-0 mt-8 flex justify-center">
      <?php
      if ($display_option === 'rive' && $rive_file && $rive_state_machine): ?>
        <canvas id="canvas-<?php echo get_the_ID(); ?>" class="w-64 sm:w-80 md:w-96 h-64 sm:h-80 md:h-96"></canvas>
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
      <?php elseif ($display_option === 'image' && $competition_image): ?>
        <img src="<?php echo esc_url($competition_image['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($competition_image['alt']); ?>"
          class="max-w-full max-h-96">
      <?php elseif ($display_option === 'video' && $competition_video): ?>
        <iframe
          src="<?php echo esc_url($competition_video); ?>"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
          class="rounded-lg w-full sm:max-w-xs md:max-w-sm lg:max-w-lg">
        </iframe>
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
    echo '<p>No competition sections found.</p>';
endif;
?>

<section class="three-columns">
  <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 three-columns-content">
    <h2 class="my-4 text-5xl font-extrabold tracking-tight leading-none text-NormalBlue dark:text-white font-pally">
      <?php echo $general_title; ?>
    </h2>
    <div class="grid gap-12 lg:grid-cols-3">
      <div>
        <h3 class="mb-4 text-2xl font-bold text-gray-900  font-pally"><?php echo $small_title_left ?></h3>
        <p class="max-w-2xl font-light text-gray-800 md:text-lg lg:text-xl dark:text-gray-400">
        <?php 
        if ($text_left) {
          echo nl2br(esc_html($text_left));
        }
        ?>
        </p>
      </div>
      <div>
        <h3 class="mb-4 text-2xl font-bold text-gray-900 font-pally"><?php echo $small_title_middle ?></h3>
        <p class="max-w-2xl font-light text-gray-800 md:text-lg lg:text-xl dark:text-gray-400">
        <?php
        if ($text_middle) {
          echo nl2br(esc_html($text_middle));
        }
        ?>
        </p>
      </div>
      <div>
        <h3 class="mb-4 text-2xl font-bold text-gray-900 font-pally"><?php echo $small_title_right ?></h3>
        <p class="max-w-2xl font-light text-gray-800 md:text-lg lg:text-xl dark:text-gray-400">
        <?php
        if ($text_right) {
          echo nl2br(esc_html($text_right));
        }
        ?>
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Previous Winners Section -->
<section class=" bg-white dark:bg-gray-900 w-full py-16 ">
  <div class= " max-w-screen-lg px-4 mx-auto text-center">
    <h2 class="mb-4 text-5xl font-extrabold tracking-tight leading-none text-NormalBlue dark:text-white font-pally">
      <?php echo $previous_winners_title; ?>
    </h2>
    
            <?php
            $winners = new WP_Query(array(
                'post_type' => 'previous-winner',
                'posts_per_page' => -1,
            )); ?>

            <?php if ($winners->have_posts()): ?>
                <?php while ($winners->have_posts()):
                    $winners->the_post(); ?>
                    <?php $previous_winners_image_right = get_field('previous_winners_image_right'); ?>
                    <?php $previous_winners_image_left = get_field('previous_winners_image_left'); ?>
                    <?php $previous_competition_year = get_field('previous_competition_year'); ?>
                    <?php $previous_winner_name = get_field('previous_winner_name'); ?>
                    <?php $previous_winner_text = get_field('previous_winner_text'); ?>
                    <div class="flex flex-col lg:flex-row items-center justify-center gap-12 mt-10">
                      <div class="flex-shrink-0">
                        <img src="<?php echo esc_url($previous_winners_image_left['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($previous_winners_image_left['alt']); ?>" class="w-40 h-40 lg:w-40 lg:h-40">
                      </div>
                      <div class="text-left text-center">
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">-- <?php echo $previous_competition_year; ?> --</h3>
                        <h2 class="mt-2 mb-4 text-3xl font-bold text-gray-900 dark:text-white">
                        <?php echo $previous_winner_name; ?>
                        </h2>
                        <p class="max-w-2xl font-light text-gray-800 md:text-lg lg:text-xl dark:text-gray-400">
                        <?php 
                        if ($previous_winner_text) {
                          echo nl2br(esc_html($previous_winner_text)); // Convert line breaks to <br> and escape for security
                      }
                      ?>
                        </p>
                      </div>
                      <div class="flex-shrink-0">
                        <img src="<?php echo esc_url($previous_winners_image_right['url']); ?>" alt="<?php echo esc_attr($previous_winners_image_right['alt']); ?>" class="w-40 h-40 lg:w-40 lg:h-40">
                      </div>
                    </div>
        
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
      
   
  </div>
</section>
<style>
    .competition-info-section:nth-child(odd) {
  display: flex;
  flex-direction: column-reverse;
  background-image: url('<?php echo get_template_directory_uri(); ?>/img/competition-bg.svg'); /* Background image applied to section */
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  width: 100%; /* Ensure it takes full width */
  height: 90vh; /* Adjust height as necessary */
  @media (max-width: 1023px) {
    height: 100vh;
  }
  display: flex; /* Use flexbox for alignment */
  align-items: center; /* Vertically center content */
  justify-content: center; /* Horizontally center content */
}
.three-columns {
  display: flex; /* Use flexbox for alignment */
  align-items: center; /* Vertically center content */
  justify-content: center; /* Horizontally center content */
  background-image: url('<?php echo get_template_directory_uri(); ?>/img/competition-bg-copy.svg');
  background-size: cover; 
  background-repeat: no-repeat; 
  background-position: center; 
  height: 90vh; 
  @media (max-width: 1023px) {
    height: 100vh;
  }
  text-align: center; /* Ensure text is centered in the section */
}
</style>


        

    <?php get_footer(); ?>