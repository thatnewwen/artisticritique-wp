<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artisticritique
 */

?>

<?php if ( is_single() ) { ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php } else { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("multipost"); ?>>
<?php } ?>

  <?php the_post_thumbnail('full'); ?>
  <div class="overlay">
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<h2 class="category-title"><?php the_category(', ',''); ?></h2>
			Posted on
			<?php  the_time('F j, Y'); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
	<?php
		if ( is_single() ) : ?>
			<div class="content">
				<?php the_content(); ?>
			</div>
			<div class="post-meta">
			  <?php
			    $post = get_the_ID();
			    $picture = get_post_meta($post, '-picture', true);
			    $poster = get_post_meta($post, '-poster', true);
			    $score = get_post_meta($post, '-score', true);
			    $title = get_post_meta($post, '-title', true);
			    
			    if ($picture != '') {
			      echo "<img class='picture' src='" . $picture . "'>";
			    }

			    if ($poster != '') {
			      echo "<img class='poster' src='" . $poster . "'>";
			    }

			    if ($title != '') {
			    	echo "<div class='title'>" . $title . "</div>";
			    }

			    echo "<div class='border-right'></div>";

			    $fields = get_post_custom();
			    foreach ( $fields as $key => $value ) {
			      if (strpos($key, '=') === 0) {
			        echo "<div class='key'>" . substr($key, 1) . "</div>";
			        echo "<div>" . join($value) . "</div>";
			      }
			      else if (strpos($key, '-') !== 0 && strpos($key, '_') !== 0) {
			        echo "<div class='key'>" . $key . "</div>";

			        $tags = explode(', ', $value[0]);

			        foreach($tags as $tag) {

			          $tagUrl = site_url() . "/?tag=" . str_replace(' ', '-', $tag);
			          echo "<div class='tag-name'> <a href='" . $tagUrl . "'>" . $tag . "</a></div>";
			        }
			      }
			    }

			    echo "<div class='score'>" . $score . "</div>";
			  ?>
			</div>
		<?php endif; ?>

	</div>


	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
