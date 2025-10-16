<?php
/**
 * Template Part: Related Posts
 *
 * @package xroof
 */

$current_id  = get_the_ID();
$categories  = wp_get_post_categories( $current_id );

if ( ! empty( $categories ) ) :
	$args = array(
		'category__in'   => $categories,
		'post__not_in'   => array( $current_id ),
		'posts_per_page' => 3,
	);

	$related_query = new WP_Query( $args );

	if ( $related_query->have_posts() ) :
		?>
		<section class="blog blog--style-1 related-posts">
			<div class="blog__container container pt-0">
				<h2 class="blog__title title-xl mb-6">
					<?php echo esc_html__( 'Related Posts', 'xroof' ); ?>
				</h2>

				<div class="row g-4 overflow-hidden pb-2">
					<?php
					while ( $related_query->have_posts() ) :
						$related_query->the_post();
						?>
						<div class="col-12 col-md-6 col-xl-4">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card d-flex flex-column h-100' ); ?>>
								<div class="blog-card__header">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="blog-card__image-wrap">
											<a href="<?php echo esc_url( get_permalink() ); ?>">
												<?php
												the_post_thumbnail(
													'large',
													array(
														'class' => 'blog-card__image',
														'alt'   => esc_attr( get_the_title() ),
													)
												);
												?>
											</a>
										</div>
									<?php endif; ?>

									<?php get_template_part( 'template-parts/blog-part/badge' ); ?>
								</div>

								<div class="blog-card__body">
									<?php if ( get_the_title() ) : ?>
										<a href="<?php echo esc_url( get_permalink() ); ?>">
											<h5 class="blog-card__title mb-2">
												<?php echo esc_html( wp_html_excerpt( get_the_title(), 80, '...' ) ); ?>
											</h5>
										</a>
									<?php endif; ?>

									<?php if ( get_the_excerpt() ) : ?>
										<p class="blog-card__text">
											<?php echo esc_html( wp_html_excerpt( get_the_excerpt(), 100, '...' ) ); ?>
										</p>
									<?php endif; ?>

									<?php get_template_part( 'template-parts/blog-part/button' ); ?>
								</div>
							</article>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
		<?php
	endif;
endif;

?>
