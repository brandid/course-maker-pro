<?php
/**
 * Template for the Course Syllabus Displayed on individual course pages
 *
 * @author      LifterLMS
 * @package     LifterLMS/Templates
 * @since       1.0.0
 * @version     3.24.0
 */

defined( 'ABSPATH' ) || exit;
global $post;
$course   = new LLMS_Course( $post );
$sections = $course->get_sections();
?>

<div class="clear"></div>

<div class="llms-syllabus-wrapper">

<?php
$force_llms_default_styles = get_theme_mod( 'force_llms_default_styles', false );
if ( ! $force_llms_default_styles ) {
	// USE CUSTOM LLMS TEMPLATE.
	?>

	<div class="alignfull">

		<?php if ( ! $sections ) : ?>

			<?php esc_html_e( 'This course does not have any sections.', 'lifterlms' ); ?>

		<?php else : ?>

			<?php foreach ( $sections as $section ) : ?>

				<?php if ( apply_filters( 'llms_display_outline_section_titles', true ) ) : ?>
					<h3 class="llms-h3 llms-section-title"><?php echo esc_html( get_the_title( $section->get( 'id' ) ) ); ?></h3>
				<?php endif; ?>

				<?php $lessons = $section->get_lessons(); ?>
				<?php if ( $lessons ) :

					if ( ! $force_llms_default_styles ) : ?>
					<div class="lessons grid-style">
					<?php endif; ?>

						<?php foreach ( $lessons as $lesson ) : ?>

							<?php
							llms_get_template(
								'course/lesson-preview.php',
								array(
									'lesson'        => $lesson,
									'total_lessons' => count( $lessons ),
								)
							);
							?>

						<?php endforeach; ?>

					<?php
					if ( ! $force_llms_default_styles ) : ?>
					</div>
					<?php endif; ?>

				<?php	else : ?>

					<?php esc_html_e( 'This section does not have any lessons.', 'lifterlms' ); ?>

				<?php endif; ?>

			<?php endforeach; ?>

		<?php endif; ?>

	</div>

<?php
} else {
	// USE DEFAULT LLMS TEMPLATE.
	?>

		<?php if ( ! $sections ) : ?>

			<?php _e( 'This course does not have any sections.', 'lifterlms' ); ?>

		<?php else : ?>

			<?php foreach ( $sections as $section ) : ?>

				<?php if ( apply_filters( 'llms_display_outline_section_titles', true ) ) : ?>
					<h3 class="llms-h3 llms-section-title"><?php echo get_the_title( $section->get( 'id' ) ); ?></h3>
				<?php endif; ?>

				<?php $lessons = $section->get_lessons(); ?>
				<?php if ( $lessons ) : ?>

					<?php foreach ( $lessons as $lesson ) : ?>

						<?php
						llms_get_template(
							'course/lesson-preview.php',
							array(
								'lesson'        => $lesson,
								'total_lessons' => count( $lessons ),
							)
						);
						?>

					<?php endforeach; ?>

				<?php else : ?>

					<?php _e( 'This section does not have any lessons.', 'lifterlms' ); ?>

				<?php endif; ?>

			<?php endforeach; ?>

		<?php endif; ?>

	<?php } ?>

	<div class="clear"></div>

</div>
