<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php
	$redirect_url = sprintf("%s#%s", get_home_url(), $post->post_name);
	header("Location: $redirect_url");
	die();
?>
<?php endwhile; wp_reset_query(); ?>
