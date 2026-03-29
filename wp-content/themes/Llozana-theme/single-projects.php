<?php get_header(); ?>

<section class="bg-[#d8cec4] h-[80px] flex items-end">
    <div class="max-w-7xl mx-auto px-6 pb-10 w-full">

    </div>
</section>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<main class="bg-[#f7f3ee] text-[#1c1c1a]">
    <!-- TITLE -->
    <section class="pt-16 md:pt-20 pb-10 md:pb-14">
        <div class="max-w-6xl mx-auto px-6 md:px-10">
            <div class="max-w-4xl">
                <p class="uppercase tracking-[0.35em] text-[11px] text-[#8a7f73] mb-6">
                    Project
                </p>

                <h1 class="font-luxury text-4xl sm:text-5xl md:text-7xl leading-[0.95] text-[#181715]">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <!-- DESCRIPTION -->
    <section class="pb-20 md:pb-28">
        <div class="max-w-6xl mx-auto px-6 md:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 md:gap-14">
                
                <div class="lg:col-span-3">
                    <div class="w-16 h-px bg-[#cdbfaa] mb-6"></div>
                    <p class="uppercase tracking-[0.3em] text-[11px] text-[#8a7f73]">
                        Overview
                    </p>
                </div>

                <div class="lg:col-span-7 lg:col-start-5">
                    <div class="single-project-content text-[#4f4a44] text-[17px] md:text-[19px] leading-[1.95] space-y-6">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>