<?php
/*
 * The Template for displaying all single posts
 */
$edumart_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php 
while (have_posts()): the_post();   
?>
<!-- Start Banner -->
<div class="inner-banner blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h1><?php if(isset($edumart_redux_demo['blog_detail_title'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($edumart_redux_demo['blog_detail_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Blog Detail', 'edumart' ); } ?></h1>
                    <?php if(isset($edumart_redux_demo['blog_detail_desc']) && $edumart_redux_demo['blog_detail_desc'] != ''){?>
                    <p><?php echo wp_specialchars_decode(esc_attr($edumart_redux_demo['blog_detail_desc']));?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner --> 
<!-- Start Blog Detail -->
<div class="container blog-wrapper padding-lg">
    <div class="row"> 
        <!-- Start Left Column -->
        <div class="col-sm-8 blog-left">
            <ul class="blog-listing detail">
                <li> 
                    <?php if ( has_post_thumbnail() ) { ?> 
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="img-responsive" alt="">
                    <?php } ?>
                    <h2><?php the_title(); ?></h2>
                    <ul class="post-detail">
                        <li><span class="icon-date-icon ico"></span><span class="bold"><?php echo get_the_date( 'd,M' );?></span> <?php echo get_the_date( 'Y' );?></li>
                        <li><?php if(isset($monteno_redux_demo['posted_by'])){?>
                            <?php echo wp_specialchars_decode(esc_attr($monteno_redux_demo['posted_by']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Posted By : ', 'edumart' ); } ?>
                            <span class="bold"><?php the_author(); ?></span></li>
                        <li><span class="icon-chat-icon ico"></span><?php comments_number( esc_html__('0 Comments', 'edumart'), esc_html__('1 Comment', 'edumart'), esc_html__('% Comments', 'edumart') ); ?></li>
                        <?php if ( get_the_tags() ) : ?>
                        <?php foreach ( get_the_tags() as $tag ) : ?>
                        <li><span class="label"><?php echo esc_html( $tag->name ); ?></span></li>
                        <?php endforeach; ?> 
                        <?php endif; ?>
                    </ul>
                    <?php the_content(); ?>
                </li>
            </ul>
            <ul class="follow-us clearfix">
                <span class='st_facebook_hcount'></span>
                <span class='st_twitter_hcount'></span>
                <span class='st_instagram_hcount'></span>  
                <span class='st_linkedin_hcount'></span>  
                <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                <script type="text/javascript">stLight.options({publisher: "ur-6a7e320d-37d8-511-633d-4264e3ae8c", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
            </ul>
            <?php comments_template();?>
        </div>
        <!-- End Left Column --> 
    
        <!-- Start Right Column -->
        <div class="col-sm-4">
            <div class="blog-right sidebar">
                <?php get_sidebar();?>
            </div>
        </div>
        <!-- End Right Column --> 
    </div>
</div>
<!-- End Blog Detail --> 
<?php endwhile; ?>
<?php
get_footer();
?>