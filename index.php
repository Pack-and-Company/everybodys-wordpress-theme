<?php get_header(); ?>

<?php if ( have_posts() ): ?>
  <?php while ( have_posts() ) : the_post(); ?>

<div id="home" class="page" style="background-image: url(<?=the_post_thumbnail();?>)">
	<div class="wrapper">
		<div class="container menu">
			<a href="#home"><img src="images/logo.png"></a>
			<ul class="nav">
				<li><a class="icon-menu" href="#menus">Menus</a></li>
				<li><a class="icon-phone" href="#contact">Contact</a></li>
				<li><a class="icon-pencil" href="#bookings">Bookings</a></li>
				<li><a class="icon-camera" href="#gallery">Gallery</a></li>
			</ul>
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
        </ul>
			</div>
		</div>
	</div>
</div>

  <?php endwhile; wp_reset_query(); ?>
<?php else: ?>
  <h2>No posts found</h2>
<?php endif; ?>

<?php get_footer(); ?>