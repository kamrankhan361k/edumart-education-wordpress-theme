<?php
/*
 * The Template for displaying all single posts
 */
$edumart_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php 
while (have_posts()): the_post(); 
?>
<?php the_content() ?>
<?php endwhile; ?>
<?php
get_footer();
?>