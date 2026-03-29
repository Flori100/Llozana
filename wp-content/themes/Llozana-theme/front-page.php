<?php get_header(); ?>

<?php
$projects = new WP_Query([
    'post_type' => 'projects',
    'posts_per_page' => 5
]);

$slides = [];

if ($projects->have_posts()) {
    while ($projects->have_posts()) {
        $projects->the_post();

        $terms = get_the_terms(get_the_ID(), 'project_category');
        $category = $terms ? $terms[0]->name : '';

        $slides[] = [
            'image' => get_the_post_thumbnail_url(get_the_ID(),'large'),
            'title' => get_the_title(),
            'category' => $category,
            'link' => get_permalink()
        ];
    }
}

wp_reset_postdata();
?>

<div class="relative h-screen">

    <video autoplay muted loop playsinline class="absolute h-screen w-screen object-cover z-10"
        src="<?php echo get_template_directory_uri(); ?>/assets/videos/video.mp4"></video>

    <div class="absolute z-40 flex justify-center w-full mt-56">
        <div class="text-white font-luxury">

            <div class="flex flex-col items-center">

                <h1 class="text-6xl md:text-9xl font-semibold">
                    Live in Luxury
                </h1>

                <p class="text-center py-16 mb-16 border-b-2 border-white">
                    "Sepse çdo ditë meriton të jetosh me stil."
                </p>

                <p class="w-1/2 text-center">
                    Krijoni dizajnin tuaj të personalizuar me detaje të rafinuara dhe komoditet të papërmbajtshëm.
                </p>

            </div>

        </div>
    </div>

</div>


<!-- WHAT MAKES US DIFFERENT -->

<section class="relative min-h-screen bg-gray-950 text-white">
    <div class="mx-10 lg:mx-56 min-h-screen grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-24">

        <div class="relative">

            <div class="absolute -inset-3 border border-white/20 rounded-2xl"></div>

            <img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/IMG_0044.png"
            class="relative w-full h-[520px] object-cover rounded-2xl shadow-2xl"
        />

        </div>

        <div class="flex flex-col gap-6">

            <p class="text-sm tracking-[0.25em] uppercase text-white/70">
            Pse ne
            </p>

            <h2 class="text-5xl font-semibold leading-tight">
            Çfarë na dallon nga të tjerët
            </h2>

            <p class="text-white/75 text-lg leading-relaxed max-w-xl">
            Ne ndërtojmë ndjesinë e luksit me materiale premium dhe punim të saktë.
            </p>

            <ul class="grid gap-4 mt-4">

                <li class="flex gap-3">
                    <span class="mt-2 h-2 w-2 rounded-full bg-white"></span>
                    <div>
                        <p class="font-semibold">Materiale të nivelit të lartë</p>
                        <p class="text-white/70">Zgjedhje premium dhe rezistencë.</p>
                    </div>
                </li>

                <li class="flex gap-3">
                    <span class="mt-2 h-2 w-2 rounded-full bg-white"></span>
                    <div>
                        <p class="font-semibold">Punim i personalizuar</p>
                        <p class="text-white/70">Masat dhe ngjyrat sipas projektit.</p>
                    </div>
                </li>

                <li class="flex gap-3">
                    <span class="mt-2 h-2 w-2 rounded-full bg-white"></span>
                    <div>
                        <p class="font-semibold">Montim korrekt</p>
                        <p class="text-white/70">Ekzekutim profesional.</p>
                    </div>
                </li>

            </ul>

        </div>

    </div>
</section>


<!-- PRODUCTS -->

<section class="py-32 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6 min-h-screen">

        <div class="text-center mb-44 flex flex-col justify-center">

            <!-- Eyebrow -->
            <p class="text-xs tracking-[0.35em] uppercase text-gray-500 mb-4">
                Llozana Collection
            </p>

            <h2 class="text-4xl md:text-5xl font-light font-luxury mb-6">
            Produktet
            </h2>

            <!-- Luxury divider -->
            <div class="w-24 h-px bg-gray-300 mx-auto mb-6"></div>

            <p class="text-gray-600 max-w-2xl mx-auto">
                Koleksione premium për ambiente rezidenciale dhe hoteliere,
                të krijuara për rehati, elegancë dhe stil të përjetshëm.
            </p>

            <!-- Premium line -->
            <p class="mt-10 text-xs tracking-[0.35em] uppercase text-gray-400">
                Crafted for refined living
            </p>

        </div>

        <div class="grid md:grid-cols-3 gap-8 fade-element">

            <?php
                $product_terms = get_terms([
                'taxonomy'=>'product_category',
                'hide_empty'=>true,
                'parent'=>0
                ]);

                foreach($product_terms as $term):

                $image = get_field('product_image',$term);
            ?>

            <a href="<?php echo get_term_link($term); ?>" class="group relative overflow-hidden rounded-xl hover:shadow-2xl transition duration-300">

                <img
                    src="<?php echo $image['url']; ?>"
                    class="w-full h-[450px] object-cover transition duration-700 group-hover:scale-105"
                >

                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-500"></div>

                <div class="absolute bottom-10 left-10 text-white">

                    <h3 class="text-2xl font-light tracking-wide">
                    <?php echo $term->name; ?>
                    </h3>

                </div>

            </a>

            <?php endforeach; ?>

        </div>

        <?php $products_archive = get_post_type_archive_link('products'); ?>

        <div class="text-center mt-24">
            <a href="<?php echo esc_url($products_archive); ?>"
                class="px-10 py-4 border border-black hover:bg-black hover:text-white transition duration-500">
                Shiko produktet
            </a>
        </div>
    </div>

</section>



<!-- PROJECTS CAROUSEL -->

<section
    x-data="carousel()"
    class="relative py-32 bg-black text-white overflow-hidden"
>

    <section class="min-h-screen flex items-center justify-center bg-black text-white relative">

        <div class="max-w-4xl mx-auto px-6 text-center">

            <p class="text-xs tracking-[0.35em] uppercase text-gray-400 mb-6">
                Selected Works
            </p>

            <?php $projects_archive = get_post_type_archive_link('projects'); ?>
            <a href="<?php echo esc_url($projects_archive); ?>"
                class="md:hidden text-6xl md:text-7xl font-light font-luxury mb-8 hover:text-[#c6a46c] transition-colors duration-500">
                Projektet
            </a>

            <h2 class="hidden md:block text-6xl md:text-7xl font-light font-luxury mb-8">
                Projektet
            </h2>

            <span class="text-center md:hidden block text-sm mt-4">
                Kliko per te pare te gjitha projektet
            </span>

            <div class="w-24 h-px bg-white/30 mx-auto my-8"></div>

            <p class="text-gray-400 max-w-xl mx-auto">
                Realizime premium për ambiente rezidenciale dhe hoteliere,
                ku funksionaliteti dhe estetika bashkohen në harmoni.
            </p>

        </div>


        <!-- SCROLL INDICATOR -->

        <div class="absolute bottom-14 left-1/2 -translate-x-1/2 text-center">

            <p class="text-xs tracking-[0.3em] uppercase text-gray-500 mb-3">
                Scroll
            </p>

            <div class="w-px h-10 bg-white/40 mx-auto"></div>

        </div>

    </section>


    <div class="relative overflow-hidden h-[610px]">
        <!-- SLIDES -->

        <div
            class="flex h-full transition-transform duration-700 ease-in-out mb-2"
            :style="'transform: translateX(-' + (active * 100) + '%)'"
        >

            <template x-for="(slide,index) in slides" :key="index">

                <div class="w-full flex-shrink-0 relative p-5 animate-slow-zoom">

                    <img
                        :src="slide.image"
                        class="w-full h-full object-cover rounded-lg"
                    />

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>


                    <div class="absolute bottom-20 md:left-48 left-14 max-w-xl">

                        <p class="text-xs uppercase tracking-[0.35em] text-gray-300 mb-3">
                            Project
                        </p>

                        <h3 class="text-4xl font-light mb-4" x-text="slide.title"></h3>

                        <p class="text-gray-300 mb-6" x-text="slide.category"></p>

                        <a
                            :href="slide.link"
                            class="px-8 py-3 border border-white uppercase tracking-widest text-sm hover:bg-white hover:text-black transition"
                        >
                            Shiko më shumë
                        </a>

                    </div>

                    <!-- NAV BUTTONS -->

                    <button
                        @click="prev"
                        class="absolute left-5 inset-y-0 text-4xl z-30 bg-gradient-to-r hover:from-white/20 hover:via-white/10 hover:to-white/0 px-5 my-5 rounded-l-lg"
                    >
                        ‹
                    </button>

                    <button
                        @click="next"
                        class="absolute right-5 inset-y-0 text-4xl z-30 bg-gradient-to-l hover:from-white/20 hover:via-white/10 hover:to-white/0 px-5 my-5 rounded-r-lg"
                    >
                        ›
                    </button>

                </div>

            </template>

        </div>


        <!-- PROGRESS BAR -->

        <div class="absolute bottom-0 left-0 w-full h-[2px] bg-white/20">

            <div
                class="h-full bg-white transition-all duration-700"
                :style="'width:' + ((active + 1) / slides.length * 100) + '%'"
            ></div>

        </div>


    </div>

</section>



<script>
    function carousel(){
        return{
            active:0,
            slides: <?php echo json_encode($slides); ?>,

            next(){
                this.active=(this.active+1)%this.slides.length
            },

            prev(){
                this.active=(this.active-1+this.slides.length)%this.slides.length
            }
        }
    }
</script>

<?php get_footer(); ?>