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
			<a href="#home"><img src="<?=get_theme_mod('theme_logo', 'http://placehold.it/263x162');?>"></a>
			<?php eb_get_nav_menu($menu_data); ?>
		</div>
		<div class="container main">
			<div class="content">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			<div class="footer">
				<p>7 Fort Lane or 44 Queen St, Auckland - Lunch &amp; dinner till late.<br />
		        <strong>Phone:</strong> 09 929 2702 or <strong>Email: </strong><a href="mailto:info@everybodys.co.nz">info@everybodys.co.nz</a><br />
		        &copy; 2014 Everybody's</p>
			</div>
		</div>
	</div>
</div>

  <?php endwhile; wp_reset_query(); ?>
<?php else: ?>
  <h2>No posts found</h2>
<?php endif; ?>

<?php get_footer(); ?>