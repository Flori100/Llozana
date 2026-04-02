<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llozana</title>
    <?php wp_head(); ?>
</head>
<body>
    <header 
        x-data="{ scrolled: false, openMenu: null, open: null, mobile: false, mobileProducts: false, mobileProjects: false }"
        x-init="
        const t = 80;
        const handler=()=> scrolled = window.scrollY > t;
        handler();
        window.addEventListener('scroll', handler,{passive:true});
        "
        :class="scrolled || <?php echo is_front_page() ? 'false' : 'true'; ?> ? 'md:bg-white/90 md:backdrop-blur md:shadow-sm ' : 'md:bg-transparent md:border-b-2 md:border-white'"
        class="fixed w-full z-50 transition-all duration-500 bg-white"
    >

        <div class="max-w-7xl mx-auto px-6 md:px-8">

            <div class="flex items-center justify-between h-20">

                <!-- LOGO -->

                <a href="<?php echo home_url(); ?>" 
                    class="text-3xl font-light tracking-wide font-luxury text-slate-900"
                    :class="scrolled || <?php echo is_front_page() ? 'false' : 'true'; ?> ? '' : 'md:text-white'"
                >
                    <?php if (is_front_page()): ?>

                        <!-- Front page -->
                        <template x-if="scrolled">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/llozana-black.png" class="h-16">
                        </template>

                        <template x-if="!scrolled">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/llozana-white.png" class="h-16">
                        </template>

                    <?php else: ?>

                        <!-- All other pages -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/llozana-black.png" class="h-16">

                    <?php endif; ?>
                </a>

                <!-- MOBILE BUTTON -->

                <button 
                    @click="mobile = !mobile"
                    class="md:hidden text-slate-900"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>


                <!-- DESKTOP NAV -->

                <nav class="hidden md:flex items-center gap-10 text-sm uppercase tracking-widest">

                    <!-- PRODUCTS -->

                    <?php $products_archive = get_post_type_archive_link('products'); ?>

                    <div class="relative"
                        @mouseenter="open='products'"
                        @mouseleave="open=null"
                    >

                        <a href="<?php echo esc_url($products_archive ? $products_archive : '#'); ?>"
                            :class="scrolled || <?php echo is_front_page() ? 'false' : 'true'; ?> ? 'text-slate-900' : 'text-white'"
                            class="transition font-luxury py-8">
                                Produkte
                        </a>

                        <?php
                            $product_terms = get_terms([
                                'taxonomy'=>'product_category',
                                'hide_empty'=>true,
                                'parent'=>0
                            ]);
                        ?>

                        <div 
                            x-show="open==='products'"
                            x-transition
                            class="absolute left-0 top-12 mt-0.5 w-64 bg-white/90 shadow-xl p-4"
                        >

                            <?php foreach($product_terms as $term): ?>

                                <a 
                                    href="<?php echo get_term_link($term); ?>"
                                    class="block px-3  py-2 text-slate-900 hover:text-[#c6a47e]"
                                >
                                <?php echo $term->name; ?>
                                </a>

                            <?php endforeach; ?>

                        </div>

                    </div>


                    <!-- PROJECTS -->

                    <div class="relative"
                        @mouseenter="openMenu='projects'"
                        @mouseleave="openMenu=null"
                    >

                        <a 
                            href="<?php echo get_post_type_archive_link('projects'); ?>"
                            :class="scrolled || <?php echo is_front_page() ? 'false' : 'true'; ?> ? 'text-slate-900' : 'text-white'"
                            class="transition font-luxury py-8"
                        >
                            Projekte
                        </a>

                        <div 
                            x-show="openMenu==='projects'"
                            x-transition
                            class="absolute left-0 top-12 mt-0.5 bg-white/90 shadow-xl p-6 w-56 space-y-4 text-slate-900"
                        >

                            <?php
                                $terms = get_terms([
                                'taxonomy'=>'project_category',
                                'hide_empty'=>true
                            ]);

                            foreach($terms as $term):
                            ?>

                            <a 
                                href="<?php echo get_term_link($term); ?>"
                                class="block hover:text-[#c6a47e]"
                            >
                                <?php echo $term->name; ?>
                            </a>

                            <?php endforeach; ?>

                        </div>

                    </div>

                    <a 
                        href="<?php echo home_url('/contact'); ?>"
                        :class="scrolled || <?php echo is_front_page() ? 'false' : 'true'; ?> ? 'text-slate-900' : 'text-white'"
                        class="transition font-luxury py-8"
                    >
                        Kontakt
                    </a>

                    <!-- Social -->
                    <div class="absolute right-10">
                        <div class="flex gap-5"
                        :class="scrolled || <?php echo is_front_page() ? 'false' : 'true'; ?> ? 'text-slate-900' : 'text-white'">

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

                </nav>

            </div>
        </div>


        <!-- MOBILE MENU -->

        <div 
        x-show="mobile"
        x-transition
        class="md:hidden transition-all bg-white shadow-sm"
        >

            <div class="px-6 pb-6 space-y-6">

                <!-- PRODUCTS -->

                <div>

                    <button 
                        @click="mobileProducts = !mobileProducts"
                        class="w-full flex justify-between text-left uppercase tracking-widest"
                        >
                            Produktet
                            <span :class="{ 'rotate-180': mobileProducts }" class="transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                    </button>

                    <div x-show="mobileProducts" x-transition class="mt-3 pl-4 space-y-2">

                        <?php foreach($product_terms as $term): ?>

                        <a 
                            href="<?php echo get_term_link($term); ?>"
                            class="block text-slate-900"
                            >
                            <?php echo $term->name; ?>
                        </a>

                        <?php endforeach; ?>

                    </div>

                </div>

                    <!-- PROJECTS -->

                    <div>

                    <button 
                        @click="mobileProjects = !mobileProjects"
                        class="w-full flex justify-between text-left uppercase tracking-widest"
                        >
                            Projektet
                            <span :class="{ 'rotate-180': mobileProjects }" class="transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                    </button>

                    <div x-show="mobileProjects" x-transition class="mt-3 pl-4 space-y-2">

                        <?php foreach($terms as $term): ?>

                        <a 
                            href="<?php echo get_term_link($term); ?>"
                            class="block text-slate-900"
                            >
                                <?php echo $term->name; ?>
                        </a>

                        <?php endforeach; ?>

                    </div>

                </div>


                <a 
                    href="<?php echo home_url('/contact'); ?>"
                    class="block uppercase tracking-widest"
                >
                    Kontakt
                </a>

            </div>

        </div>

    </header>

    <!-- FLOATING WHATSAPP -->
    <a
        href="https://wa.me/355692097771?text=Pershendetje,%20jam%20i%20interesuar%20rreth%20produkteve%20tuaja"
        target="_blank"
        class="fixed bottom-5 right-5 flex items-center gap-3 bg-gray-300 text-gray-700 rounded-full shadow-lg hover:shadow-xl transition z-50 pr-3"
        >

        <!-- ICON -->
        <div class="w-8 h-8 flex items-center justify-center bg-green-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 32 32" fill="currentColor">
                <path d="M16 .396C7.164.396 0 7.56 0 16.396c0 2.888.76 5.706 2.204 8.178L0 32l7.647-2.186A15.94 15.94 0 0016 32c8.836 0 16-7.164 16-16.396C32 7.56 24.836.396 16 .396zm0 29.19a13.02 13.02 0 01-6.64-1.82l-.475-.282-4.54 1.297 1.31-4.424-.308-.455A13.06 13.06 0 013 16.396C3 9.21 8.81 3.396 16 3.396s13 5.814 13 13-5.81 13.19-13 13.19zm7.173-9.657c-.392-.196-2.318-1.145-2.676-1.275-.358-.13-.618-.196-.878.196-.26.392-1.007 1.275-1.235 1.538-.228.26-.456.294-.848.098-.392-.196-1.655-.61-3.154-1.947-1.167-1.04-1.955-2.324-2.184-2.716-.228-.392-.024-.604.172-.8.176-.176.392-.456.588-.684.196-.228.26-.392.392-.654.13-.26.065-.49-.033-.684-.098-.196-.878-2.12-1.203-2.902-.317-.76-.64-.654-.878-.666l-.75-.013c-.26 0-.684.098-1.04.49s-1.367 1.336-1.367 3.256c0 1.92 1.4 3.78 1.596 4.04.196.26 2.756 4.206 6.68 5.897.934.402 1.663.642 2.232.822.937.298 1.79.256 2.465.155.752-.112 2.318-.947 2.644-1.862.326-.914.326-1.698.228-1.862-.098-.164-.358-.26-.75-.456z"/>
            </svg>
        </div>

        <!-- TEXT -->
        <span class="text-sm text-gray-700 whitespace-nowrap pb-1">
            Kontakto ne Whatsapp
        </span>

    </a>