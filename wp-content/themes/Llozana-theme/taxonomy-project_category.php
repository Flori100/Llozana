<?php get_header(); ?>

<?php
$term = get_queried_object();
$image = get_field('category_image', 'project_category_' . $term->term_id);
$image_url = $image ? $image['url'] : '';
?>

<main class="bg-[#f8f5f1] text-[#2c2c2c]">

    <!-- Hero -->
    <section class="relative h-[78vh] flex items-center justify-center text-center overflow-hidden">

        <?php if ($image_url): ?>
            <img 
                src="<?php echo esc_url($image_url); ?>" 
                class="absolute inset-0 w-full h-full object-cover"
                alt="<?php echo esc_attr(single_term_title('', false)); ?>"
            >
        <?php endif; ?>

        <div class="absolute inset-0 bg-black/45"></div>

        <div class="relative z-10 text-white px-6 max-w-4xl mx-auto">

            <!-- Breadcrumb -->
            <p class="text-[11px] md:text-xs tracking-[0.35em] uppercase text-gray-300 mb-6">
                Home · Projects · <?php single_term_title(); ?>
            </p>

            <!-- Title -->
            <h1 class="text-5xl md:text-7xl font-light tracking-[0.04em] mb-6">
                <?php single_term_title(); ?>
            </h1>

            <!-- Divider -->
            <div class="w-24 h-px bg-[#c6a47e] mx-auto mb-6"></div>

            <!-- Description -->
            <?php if (term_description()) : ?>
                <p class="max-w-2xl mx-auto text-base md:text-lg text-gray-200 leading-relaxed">
                    <?php echo term_description(); ?>
                </p>
            <?php endif; ?>

            <!-- Editorial Line -->
            <p class="mt-10 text-[11px] md:text-xs tracking-[0.35em] uppercase text-gray-300">
                Selected projects by Llozana
            </p>

        </div>

    </section>

    <!-- Divider between hero and content -->
    <div class="border-t border-[#e7dfd6]"></div>

    <?php if (have_posts()) : ?>

        <section class="max-w-7xl mx-auto px-6 md:px-10 py-24 md:py-32">

            <div class="space-y-28 md:space-y-36">

                <?php
                $index = 1;
                while (have_posts()) : the_post();
                    $is_even = $index % 2 === 0;
                ?>

                    <article class="grid grid-cols-1 md:grid-cols-12 gap-10 md:gap-16 items-center">

                        <!-- Image -->
                        <div class="<?php echo $is_even ? 'md:col-span-7 md:order-2' : 'md:col-span-7'; ?>">
                            <a href="<?php the_permalink(); ?>" class="group block">

                                <div class="relative overflow-hidden bg-[#f8f5f1] rounded-xl">

                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', [
                                            'class' => 'w-full aspect-[4/3] object-cover transition duration-700 ease-out group-hover:scale-105 p-4 border border-[#c6a47e] rounded-xl',
                                        ]); ?>
                                    <?php endif; ?>

                                    <!-- Cinematic overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/0 via-black/0 to-black/0 group-hover:from-black/50 transition duration-500"></div>

                                    <!-- CTA -->
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                                        <span class="border border-white text-white px-6 py-3 uppercase tracking-[0.25em] text-[11px]">
                                            SHIKO PROJEKTIN
                                        </span>
                                    </div>

                                </div>

                            </a>
                        </div>

                        <!-- Text -->
                        <div class="<?php echo $is_even ? 'md:col-span-5 md:order-1' : 'md:col-span-5'; ?>">

                            <!-- Project Number -->
                            <p class="text-[11px] tracking-[0.35em] uppercase text-gray-400 mb-4">
                                <?php echo str_pad($index, 2, '0', STR_PAD_LEFT); ?>
                            </p>

                            <!-- Title -->
                            <h2 class="text-3xl md:text-4xl font-light tracking-[0.03em] mb-4 leading-tight">
                                <a href="<?php the_permalink(); ?>" class="hover:text-[#c6a47e] transition">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Small divider -->
                            <div class="w-12 h-px bg-[#c6a47e] mb-6 transition-all duration-500 hover:w-24"></div>

                            <!-- Excerpt -->
                            <p class="text-gray-600 leading-relaxed text-sm md:text-[15px] max-w-md mb-8">
                                <?php echo wp_trim_words(get_the_excerpt(), 22); ?>
                            </p>

                            <!-- Link -->
                            <a 
                                href="<?php the_permalink(); ?>" 
                                class="inline-block text-[11px] uppercase tracking-[0.3em] text-[#2c2c2c] border-b border-[#c6a47e] pb-1 hover:text-[#c6a47e] transition"
                            >
                                Zbulo më shumë
                            </a>

                        </div>

                    </article>

                <?php
                    $index++;
                    endwhile;
                ?>

            </div>

        </section>

    <?php else : ?>

        <section class="py-32 text-center">
            <p class="text-sm tracking-[0.25em] uppercase text-gray-400 mb-4">
                Asnje projekt i disponueshëm ne kete kategori
            </p>
            <div class="w-16 h-px bg-[#c6a47e] mx-auto mb-6"></div>
            <p class="text-gray-500 max-w-md mx-auto">
                Nuk ka projekte të publikuara në këtë kategori. Ju lutemi kontrolloni përsëri më vonë ose eksploroni kategoritë e tjera për të zbuluar projektet tona të ndryshme.
            </p>
        </section>

    <?php endif; ?>

</main>

<?php get_footer(); ?>