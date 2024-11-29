<?php wp_footer(); ?>
<footer class="p-4 bg-white md:p-6 lg:p-6 dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl text-center">
      <div class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
        <a href="<?php echo home_url(); ?>" class="text-xl text-NormalBlue whitespace-nowrap font-bold font-pally">
          Planet Peanut
        </a>
      </div>
      <ul class="flex flex-wrap justify-center items-center my-2 text-gray-900 dark:text-white">
        <li>
          <a href="<?php echo get_permalink(get_page_by_path('privatlivspolitik')->ID); ?>" class="mr-4 hover:underline md:mr-6">
          Privatlivspolitik
          </a>
        </li>
        <li>
          <a href="<?php echo get_permalink(get_page_by_path('vilkar-for-brug')->ID); ?>" class="hover:underline">
          Vilkår for brug
          </a>
        </li>
      </ul>
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
        Copyright © 2024, Planet Peanut, All Rights Reserved.
      </span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>
