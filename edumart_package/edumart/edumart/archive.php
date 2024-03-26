<?php
$edumart_redux_demo = get_option('redux_demo');
get_header(); ?>
<!-- Start Banner -->
<div class="inner-banner blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h1><?php if ( is_day() ) :
                        printf( esc_html__( 'Daily Archives: %s', 'edumart' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'edumart' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'edumart' ) ) );
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'edumart' ), get_the_date( _x( 'Y', 'yearly archives date format', 'edumart' ) ) );
                        else :
                            echo esc_html__( 'Archives', 'edumart' );
                        endif;?></h1>
                    <?php if(isset($edumart_redux_demo['blog_desc']) && $edumart_redux_demo['blog_desc'] != ''){?>
                    <p><?php echo wp_specialchars_decode(esc_attr($edumart_redux_demo['blog_desc']));?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner --> 
<!-- Start Blog -->
<div class="container blog-wrapper padding-lg">
    <div class="row"> 
        <!-- Start Left Column -->
        <div class="col-sm-8 blog-left">
            <ul class="blog-listing">
                <?php 
                    while (have_posts()): the_post();  
                    ?>
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
                            <?php echo esc_html__( 'Posted By : ', 'edumart' ); } ?><span class="bold"><?php the_author(); ?></span></li>
                        <li><span class="icon-chat-icon ico"></span><?php comments_number( esc_html__('0 Comments', 'edumart'), esc_html__('1 Comment', 'edumart'), esc_html__('% Comments', 'edumart') ); ?></li>
                        <?php if ( get_the_tags() ) : ?>
                        <?php foreach ( get_the_tags() as $tag ) : ?>
                        <li><span class="label"><?php echo esc_html( $tag->name ); ?></span></li>
                        <?php endforeach; ?> 
                        <?php endif; ?>
                    </ul>
                    <p><?php echo esc_attr(edumart_excerpt(30));?></p>
                    <a href="<?php the_permalink();?>" class="read-more"><span class="icon-play-icon"></span><?php if(isset($edumart_redux_demo['read_more'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($edumart_redux_demo['read_more']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Read more', 'edumart' ); } ?></a> 
                </li>
                <?php endwhile; ?>
            </ul>
        <?php edumart_pagination(); ?>
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
<!-- End Blog --> 
<?php
get_footer();
?>