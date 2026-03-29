<?php get_header(); ?>

<div>
    <h1 class="text-2xl font-semibold"><?php the_title();?> </h1>
    <?php get_template_part('includes/section', 'content');?>
</div>

<?php get_footer(); ?>