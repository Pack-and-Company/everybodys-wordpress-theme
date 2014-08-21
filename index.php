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
					$posttags = get_the_tags();
					if ($posttags) {
						foreach ( $posttags as $tag ) {
							if ( $tag->name == 'events' ) {
								?>
								<div class="events-list">
									<?php

					                $args = array(
					                    'post_type'   => 'events',
					                    'post_status' => 'publish',
					                    'orderby'     => 'menu_order',
					                    'order'       => 'ASC',
					                );
					                $events = get_posts( $args );

					                foreach ( $events as $event ) {

					                    setup_postdata($event);
				                        printf('<dl class="event-item">');
										printf(
											'<dt class="event-image"><a href="%s" title="%s"><img src="%s" width="190" height="269" alt="%s"></a></dt>',
											wp_get_attachment_url(get_post_thumbnail_id($event->ID)),
											$event->post_content,
											wp_get_attachment_url(get_post_thumbnail_id($event->ID)),
											$event->post_title
										);
										printf(
											'<dd class="event-info"><strong>%s</strong><br>%s<br><p>%s</p></dd>',
											$event->post_title,
											implode(', ', array(
															  get_post_meta($event->ID, '_event_date', true), 
															  get_post_meta($event->ID, '_event_time', true), 
															  get_post_meta($event->ID, '_event_price', true)
														 )),
											$event->post_content
										);
				                        printf('</dl>');
					                }
					                #wp_reset_postdata();
					                ?>
								</div>
								<?php
							}
						}
					}
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