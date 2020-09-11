<!-- BEGIN Hero -->
<!-- template-parts/sections/hero -->
<section class="hero section <?php echo Page_Sections::getWrapperClasses() ?>">
    <div class="bg-image-layer" style="background-image: url(<?php the_sub_field( 'background_image' ); ?>);"></div>

    <div class="content">
        <div class="content-position">
            <?php if ( get_sub_field( 'heading' ) ): ?>
                <h1 class="hero__heading">
                    <?php the_sub_field( 'heading' ); ?>
                </h1>
            <?php endif; ?>
            <?php if ( get_sub_field( 'subheading' ) ): ?>
                <div class="hero__subheading">
                    <?php the_sub_field( 'subheading' ); ?>
                </div>
            <?php endif; ?>

            <?php if ( Page_Sections__Ctas::acfFieldHasCtas( 'ctas' ) ): ?>
                <div class="hero__ctas">
                    <?php Page_Sections__Ctas::loadCtasFromAcfField( 'ctas' ); ?>
                </div>
            <?php endif; ?>
        </div>
	</div>
</section>
<!-- END Hero -->
