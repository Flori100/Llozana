<?php get_header(); ?>

<?php
$term = get_queried_object();
$image = get_field('product_image', $term);
$image_url = $image ? $image['url'] : '';
$children = get_terms([
    'taxonomy' => 'product_category',
    'parent' => $term->term_id,
    'hide_empty' => true
]);
?>

<?php if (!empty($children)) : ?>

    <!-- CATEGORY HERO -->

    <section class="relative h-[40vh] flex items-center justify-center bg-gradient-to-b from-stone-200 to-stone-100 border-b -border-stone-200">

        <div class="text-center px-6 mt-14">

            <p class="text-xs tracking-[0.35em] uppercase text-gray-500 mb-4">
                Collection
            </p>

            <h1 class="text-5xl md:text-6xl font-luxury tracking-wide text-slate-900 mb-6">
                <?php echo esc_html($term->name); ?>
            </h1>

            <?php if ($term->description): ?>

            <p class="max-w-xl mx-auto text-gray-600">
                <?php echo esc_html($term->description); ?>
            </p>

            <?php endif; ?>

        </div>

    </section>



    <!-- SUBCATEGORIES -->

    <section class="py-28 bg-stone-100">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">

                <?php foreach ($children as $child) : ?>

                    <?php
                    $thumbnail_id = get_term_meta($child->term_id, 'product_image', true);
                    $image = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : '';
                    ?>

                    <a href="<?php echo get_term_link($child); ?>" class="group block">

                        <div class="relative overflow-hidden rounded-xl">

                            <?php if ($image) : ?>

                                <img 
                                    src="<?php echo $image; ?>"
                                    class="w-full h-[480px] object-cover transition duration-[1200ms] ease-out group-hover:scale-110"
                                >

                            <?php else : ?>

                                <div class="w-full h-[480px] bg-neutral-200"></div>

                            <?php endif; ?>


                            <!-- overlay -->

                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition duration-500"></div>


                            <!-- text -->

                            <div class="absolute bottom-10 left-10 text-white">

                                <p class="text-xs tracking-[0.35em] uppercase opacity-80 mb-2">
                                    Collection
                                </p>

                                <h2 class="text-3xl font-luxury tracking-wide">
                                    <?php echo esc_html($child->name); ?>
                                </h2>

                                <div class="w-12 h-px bg-white mt-4 group-hover:w-20 transition-all"></div>

                            </div>

                        </div>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<?php if (empty($children)) : ?>

    <!-- CATEGORY HERO -->

    <section class="relative h-[65vh] flex items-center justify-center text-white">

        <div class="absolute inset-0">

            <img 
                src="<?php echo esc_url($image_url); ?>" 
                class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>

        </div>

        <div class="relative text-center max-w-3xl px-6">

            <p class="text-xs uppercase tracking-[0.35em] mb-4 opacity-80">
                Koleksioni
            </p>

            <h1 class="text-5xl md:text-7xl font-luxury mb-6">
                <?php echo esc_html($term->name); ?>
            </h1>

            <div class="w-24 h-px bg-white/60 mx-auto mb-6"></div>

            <?php if($term->description): ?>

                <p class="text-lg opacity-90 leading-relaxed">
                    <?php echo esc_html($term->description); ?>
                </p>

            <?php endif; ?>

        </div>

    </section>


    <!-- PRODUCTS -->

    <section class="max-w-7xl mx-auto py-28 px-8">

        <div class="text-center mb-16">

            <p class="text-xs uppercase tracking-[0.35em] text-gray-500 mb-4">
                Produktet
            </p>

            <h2 class="text-4xl font-luxury">
                Eksploro Koleksionin
            </h2>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">

            <?php if(have_posts()): ?>

                <?php while(have_posts()): the_post(); ?>

                    <a href="<?php the_permalink(); ?>" class="group block">

                        <div class="relative overflow-hidden rounded-xl">

                            <?php if(has_post_thumbnail()): ?>

                                <img 
                                src="<?php the_post_thumbnail_url('large'); ?>"
                                class="w-full h-[460px] object-cover transition duration-[1200ms] ease-out group-hover:scale-110">

                            <?php endif; ?>

                            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition duration-500"></div>

                            <div class="absolute bottom-8 left-8 text-white opacity-0 group-hover:opacity-100 transition duration-500">

                                <p class="text-xs tracking-[0.3em] uppercase mb-2">
                                    Produkti
                                </p>

                                <p class="text-lg font-light">
                                    Shiko Detajet →
                                </p>

                            </div>

                        </div>

                        <div class="mt-6 text-center">

                            <h3 class="text-2xl font-luxury">
                                <?php the_title(); ?>
                            </h3>

                        </div>

                    </a>

                <?php endwhile; ?>

            <?php else: ?>

                <p class="text-center col-span-3 text-gray-500">
                    Nuk u gjetën produkte në këtë kategori.
                </p>

            <?php endif; ?>

        </div>

    </section>
<?php endif; ?>

<?php get_footer(); ?>