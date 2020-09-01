<?php if ( post_password_required() ) { return; } ?>

<div id="comments" class="post-comments">
	
	<?php

	$custom_comment_field = '<p class="comment-form-comment"><textarea id="comment" placeholder=" আপনার মতামত দিন" name="comment" cols="42" rows="4" aria-required="true"></textarea></p>';

	comment_form( array(
		'comment_field'			=> $custom_comment_field,
		'comment_notes_before' 	=> '',
		'comment_notes_after'	=> '',
		'logged_in_as' 			=> '',
		'title_reply'			=> esc_html__('', 'breaknews'),
		'cancel_reply_link'		=> esc_html__('মন্তব্য বাতিল করুন', 'breaknews'),
		'label_submit'			=> esc_html__('সংরক্ষণ করুন', 'breaknews')
	) );

	?>
	<div class="comments">
		<?php

			wp_list_comments( array(
				'style'        => 'ul',
				'avatar_size'  => '70',
				'max_depth'    => '4',
				'type'         => 'all',
				'callback'     => 'breaknews_comments'
			) );

			the_comments_navigation();

			//comment_form();

		?>
	</div>
</div>