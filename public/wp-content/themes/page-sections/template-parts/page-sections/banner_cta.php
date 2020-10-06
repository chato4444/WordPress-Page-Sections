<!-- BEGIN Banner CTA -->
<!-- template-parts/page-sections/banner_cta -->
<section class="banner-cta page-section <?php get_sub_field( 'wrapper_classes' ); ?>" style="background-image: url(<?php the_sub_field( 'background_image' ); ?>);">
	<div class="banner-cta__content">
        <?php if ( get_sub_field( 'heading' ) ): ?>
            <h2 class="banner-cta__heading" data-href="/">
                <?php the_sub_field( 'heading' ); ?>
            </h2>
        <?php endif; ?>
        <?php if ( get_sub_field( 'subheading' ) ): ?>
		<div class="banner-cta__subheading">
			<?php the_sub_field( 'subheading' ); ?>
		</div>
        <?php endif; ?>
        <div class="banner-cta__ctas">
	        <?php if ( get_sub_field( 'ctas' ) ): ?>
		        <?php foreach ( get_sub_field( 'ctas' ) as $cta ): ?>
                    <?php
                    /**
                     * CTA type should match template names in
                     * /template-parts/page-sections/ctas/
                     *
                     * Use locate_template() function instead of get_template_parts() to persist scope of variables
                     * from this template to included template
                     */
                    ?>
			        <?php include( locate_template( Page_Sections::PAGE_SECTIONS_TEMPLATE_PATH . "/ctas/{$cta['type']}.php") ); ?>
		        <?php endforeach; ?>
	        <?php endif; ?>
	    </div>
	</div>
</section>
<!-- END Banner CTA -->