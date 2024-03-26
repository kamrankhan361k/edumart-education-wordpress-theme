<?php $edumart_redux_demo = get_option('redux_demo');?> 
<!-- Start Footer -->
<footer class="footer"> 
<!-- Start Footer Top -->
    <div class="container">
        <div class="row row1">
            <div class="col-sm-9 clearfix">
                <div class="foot-nav">
                    <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-1' ); ?>
                    <?php endif; ?>
                </div>
                <div class="foot-nav">
                    <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-2' ); ?>
                    <?php endif; ?>
                </div>
                <div class="foot-nav">
                    <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-3' ); ?>
                    <?php endif; ?>
                </div>
                <div class="foot-nav">
                    <?php if ( is_active_sidebar( 'footer-area-4' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-4' ); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-3">
                <?php if ( is_active_sidebar( 'footer-area-5' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-area-5' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- End Footer Top --> 
  <!-- Start Footer Bottom -->
  <div class="bottom">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
            <div class="connect-us">
                <?php if(isset($edumart_redux_demo['socials_title']) && ($edumart_redux_demo['socials_title'] != '')){?>
                <h3><?php echo wp_kses_post($edumart_redux_demo['socials_title']); ?></h3>
                <?php } ?>
                <ul class="follow-us clearfix">
                    <?php if(isset($edumart_redux_demo['f_link_social_1']) && ($edumart_redux_demo['f_link_social_1'] != '')){?>
                    <li><a href="<?php echo esc_url($edumart_redux_demo['f_link_social_1']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['f_social_1']); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                    <?php if(isset($edumart_redux_demo['f_link_social_2']) && ($edumart_redux_demo['f_link_social_2'] != '')){?>
                    <li><a href="<?php echo esc_url($edumart_redux_demo['f_link_social_2']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['f_social_2']); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                    <?php if(isset($edumart_redux_demo['f_link_social_3']) && ($edumart_redux_demo['f_link_social_3'] != '')){?>
                    <li><a href="<?php echo esc_url($edumart_redux_demo['f_link_social_3']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['f_social_3']); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                    <?php if(isset($edumart_redux_demo['f_link_social_4']) && ($edumart_redux_demo['f_link_social_4'] != '')){?>
                    <li><a href="<?php echo esc_url($edumart_redux_demo['f_link_social_4']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['f_social_4']); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                    <?php if(isset($edumart_redux_demo['f_link_social_5']) && ($edumart_redux_demo['f_link_social_5'] != '')){?>
                    <li><a href="<?php echo esc_url($edumart_redux_demo['f_link_social_5']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['f_social_5']); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="subscribe">
                <?php print do_shortcode('[contact-form-7 id="13" title="Footer Subscribe"]'); ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="instagram">
                <?php if ( is_active_sidebar( 'footer-area-6' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-area-6' ); ?>
                <?php endif; ?>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Footer Bottom --> 
</footer>
<!-- End Footer --> 
<!-- Scroll to top --> 
<a href="#" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a> 
<?php wp_footer(); ?>
</body>
</html>