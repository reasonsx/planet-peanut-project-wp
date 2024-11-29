<?php 
/* Template Name: Contact Page */
get_header(); ?>
<?php $intro_title = get_field('intro_title'); ?>
<?php $intro_text = get_field('intro_text'); ?>  
<?php $intro_image = get_field('intro_image'); ?>
<?php $location_title = get_field('location_title'); ?>
<?php $location_text = get_field('location_text'); ?>
<?php $location_link = get_field('location_link'); ?>

  <div class="max-w-4xl mx-auto pt-24 px-4">
  <!-- <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-NormalBlue md:text-4xl lg:text-4xl dark:text-white font-pally text-center">Contact</h2> -->
</div>

<section class="bg-white dark:bg-gray-900">
  <div class="grid max-w-screen-lg px-4 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
    <div class="mr-auto place-self-center lg:col-span-6">
      <h2 class="mb-4 text-5xl font-extrabold tracking-tight leading-none text-NormalBlue dark:text-white font-pally">
        <?php echo $intro_title; ?> 
      </h2>
      <p class="max-w-2xl mb-6 font-light text-gray-800 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
         <?php 
         if ($intro_text) {
          echo nl2br(esc_html($intro_text)); // Convert line breaks to <br> and escape for security
      }
       ?>
      </p>
    </div>
    <div class="lg:col-span-6 lg:flex lg:mt-0 mt-8 flex justify-center">
      <img src="<?php echo $intro_image ['sizes']['medium_large']; ?>" alt="<?php echo $intro_image ["alt"]; ?>" class='w-96 h-96 object-contain'/>
    </div>
  </div>
</section>

<section class="bg-white dark:bg-gray-900">
  <div class="grid max-w-screen-lg px-4 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:pb-16 lg:grid-cols-12">
    <div class="lg:col-span-6 lg:flex lg:mt-0 mt-8 flex justify-center max-w-2xl">
      <div class="w-full aspect-video rounded-lg overflow-hidden">
      <?php
echo '<iframe
          src="' . esc_url($location_link) . '"
          class="w-full h-72 rounded-lg"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>';
?>
        <!-- <iframe
          src=".esc_url( $location_link )."
          class="w-full h-72 rounded-lg"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe> -->
      </div>
    </div>
    <div class="mr-auto place-self-start items-start justify-start lg:col-span-6 lg:ml-8 md:ml-8 mt-8 lg:mt-0">
      <h2 class="mb-4 text-5xl font-extrabold tracking-tight leading-none text-NormalBlue dark:text-white font-pally">
        <?php echo $location_title; ?>
      </h2>
      <p class="max-w-2xl mb-6 font-light text-gray-800 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
      <?php 
         if ($location_text) {
          echo nl2br(esc_html($location_text)); // Convert line breaks to <br> and escape for security
      }
       ?>
      </p>
    </div>
  </div>
</section>

<?php get_footer(); ?>