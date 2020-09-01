<?php
/**
*Template Name: New author details
*/
get_header();
$author_name=$_REQUEST['a'];
$user_details= get_user_by('user_nicename',$author_name);
$the_user = get_user_by('login', $author_name);
$id=$the_user->ID;
//$user = get_user_by('slug','nicename');
?>
<div class="container-fluid">
	<div class="row" style="margin-top:32px">
		<div class="fb-profile">
	        <img align="left" class="fb-image-lg" src="http://www.saabdik.com/wp-content/uploads/2018/09/banner-background-img-6.jpg" width="100%"/>
	        <!--<img align="left" class="fb-image-profile thumbnail" src="<?php //echo esc_url( get_avatar_url( $id ) );?>" alt="Profile image example"/>-->
	        <?php echo get_avatar($id);

	        ?>
	        <div class="fb-profile-text">
	            <h1><?php the_author_meta('display_name', $id); ?></h1>
	            <p><?php the_author_meta('description', $id); 
	            ?>
	            
	            </p>
	        </div>
	    </div>
	</div>
	<div class="row">
		<h3 align="center"> <?php the_author_meta('display_name', $id); ?> এর প্রকাশিত লেখা</h3>
		<hr>
		<?php
		   //ini_set('display_errors', 1); 
		 $args=array(
 			'post_status' => 'publish',
 			'author' => $id
		 );
		 $breaknews_related_query = new wp_query( $args );
		  if( $breaknews_related_query->have_posts() ) : 
		  	while( $breaknews_related_query->have_posts() ) :
		  		$breaknews_related_query->the_post();
		  		//if ( has_post_thumbnail() ) :
		  		
				require_once( ABSPATH . 'wp-admin/includes/template.php' );
				//ini_set('display_errors', 1); 

					$args = array('post_id' => get_the_ID());
					/*rating show*/
					//echo $wpdb;
					//print_r($wpdb);
					$fivesdrafts = $wpdb->get_results( 
						"
						SELECT * 
						FROM wp_yasr_log
						WHERE post_id='$post_id'
						"
					);
					$sum = 0;
					$count=0;

					foreach($fivesdrafts as $fivesdraf) :
						//print_r($fivesdraf);
						$vote=$fivesdraf->vote;
						$sum = $sum + (int)$vote;
							 $count++; 
					endforeach;

						if($count != 0){ 
							$rating_result=$sum/$count;
						}else {
							$rating_result= 0;
						}
		?>
		<div class="col-md-4">
			<div class="thumbnail">
				<?php
					if ( has_post_thumbnail() ){
				?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="related-img">
					<?php the_post_thumbnail('breaknews-misc-thumb',array('style'=>"width:100%;height:260px;overflow:hidden;")); ?>
				</a>
				<?php
					}
				else{
					?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/dummy.jpeg" style="width:100%;height:260px;overflow:hidden;">
				<?php
					}
				?>
				<div class="caption">
		            <a href="<?php echo esc_url( get_permalink() ); ?>"><h4><?php the_title(); ?></h4></a>
		            <div class="row">
		            	<div class="col-md-6 col-xs-6 col-sm-6">
		            		<!--<span class="date"><?php //the_time( get_option('date_format') ); ?></span>-->
		            		<span class="fa fa-star"> <?php echo round($rating_result, 1); //$post_meta_value = get_post_meta( $post_id, '_kksr_avg', true ); ?> রেটিং</span> 
		            	</div>
		            	<div class="col-md-6 col-xs-6 col-sm-6 views">
		            	<span class="fa fa-eye"> <?php echo getPostViews(get_the_ID());  ?> পাঠক</span>
		            	</div>
		            </div>
		        </div>
			</div>
		</div>
		<?php
				//endif; 
			endwhile;
		endif;
		?>
	</div>
</div>
<?php
get_footer();
?>