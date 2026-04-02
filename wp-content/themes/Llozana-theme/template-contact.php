<?php
/*
Template Name: Contact
*/
get_header();
?>

<main class="bg-gray-950 text-[#f5f3ef]">

    <!-- HERO -->
    <section class="py-20 md:py-28 text-center px-6">
        <p class="uppercase tracking-[0.35em] text-[11px] text-gray-500 my-5">
            Llozana
        </p>

        <h1 class="font-luxury text-4xl md:text-6xl font-light mb-6">
            Na kontaktoni
        </h1>

        <div class="w-24 h-px bg-[#c6a47e] mx-auto mb-8"></div>

        <p class="max-w-2xl mx-auto text-gray-300 leading-relaxed text-sm md:text-base">
            Nëse jeni duke kërkuar tekstile premium për shtëpinë, hotel apo projekt arkitektonik,
            ekipi ynë është gati t’ju ndihmojë me këshillim, përzgjedhje dhe zgjidhje të personalizuara.
        </p>
    </section>

    <!-- MAIN CONTACT COMPOSITION -->
    <section class="max-w-6xl mx-auto px-6 pb-24 md:pb-32">

        <div class="border border-white/10 bg-white overflow-hidden rounded-xl">

            <!-- TOP: IMAGE + INFO -->
            <div class="grid grid-cols-1 lg:grid-cols-12">

                <!-- IMAGE -->
                <div class="lg:col-span-7 p-6 md:p-8">
                    <div class="relative overflow-hidden rounded-2xl h-[320px] md:h-[420px] lg:h-[540px]">
                        <img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/magazina.jpeg"
                            alt="Llozana Showroom"
                            class="w-full h-full object-cover object-center"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-black/5 to-transparent"></div>
                    </div>
                </div>

                <!-- INFO PANEL -->
                <div class="lg:col-span-5 flex flex-col justify-center px-8 py-10 md:px-12 md:pb-14 rounded-xl text-gray-950">
                    
                    <p class="uppercase tracking-[0.35em] text-[11px] mb-2">
                        Get in touch
                    </p>

                    <h2 class="font-luxury text-3xl md:text-4xl font-light mb-6 leading-tight">
                        Vizitoni showroom-in tonë ose na kontaktoni tani
                    </h2>

                    <div class="w-16 h-px bg-[#c6a47e] mb-4"></div>

                    <p class="leading-relaxed mb-5 text-sm md:text-base">
                        Jemi të disponueshëm për pyetje mbi produktet, porosi të personalizuara,
                        projekte rezidenciale dhe bashkëpunime hoteliere.
                    </p>

                    <div class="space-y-4">
                        <div>
                            <p class="uppercase text-[11px] tracking-[0.35em] mb-2">
                                Email
                            </p>
                            <p class="text-base md:text-lg">
                                info.llozana@gmail.com
                            </p>
                        </div>

                        <div>
                            <p class="uppercase text-[11px] tracking-[0.35em] mb-2">
                                Phone
                            </p>
                            <p class="text-base md:text-lg">
                                +355 69 209 7771
                            </p>
                        </div>

                        <div>
                            <p class="uppercase text-[11px] tracking-[0.35em] text-gray-500 mb-2">
                                Location
                            </p>
                            <p class="text-base md:text-lg">
                                Fier, Albania
                            </p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a
                            href="https://wa.me/355692097771?text=Pershendetje%20I%20jam%20i%20interesuar%20rreth%20produkteve%20tuaja"
                            target="_blank"
                            class="inline-flex items-center border border-[#c6a47e] px-7 py-3 uppercase tracking-[0.25em] text-[11px] hover:bg-[#c6a47e] hover:text-black transition"
                        >
                            Mesazh në WhatsApp
                        </a>
                    </div>

                </div>
            </div>

            <!-- BOTTOM: FORM -->
            <div class="border-t border-white/10 bg-[#181818] px-6 py-14 md:px-12 md:py-20">

                <div class="max-w-2xl mx-auto text-center mb-12">
                    <p class="uppercase tracking-[0.35em] text-[11px] text-gray-500 mb-4">
                        Contact form
                    </p>

                    <h3 class="font-luxury text-2xl md:text-3xl font-light mb-4 text-[#f5f3ef]">
                        Na dërgoni një mesazh
                    </h3>

                    <div class="w-16 h-px bg-[#c6a47e] mx-auto mb-6"></div>

                    <p class="text-gray-400 leading-relaxed text-sm md:text-base">
                        Plotësoni formularin dhe ne do t’ju kontaktojmë sa më shpejt.
                    </p>
                </div>

                <div class="max-w-3xl mx-auto">
                    <?php the_content(); ?>
                </div>

            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>