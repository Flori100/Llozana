<?php get_header(); ?>

<!-- HERO -->
<section class="relative h-[70vh] flex items-center justify-center">

    <img 
        src="<?php echo get_template_directory_uri(); ?>/assets/images/IMG_9219.jpeg"
        class="absolute inset-0 w-full h-full object-cover"
    >

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative text-center text-white font-luxury">
        <h1 class="text-6xl mb-6 tracking-wide">
            Produktet
        </h1>

        <p class="text-lg tracking-widest">
            Koleksionet e Tekstileve të Luksit të Krijuara për Interierë Elegante
        </p>
    </div>

</section>


<!-- COLLECTIONS -->
<section class="max-w-7xl mx-auto py-24 px-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

        <?php

            $categories = get_terms([
                'taxonomy' => 'product_category',
                'hide_empty' => true,
                'parent' => 0
            ]);

            if (!empty($categories) && !is_wp_error($categories)) :

            foreach ($categories as $category):

            $image = get_field('product_image', 'product_category_' . $category->term_id);

            $image_url = '';

            if ($image) {
                $image_url = is_array($image) ? $image['url'] : $image;
            } else {
                $image_url = 'https://via.placeholder.com/1600x900';
        }

        ?>

            <a href="<?php echo get_term_link($category); ?>" class="group block">

                <div class="relative overflow-hidden rounded-lg">

                    <img 
                        src="<?php echo esc_url($image_url); ?>"
                        class="w-full h-[420px] object-cover group-hover:scale-110 transition duration-700"
                    >

                    <div class="absolute inset-0 group-hover:bg-black/40 transition duration-500"></div>

                    <div class="left-5 absolute bottom-5 text-start text-white">

                        <h3 class="text-2xl font-luxury tracking-wide">
                            <?php echo esc_html($category->name); ?>
                        </h3>

                        <p class="text-sm mt-2">
                            Explore Collection
                        </p>

                    </div>
                </div>

            </a>

        <?php endforeach; endif; ?>

    </div>

</section>


<!-- FEATURED BANNER -->
<section class="relative h-[500px] flex items-center">

    <img 
        src="<?php echo get_template_directory_uri(); ?>/assets/images/magazina.jpeg"
        class="absolute inset-0 w-full h-full object-cover"
    >

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative max-w-5xl mx-auto text-center text-white px-6">

        <h2 class="text-5xl font-luxury mb-6">
            Krijuar për një Jetë Elegante
        </h2>

        <p class="max-w-xl mx-auto mb-8 text-lg">
            Koleksionet tona kombinojnë elegancën e përjetshme me materiale cilësore,
            duke sjellë rehati të rafinuar në çdo ambient të brendshëm.
        </p>

        <a 
            href="<?php echo home_url('/contact'); ?>"
            class="border border-white px-10 py-4 hover:bg-white hover:text-black transition"
        >
            Vizito showroom-in tonë
        </a>

    </div>

</section>

<?php get_footer(); ?>