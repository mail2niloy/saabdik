<?php
/**
*Template Name: New category page
*/
get_header();

?>
<div class="container-fluid">
	<div class="row" style="margin-top:60px">
	
	<?php
		$terms = apply_filters( 'taxonomy-images-get-terms', '' );
		if ( ! empty( $terms ) ) {
		    
		    foreach ( (array) $terms as $term ) {
		    	 $img_id=$term->image_id;
		    	?>
		   <div class="col-md-2 col-sm-3 col-xs-6">
      		<div class="thumbnail custom_cat_thum_div">
		    	<a href="<?php echo esc_url( get_term_link( $term, $term->taxonomy ) ) ?>">
		    	<!--<img src="<?php echo wp_get_attachment_url($term->image_id ); ?>" alt="Lights" style="width:100%;overflow:hidden;">-->
		    	<?php echo wp_get_attachment_image( $img_id, $size='thumbnail', $icon=false,array( "class" => "img-responsive" )); ?>
		    	<div class="caption custom_cat_caption_div">
		            <p><b><?php echo $term->name; ?></b></p>
		        </div>
		         </a>
		       </div>
    	</div>
		    	<?php
		    	
		       /* print '<li><a href="' . esc_url( get_term_link( $term, $term->taxonomy ) ) . '">' . wp_get_attachment_image( $term->image_id, 'full' ) . '</li>';
		         echo '  <h4>' . $term->name . '</h4>' . "\n";
		         echo '  <h4>' . wp_get_attachment_url($term->image_id ) . '</h4>' . "\n";*/
		    }
		   
		}
		
	?>
			
	</div>
</div>
<?php get_footer(); ?>