<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
$edumart_redux_demo = get_option('redux_demo');
get_header(); ?> 
<!-- Start Banner -->
<div class="inner-banner blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h1><?php if(isset($edumart_redux_demo['404_heading'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($edumart_redux_demo['404_heading']));?>
                    <?php }else{?>
                    <?php echo esc_html__( '404 Page', 'edumart' );
                    }?></h1>
                    <?php if(isset($edumart_redux_demo['404_description'])){?>
                    <p><?php echo htmlspecialchars_decode(esc_attr($edumart_redux_demo['404_description']));?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner --> 
<!-- Start 404 -->
<div class="container">
    <div class="not-found-wrapper" style="background-image:url(<?php echo esc_url($edumart_redux_demo['404_background']['url']); ?>)">
        <h1><?php if(isset($edumart_redux_demo['404_title'])){?>
        <?php echo htmlspecialchars_decode(esc_attr($edumart_redux_demo['404_title']));?>
        <?php }else{?>
        <?php echo esc_html__( '404', 'edumart' );
        }?></h1>
        <p><?php if(isset($edumart_redux_demo['404_desc'])){?>
        <?php echo htmlspecialchars_decode(esc_attr($edumart_redux_demo['404_desc']));?>
        <?php }else{?>
        <?php echo esc_html__( 'This Page not Fount', 'edumart' );
        }
        ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn"><?php if(isset($redux_demo['404_button'])){?>
            <?php echo htmlspecialchars_decode($redux_demo['404_button']);?>
            <?php }else{?>
            <?php echo esc_html__( 'Back To Home', 'edumart' );
            }
            ?><span class="icon-more-icon"></span></a> 
    </div>
</div>
<!-- End 404 --> 
<?php get_footer(); ?>