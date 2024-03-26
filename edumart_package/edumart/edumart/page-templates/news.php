<?php
/*
 * Template Name: News 
 * Description: A Page Template with a Page Builder design.
 */
$edumart_redux_demo = get_option('redux_demo');
get_header(); ?>
<!-- Start Banner -->
<div class="inner-banner blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h1><?php if(isset($edumart_redux_demo['news_title'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($edumart_redux_demo['news_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'News & events', 'edumart' ); } ?></h1>
                    <?php if(isset($edumart_redux_demo['news_desc']) && $edumart_redux_demo['news_desc'] != ''){?>
                    <p><?php echo wp_specialchars_decode(esc_attr($edumart_redux_demo['news_desc']));?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner --> 
<!-- Start News & Events -->
<section class="news-wrapper padding-lg">
    <div class="container">
        <ul class="row news-listing">
            <?php $args = array(    
            'paged' => $paged,
            'post_type' => 'post',
            'posts_per_page' => $edumart_redux_demo['news_number'],
            );
            $wp_query = new WP_Query($args);
            while (have_posts()): the_post(); 
            $blog_news_title = get_post_meta(get_the_ID(),'_cmb_blog_news_title', true);
            $featured_image_3 = get_post_meta(get_the_ID(),'_cmb_featured_image_3', true);  
            ?>
            <li class="col-xs-6 col-sm-4 grid-item">
                <div class="inner"> 
                    <?php if ( isset($featured_image_3) && $featured_image_3 != '') { ?>
                    <a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_url($featured_image_3);?>" class="img-responsive" alt=""></a>
                    <?php } ?>
                    <div class="cnt-block">
                        <ul class="post-detail">
                            <li><span class="icon-date-icon ico"></span> <span class="bold"><?php echo get_the_date( 'd,M' );?></span> <?php echo get_the_date( 'Y' );?></li>
                            <li><span class="icon-chat-icon ico"></span><?php comments_number( esc_html__('0 Comments', 'edumart'), esc_html__('1 Comment', 'edumart'), esc_html__('% Comments', 'edumart') ); ?></li>
                        </ul>
                        <?php if (isset($blog_news_title) && $blog_news_title != '') { ?>
                        <a href="<?php the_permalink();?>"><h2><?php echo wp_specialchars_decode(esc_attr($blog_news_title)); ?></h2></a>
                        <?php } else { ?>
                        <a href="<?php the_permalink();?>"><h2><?php the_title(); ?></h2></a>
                        <?php } ?>
                        <p><?php echo esc_attr(edumart_excerpt_2(20));?></p>
                        <a href="<?php the_permalink();?>" class="read-more"><span class="icon-play-icon"></span><?php if(isset($edumart_redux_demo['read_more'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($edumart_redux_demo['read_more']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Read more', 'edumart' ); } ?></a> 
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
        <div class="text-center"> 
            <?php edumart_pagination(); ?>
        </div>
    </div>
</section>
<!-- End News & Events -->
<?php
get_footer();
?>