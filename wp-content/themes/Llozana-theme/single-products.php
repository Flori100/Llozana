<?php get_header(); ?>

<section class="bg-slate-900 h-[80px] flex items-end">
    <div class="max-w-7xl mx-auto px-6 pb-10 w-full">

    </div>
</section>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="max-w-7xl mx-auto px-6 py-24">

<div class="grid grid-cols-1 md:grid-cols-2 gap-16">

<!-- PRODUCT IMAGE -->
<div>

<?php if (has_post_thumbnail()) : ?>

<img 
src="<?php the_post_thumbnail_url('large'); ?>"
class="w-full h-[600px] object-cover"
>

<?php endif; ?>

</div>


<!-- PRODUCT INFO -->
<div class="flex flex-col justify-center">

<h1 class="text-5xl font-luxury mb-6">
<?php the_title(); ?>
</h1>

<?php
$terms = get_the_terms(get_the_ID(), 'product_category');
?>

<?php if ($terms) : ?>

<p class="text-gray-500 mb-6 uppercase tracking-widest text-sm">

<?php foreach ($terms as $term) : ?>
<?php echo $term->name; ?>
<?php endforeach; ?>

</p>

<?php endif; ?>

<div class="text-gray-700 leading-relaxed mb-10">

<?php the_content(); ?>

</div>

</div>

</div>

</section>


<!-- GALLERY (ACF) -->

<?php
$gallery = get_field('gallery');
?>

<?php if ($gallery) : ?>

<section class="max-w-7xl mx-auto px-6 pb-24">

<h2 class="text-3xl font-luxury mb-12 text-center">
Product Gallery
</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

<?php foreach ($gallery as $image) : ?>

<img 
src="<?php echo $image['url']; ?>"
class="w-full h-[350px] object-cover"
>

<?php endforeach; ?>

</div>

</section>

<?php endif; ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>