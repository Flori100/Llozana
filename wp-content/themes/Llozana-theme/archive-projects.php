<?php get_header(); ?>

<main class="bg-[#f8f5f1] text-[#2c2c2c] pt-22">

    <?php
    $categories = get_terms([
        'taxonomy' => 'project_category',
        'hide_empty' => true,
        'parent' => 0,
    ]);
    ?>

    <?php if (!empty($categories) && !is_wp_error($categories)) : ?>

    <section 
        x-data="{
            active: 0,
            total: <?php echo count($categories); ?>,
            next() { this.active = (this.active + 1) % this.total },
            prev() { this.active = (this.active - 1 + this.total) % this.total }
        }"
        class="relative h-screen overflow-hidden"
    >

        <?php foreach ($categories as $index => $category) : ?>

            <?php 
            $image = get_field('category_image', 'project_category_' . $category->term_id);
            $image_url = $image ? $image['url'] : 'https://via.placeholder.com/1600x900';
            ?>

            <div 
                x-show="active === <?php echo $index; ?>"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                class="absolute inset-0"
            >

                <!-- Background -->
                <img src="<?php echo esc_url($image_url); ?>"
                     class="w-full h-full object-cover">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40"></div>

                <!-- Content -->
                <div class="absolute inset-0 flex items-center justify-center text-center px-6">
                    <div class="text-white">

                        <h2 class="text-6xl md:text-7xl font-light tracking-wide mb-6">
                            <?php echo esc_html($category->name); ?>
                        </h2>

                        <div class="w-24 h-[1px] bg-[#c6a47e] mx-auto mb-6"></div>

                        <?php if ($category->description) : ?>
                            <p class="text-lg max-w-2xl mx-auto text-gray-200 mb-10">
                                <?php echo esc_html($category->description); ?>
                            </p>
                        <?php endif; ?>

                        <a href="<?php echo esc_url(get_term_link($category)); ?>"
                           class="inline-block border border-[#c6a47e] px-8 py-3 uppercase tracking-widest text-sm hover:bg-[#c6a47e] hover:text-black transition duration-300">
                            Shiko Projektet
                        </a>

                    </div>
                </div>

            </div>

        <?php endforeach; ?>

        <!-- Controls -->
        <button 
            @click="prev"
            class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-[#c6a47e] transition"
        >
            ‹
        </button>

        <button 
            @click="next"
            class="absolute right-6 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-[#c6a47e] transition"
        >
            ›
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-4">
            <?php foreach ($categories as $index => $category) : ?>
                <div 
                    @click="active = <?php echo $index; ?>"
                    :class="active === <?php echo $index; ?> ? 'bg-[#c6a47e]' : 'bg-white/50'"
                    class="w-3 h-3 rounded-full cursor-pointer transition"
                ></div>
            <?php endforeach; ?>
        </div>

    </section>

    <?php else : ?>

        <p class="text-center py-32">No project categories found.</p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>