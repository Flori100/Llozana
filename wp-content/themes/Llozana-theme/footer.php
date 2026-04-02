<footer class="relative bg-black pt-32 pb-56 overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute inset-0 bg-black/80"></div>
        <div class="absolute inset-0 bg-cover bg-center opacity-30"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/llozana-image.png');">
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 text-white">

        <!-- MAIN GRID -->
        <div class="grid md:grid-cols-4 gap-16">

            <!-- Brand -->
            <div>
                <h3 class="text-2xl font-light tracking-wide mb-6">
                    LLOZANA
                </h3>

                <p class="leading-relaxed text-gray-300">
                    Premium interior solutions për ambiente rezidenciale dhe komerciale.
                </p>
            </div>

            <!-- Products -->
            <div>
                <h4 class="mb-6 tracking-wide uppercase text-sm">
                    Produkte
                </h4>

                <?php $products_archive = get_post_type_archive_link('products'); ?>

                <?php
                            $product_terms = get_terms([
                                'taxonomy'=>'product_category',
                                'hide_empty'=>true,
                                'parent'=>0
                            ]);
                        ?>

                            <ul>
                                <?php foreach($product_terms as $term): ?>

                                    <li>
                                        <a 
                                            href="<?php echo get_term_link($term); ?>"
                                            class="hover:text-[#c6a46c] transition"
                                        >
                                        <?php echo $term->name; ?>
                                        </a>
                                    </li>

                                <?php endforeach; ?>
                            </ul>

            </div>

            <!-- Projects -->
            <div>
                <h4 class="mb-6 tracking-wide uppercase text-sm">
                    Projekte
                </h4>

                <?php $projects_archive = get_post_type_archive_link('projects'); ?>

                <?php
                            $project_terms = get_terms([
                                'taxonomy'=>'project_category',
                                'hide_empty'=>true,
                                'parent'=>0
                            ]);
                        ?>

                            <ul>
                                <?php foreach($project_terms as $term): ?>

                                    <li>
                                        <a 
                                            href="<?php echo get_term_link($term); ?>"
                                            class="hover:text-[#c6a46c] transition"
                                        >
                                        <?php echo $term->name; ?>
                                        </a>
                                    </li>

                                <?php endforeach; ?>
                            </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="mb-6 tracking-wide uppercase text-sm">
                    Kontakt
                </h4>

                <ul class="space-y-3 text-gray-300 mb-6">
                    <li>Fier, Shqipëri</li>
                    <li>Email: info.llozana@gmail.com</li>
                    <li>Tel: +355 69 20 97 771</li>
                </ul>

                <!-- Social -->
                <div class="flex gap-5">

                    <!-- Instagram -->
                    <a href="https://instagram.com/llozana.group" target="_blank"
                    class="hover:text-[#c6a46c] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                        fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 
                            4.574 22 7.75 22h8.5C19.426 22 22 19.426 
                            22 16.25v-8.5C22 4.574 19.426 2 16.25 
                            2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 
                            7.75v8.5A3.75 3.75 0 0 1 16.25 
                            20h-8.5A3.75 3.75 0 0 1 4 
                            16.25v-8.5A3.75 3.75 0 0 1 
                            7.75 4zM12 7a5 5 0 1 0 0 10 
                            5 5 0 0 0 0-10z"/>
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/p/Llozana-100056436835347/"
                    target="_blank"
                    class="hover:text-[#c6a46c] transition">
                        <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 24 24">
                            <path d="M13.5 22v-8h2.7l.4-3h-3.1V8.6c0-.9.3-1.6 
                            1.7-1.6H17V4.2c-.3 0-1.3-.2-2.5-.2-2.5 
                            0-4.2 1.5-4.2 4.3V11H7.5v3h2.8v8h3.2z"/>
                        </svg>
                    </a>

                </div>
            </div>

        </div>

        <!-- LOCATION -->
        <div class="mt-24">

            <h3 class="text-center text-xl tracking-wide mb-8">
                Ku ndodhemi
            </h3>

            <div class="rounded-lg overflow-hidden border border-[#2a2a2a] h-[350px]">
                <iframe
                    src="https://www.google.com/maps?q=Llozana%20Fier%20Albania&output=embed"
                    class="w-full h-full border-0"
                    loading="lazy">
                </iframe>
            </div>

            <div class="text-center mt-4">
                <a 
                href="https://maps.app.goo.gl/riPHkTJyoEAaBxvg9"
                target="_blank"
                class="text-sm tracking-widest uppercase hover:text-[#c6a46c] transition">
                    Hap në Google Maps
                </a>
            </div>

        </div>

        <!-- Bottom -->
        <div class="mt-16 pt-8 border-t border-[#2a2a2a] flex flex-col md:flex-row justify-between items-center text-sm">
            <p class="text-gray-400">
                © 2026 Llozana sh.p.k. All rights reserved.
            </p>
        </div>

    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>