<style type="text/css">
a {
color: #178ff6;
}
a:visited {
   color: #178ff6;
   }
   body{
   background: #121111;
   font-size: 16px;
   font-family: Lucida Sans;
   color: #cacaca;
   }
div.custom_content
{
   margin: 10px 10px 10px 10px;
   padding: 10px 10px 10px 10px;
 
 }
 
 .alignleft {
   margin: 20px 20px 20px 10px !important;

 }

</style>

<?php
/*Styles added above and below for blog page customization*/

$sidebar_select = get_post_meta($post->ID, 'sidebar_select', true);
if ($sidebar_select == 'right') {
    $sidebar_select_aside_classes = '';
    $sidebar_select_content_classes = '';
} else {
    $sidebar_select_aside_classes = 'col-sm-pull-8';
    $sidebar_select_content_classes = 'col-sm-push-4';
}
if (empty($sidebar_select) || ($sidebar_select == 'none')) {
?>
    <div <?php post_class('content row'); ?>>
        <div style="background: #121111;" class="col-xs-12 content-column">
           
            <div style="text-align: center;">
            <h2><?php  the_title();?></h2>
           <?php 
            
            the_post_thumbnail('large');
          ?></div><div class="custom_content"><?php the_content();
            ?></div>
            <?php nimbus_clear();
           get_template_part( 'parts/wp_link_pages');
            //get_template_part( 'parts/tax_tags');
            ?>
            
            <?php if (comments_open()) { ?><p class="text-left"><a href="<?php the_permalink(); ?>#comments" ><?php comments_number( 'No comments', 'One comment', '% comments' ); ?></a></p><?php } ?>
             <?php 
            comments_template();
            //get_template_part( 'parts/single_post_nav');
            ?>
            </div>
        </div>
<?php 
} else {
?>
    <div <?php post_class('content row'); ?>>

        <div class="col-sm-8 content-column <?php echo $sidebar_select_content_classes; ?>">
            <div class="row single_meta">
                <div class="col-sm-8">
                    <p> 
                    <?php 
                    _e('Posted by ', 'wp-simple' );  
                    the_author_posts_link(); 
                    _e(' on ', 'wp-simple' );
                    the_time(get_option( 'date_format' ));
                    ?></p>
                </div>
                <div class="col-sm-4">
                    <?php if (comments_open()) { ?><p class="text-right"><a href="<?php the_permalink(); ?>#comments" ><?php comments_number( 'No comments', 'One comment', '% comments' ); ?></a></p><?php } ?>
                </div>
            </div>
            <?php        
            the_content();
            nimbus_clear();
            get_template_part( 'parts/wp_link_pages');
            get_template_part( 'parts/tax_tags');
            comments_template();
            get_template_part( 'parts/single_post_nav');
            ?>
        </div>
        <div class="col-sm-4 <?php echo $sidebar_select_aside_classes; ?>">
            <?php
            get_sidebar();
            ?>
        </div>        
    </div>
<?php
}
?>

                    

                        
              
 
  
