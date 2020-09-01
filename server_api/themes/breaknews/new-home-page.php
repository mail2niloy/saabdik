<?php
/**
*Template Name: New home page
*/
get_header();
?>
<div class="container-fluid">
	<div class="row"style="margin-top:30px">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[smartslider3 slider=2]');?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 saabdik_version">
			<?php
			  $saabdik_version= new WP_Query(array(
                    'post_type'=>'saabdik_version',
                    'name'=>'প্রথম-সংস্করণ'
                  )); 
                  while($saabdik_version->have_posts()):$saabdik_version->the_post();
			?>
			<h2 class="saabdik_version_headline"><?php the_title(); ?></h2>

				<?php the_content(); ?>
            <?php endwhile; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<div class="head_line_div">
			<h2 class="head_line"> কবিতা </h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="152" order="ASC" orderby="title"]   '); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="head_line_div">
				<h2>ছোটগল্প</h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="215" order="DESC" orderby="date" count="10"]  '); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="head_line_div">
				<h2>ইতিহাসে খুঁজি</h2>
			</div>	
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="153" order="DESC" orderby="date" count="10"]'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="head_line_div">
				<h2>বিশেষ রচনা</h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="404" order="DESC" orderby="date" count="10"] '); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="head_line_div">
				<h2>ভ্ৰমণ কাহিনী</h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="408" order="ASC" orderby="title"]'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="head_line_div">
				<h2>চিত্রকলা</h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="467" order="ASC" orderby="title"]'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="head_line_div">
				<h2>খেলার দুনিয়া</h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="470" order="ASC" orderby="title"] '); ?>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>