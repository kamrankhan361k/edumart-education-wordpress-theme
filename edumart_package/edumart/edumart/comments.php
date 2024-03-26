<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) : ?>
    <div class="comments-wrapper padding-lg">
        <h4 class="comment-title"><?php comments_number( esc_html__('0 Comments', 'edumart'), esc_html__('1 Comment', 'edumart'), esc_html__('% Comments', 'edumart') ); ?></h4>
        <!--  Nav Tabs  -->
        <!-- Tab panes -->
        <ul class="row comments">
            <?php wp_list_comments('callback=edumart_theme_comment'); ?> 
        </ul>
    </div>
    <?php
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
        <div class="pagination_area">
            <nav>
                <ul class="pagination">
                    <li> <?php paginate_comments_links( 
                          array(
                          'prev_text' => wp_specialchars_decode( '<i class="fa fa-angle-left"></i>',ENT_QUOTES),
                          'next_text' => wp_specialchars_decode( '<i class="fa fa-angle-right"></i>',ENT_QUOTES),
                          ));  ?>
                    </li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
    <!-- END PAGINATION -->
<?php endif; ?>        
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
            'id_form' => 'contact-form',        
            'class_form' => '',                         
            'title_reply'=> esc_html__( 'Leave A Comment', 'edumart' ),
            'title_reply_before' => '<h4 class="comment-title">',
            'title_reply_after'  => '</h4>',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author'=> '<div class="row1 clearfix">
                                <input name="author" id="author" type="text" placeholder="'.esc_attr__('Full Name', 'littleones').'" required="'.esc_attr__('required', 'littleones').'" data-error="'.esc_attr__('Name is required.', 'edumart').'">',
                'email' => '    <input type="email" name="email" id="mail" placeholder="'.esc_attr__('Email Address', 'edumart').'" required="'.esc_attr__('required', 'edumart').'" data-error="'.esc_attr__('Valid email is required.', 'edumart').'">
                            </div>', 
            ) ),   
            'comment_field' => '<textarea class="form-field" name="comment" id="comments" rows="6" placeholder="'.esc_attr__('Write a comment...', 'edumart').'" required="'.esc_attr__('required', 'edumart').'" data-error="'.esc_attr__('Please,leave us a message.', 'edumart').'"></textarea>',

            'label_submit' => esc_html__( 'Post A Comment', 'edumart' ),
            'submit_button' =>  '<button type="submit" class="btn"'.esc_attr__('%4$s', 'edumart').' id="%2$s">Post A Comment <span class="icon-more-icon"></span></button>',
            'submit_field' =>   esc_attr__('%1$s', 'edumart').' '.esc_attr__('%2$s', 'edumart'),
            'comment_notes_before' => '',
            'comment_notes_after' => '',             
        )
    ?>
    <?php if ( comments_open() ) : ?>
        <div class="leave-comment">
            <?php comment_form($comment_args); ?>
        </div>
    <?php endif; ?>    
