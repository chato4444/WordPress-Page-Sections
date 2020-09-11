<!-- BEGIN Content Columns -->
<!-- template-parts/sections/content_columns -->
<?php
// Must be set prior to while loop, field is not in scope inside of the loop.
$equalHeightsClass = '';
if ( get_sub_field( 'force_equal_heights' ) == 'true' ) {
	$equalHeightsClass = 'equal-height';
}
?>
<section class="content-columns page-section <?php the_sub_field( 'wrapper_classes' ) ?> <?php the_sub_field( 'column_style' ) ?> <?php the_sub_field( 'background_color' ) ?>" data-section-name="<?php the_sub_field( 'section_name' ); ?>">

    <?php $headingClass = ''; ?>
	<?php if ( ! get_sub_field( 'subheading' ) ): ?>
        <?php $headingClass = 'content-columns__heading--no-subheading'; ?>
    <?php endif; ?>

    <?php if ( get_sub_field( 'heading' ) ): ?>
        <h2 class="content-columns__heading <?php echo $headingClass; ?>">
            <?php the_sub_field( 'heading' ); ?>
        </h2>
    <?php endif; ?>
	<?php if ( get_sub_field( 'subheading' ) ): ?>
        <div class="content-columns__subheading">
			<?php the_sub_field( 'subheading' ); ?>
        </div>
	<?php endif; ?>

    <?php
    $containerClass = 'container';
    if ( get_sub_field( 'content_is_full_width' ) ) {
        $containerClass = 'container-fluid';
    }
    ?>
    <div class="content-columns__blocks row row--x-center row--y-center <?php echo $containerClass; ?>">
        <?php if ( get_sub_field( 'column' ) ): ?>
            <?php while ( has_sub_field( 'column' ) ): ?>
                <?php if ( ! empty( get_row_layout() ) ) : ?>
                    <?php
                    /**
                     * Row layout identifiers should match template names in
                     * /template-parts/page-sections/blocks/
                     *
                     * Use locate_template() function instead of get_template_parts() to persist scope of variables
                     * from this template to included template
                     */
                    ?>
                    <?php include( locate_template( 'template-parts/page-sections/blocks/' . get_row_layout() . '.php') ); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<!-- END Content Columns -->