<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"></main><!-- #main -->
		
		<nav class="navigation pagination" role="navigation">
			<a class="next page-numbers more_posts" href="#">More</a>
		</nav>
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<script id="template-single_post_item" type="text/x-simplr-template">
	<article id="post-$[id]" class="post-$[id] post type-post status-publish format-standard hentry">
		<header class="entry-header">
			<div class="entry-meta">
				<span class="screen-reader-text">Posted on</span> 
				<a href="$[permalink]" rel="bookmark">
					<time class="entry-date published">July 14, 2017</time>
				</a>
			</div>
			<h3 class="entry-title">
				<a href="$[permalink]" rel="bookmark">$[post_title]</a>
			</h3>
		</header>
		<div class="entry-content">
			<p>$[post_excerpt]</p>
		</div>
	</article>
</script>
<?php
get_footer();
