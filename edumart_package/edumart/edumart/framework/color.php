<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));

if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
global $edumart_redux_demo; 
$b=$edumart_redux_demo['main-color-1'];
$rgba = hex2rgb($b);  
?>
.navigation .nav-item:hover > .nav-link {
    color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?> !important;
}
.navigation .nav-item.active .nav-link, .navigation .nav-item:hover .nav-link , .navigation.navbar-sticky .nav-item.active .nav-link, .navigation.navbar-sticky .nav-item:hover .nav-link{
    color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.overlay.overlay-3.alpha-9:after {
    background-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
a {
    color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.accent {
    color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.nav-pills .nav-link.active, .show > .nav-pills .nav-link {
    color: #fff;
    background-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.bg-3 {
  background-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>; }
.border-3 {
  border-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>; }
.arrow.top.bg-3:after {
    border-bottom-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>; }
.arrow.bottom.bg-3:after {
    border-top-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>; }
.arrow.left.bg-3:after {
    border-right-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>; }
    .arrow.right.bg-3:after {
    border-left-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>; }
.pricing .slider-price .slider-selection {
    background: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.btn-outline-3 {
    color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
    background-color: transparent;
    background-image: none;
    border-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.btn-outline-3:hover {
    color: #fff;
    background-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
    border-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.btn-accent {
    color: #fff;
    background-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
    border-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.btn-primary {
    color: #fff;
    background-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
    border-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.form-submit input.submit {
  background: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
}
.wp-tag-cloud li a {
    border: 1px solid;
    color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
    background-color: transparent;
    border-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;}
.wp-tag-cloud li:hover a {
    color: #fff;
    background-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
    border-color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?>;
    text-decoration: none;
}
.dropdown-menu.show .active .nav-link {
    color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?> !important;
}
.navigation .nav-item:hover > .nav-link {
    color: <?php echo esc_attr($edumart_redux_demo['main-color-1']); ?> !important;
}