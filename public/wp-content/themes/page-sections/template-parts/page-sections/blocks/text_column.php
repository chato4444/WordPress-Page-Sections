<!-- BEGIN blocks/text_column -->
<!-- template-parts/sections/blocks/text_column -->
<?php /** @var string $equalHeightsClass */ ?>
<div class="block-text-column content-column <?php the_sub_field( 'column_width' ); ?> <?php the_sub_field( 'column_offset' ); ?> <?php the_sub_field( 'column_wrapper_classes' ); ?> <?php echo $equalHeightsClass; ?>">
    <div class="margin-auto <?php #echo $equal_heights_class; ?> <?php the_sub_field( 'content_align' ); ?>">
	    <?php if ( get_sub_field( 'image' ) ): ?>
		    <?php $image = get_sub_field( 'image' ); ?>
		    <?php if ( isset( $image['url'] ) ): ?>
			    <?php $altText = empty( $image['alt'] ) ? get_sub_field( 'heading' ) : $image['alt']; ?>
                <div class="block-text-column__image">
                    <img class="" src="<?php echo $image['url']; ?>" alt="<?php echo strip_tags( $altText ); ?>"/>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ( get_sub_field( 'heading' ) ): ?>
            <div class="block-text-column__heading">
                <?php the_sub_field( 'heading' ); ?>
            </div>
        <?php endif; ?>

	    <?php if ( get_sub_field( 'subheading' ) ): ?>
            <div class="block-text-column__subheading">
			    <?php the_sub_field( 'subheading' ); ?>
            </div>
	    <?php endif; ?>

        <?php if ( get_sub_field( 'cta_link' ) && get_sub_field( 'cta_text' ) ): ?>
            <div class="block-text-column__cta">
                <a class="btn-cta" href="<?php the_sub_field( 'cta_link' ); ?>">
                    <?php the_sub_field( 'cta_text' ); ?>
                </a>
            </div>
        <?php endif; ?>

	    <?php if ( get_sub_field( 'image_02' ) ): ?>
		    <?php $image = get_sub_field( 'image_02' ); ?>
		    <?php if ( isset( $image['url'] ) ): ?>
			    <?php $altText = empty( $image['alt'] ) ? get_sub_field( 'heading' ) : $image['alt']; ?>
                <div class="block-text-column__image-02">
                    <img class="" src="<?php echo $image['url']; ?>" alt="<?php echo $altText; ?>"/>
                </div>
		    <?php endif; ?>
	    <?php endif; ?>
    </div>
</div>
<!-- END blocks/text_column -->