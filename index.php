<?php get_header(); ?>

<?php

$args = array(
    'post_type'   => 'post',
    'post_status' => 'publish',
    'orderby'     => 'menu_order',
    'order'       => 'ASC',
    'numberposts' => 10,
);
$menu_data = get_posts( $args );

function eb_get_nav_menu($menu_data) {
	echo '<ul class="nav">';
	#print_r($menu_data);
	$item_format = '    <li><a class="icon-%s" href="#%s">%s</a></li>';
	foreach ( $menu_data as $menu_item ) {
		if ( $menu_item->post_name != "home" ) {
			printf($item_format, $menu_item->post_name, $menu_item->post_name, $menu_item->post_title);
		}
	}
	echo '</ul>';
}

?>

<?php if ( have_posts() ): ?>
  <?php while ( have_posts() ) : the_post(); ?>

<div id="<?=$post->post_name;?>" class="page" style="background-image: url(<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>)">
	<div class="wrapper">
		<div class="container menu">
			<a href="#home"><img src="<?=get_theme_mod('theme_logo', get_template_directory_uri() . '/images/263x162.gif');?>"></a>
			<?php eb_get_nav_menu($menu_data); ?>
		</div>
		<div class="container main">
			<div class="content">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<?php
					print_r( get_the_tags() );
				?>
			</div>
			<div class="footer">
				<p><?=get_theme_mod('eb_address');?><br />
		        <strong>Phone:</strong> <?=get_theme_mod('eb_phone');?> or <strong>Email: </strong><a href="mailto:<?=get_theme_mod('eb_email_address');?>"><?=get_theme_mod('eb_email_address');?></a><br />
		        &copy; 2014 <?=bloginfo( 'name' );?></p>
			</div>
		</div>
	</div>
</div>

  <?php endwhile; wp_reset_query(); ?>
<?php else: ?>
  <h2>No posts found</h2>
<?php endif; ?>

<?php get_footer(); ?>