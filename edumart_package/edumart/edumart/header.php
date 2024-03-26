<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php $edumart_redux_demo = get_option('redux_demo'); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
        ?>
    <link rel="shortcut icon" href="<?php if(isset($edumart_redux_demo['favicon']['url'])){?><?php echo esc_url($edumart_redux_demo['favicon']['url']); ?><?php }?>">
    <?php }?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Start Preloader -->
<div id="loading">
    <div class="element">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
</div>
<!-- End Preloader -->
<!-- Start Header -->
<header> 
    <!-- Start Header top Bar -->
    <div class="header-top">
        <div class="container clearfix">
            <ul class="follow-us hidden-xs">
                <?php if(isset($edumart_redux_demo['link_social_1']) && ($edumart_redux_demo['link_social_1'] != '')){?>
                <li><a href="<?php echo esc_url($edumart_redux_demo['link_social_1']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['social_1']); ?>" aria-hidden="true"></i></a></li>
                <?php } ?>
                <?php if(isset($edumart_redux_demo['link_social_2']) && ($edumart_redux_demo['link_social_2'] != '')){?>
                <li><a href="<?php echo esc_url($edumart_redux_demo['link_social_2']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['social_2']); ?>" aria-hidden="true"></i></a></li>
                <?php } ?>
                <?php if(isset($edumart_redux_demo['link_social_3']) && ($edumart_redux_demo['link_social_3'] != '')){?>
                <li><a href="<?php echo esc_url($edumart_redux_demo['link_social_3']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['social_3']); ?>" aria-hidden="true"></i></a></li>
                <?php } ?>
                <?php if(isset($edumart_redux_demo['link_social_4']) && ($edumart_redux_demo['link_social_4'] != '')){?>
                <li><a href="<?php echo esc_url($edumart_redux_demo['link_social_4']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['social_4']); ?>" aria-hidden="true"></i></a></li>
                <?php } ?>
                <?php if(isset($edumart_redux_demo['link_social_5']) && ($edumart_redux_demo['link_social_5'] != '')){?>
                <li><a href="<?php echo esc_url($edumart_redux_demo['link_social_5']); ?>"><i class="<?php echo wp_kses_post($edumart_redux_demo['social_5']); ?>" aria-hidden="true"></i></a></li>
                <?php } ?>
            </ul>
            <div class="right-block clearfix">
                <?php 
                wp_nav_menu( 
                array( 
                    'theme_location' => 'top_header_menu',
                    'container' => '',
                    'menu_class' => '', 
                    'menu_id' => '',
                    'menu'            => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'echo'            => true,
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new edumart_wp_bootstrap_navwalker(),
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id=" %1$s" class="top-nav hidden-xs  %2$s">%3$s</ul>',
                    'depth'           => 0,        
                )
                ); ?>
                <div class="lang-wrapper">
                    <div class="select-lang2">
                        <select class="custom_select">
                            <option value="en">English</option>
                            <option value="fr">French</option>
                            <option value="de">German</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header top Bar --> 
    <!-- Start Header Middle -->
    <div class="container header-middle">
        <div class="row"> 
            <span class="col-xs-6 col-sm-3">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if(isset($edumart_redux_demo['logo']['url']) && ($edumart_redux_demo['logo']['url'] != '')){?>
                    <img src="<?php echo esc_url($edumart_redux_demo['logo']['url']); ?>" class="img-responsive" alt="">
                    <?php }else{ ?>
                    <img src="<?php echo get_template_directory_uri();?>/images/logo.png" class="img-responsive" alt="">
                    <?php } ?>
                </a>
            </span>
            <div class="col-xs-6 col-sm-3"></div>
            <div class="col-xs-6 col-sm-9">
                <div class="contact clearfix">
                    <ul class="hidden-xs">
                        <?php if(isset($edumart_redux_demo['email']) && ($edumart_redux_demo['email'] != '')){?>
                        <li><?php echo wp_kses_post($edumart_redux_demo['email']); ?></li>
                        <?php } ?>
                        <?php if(isset($edumart_redux_demo['phone']) && ($edumart_redux_demo['phone'] != '')){?>
                        <li><?php echo wp_kses_post($edumart_redux_demo['phone']); ?></li>
                        <?php } ?>
                    </ul>
                    <a href="#" class="login">Student Login <span class="icon-more-icon"></span></a> </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle --> 
        <!-- Start Navigation -->
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <form class="navbar-form navbar-right">
                        <input type="text" name="s" placeholder="Search Now" class="form-control">
                        <button class="search-btn" type="submit"><span class="icon-search-icon"></span></button>
                    </form>  
                    <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary',
                            'container' => '',
                            'menu_class' => '', 
                            'menu_id' => '',
                            'menu'            => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'echo'            => true,
                             'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                             'walker'            => new edumart_wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="nav navbar-nav %2$s">%3$s</ul>',
                            'depth'           => 0,        
                        )
                    ); ?>
                </div>
            </div>
        </nav>
        <!-- End Navigation --> 
</header>
<!-- End Header --> 