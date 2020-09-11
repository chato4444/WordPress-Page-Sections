<!-- BEGIN Icon Grid -->
<!-- template-parts/sections/icon_grid -->
<section class="icon-grid section section--white <?php the_sub_field( 'background_color' ) ?> <?php the_sub_field( 'wrapper_classes' ); ?>">
	<?php if ( get_sub_field( 'heading' ) ): ?>
        <h2 class="icon-grid__heading">
            <?php the_sub_field( 'heading' ); ?>
        </h2>
    <?php endif; ?>
    <?php if ( get_sub_field( 'grid_items' ) ): ?>
        <div class="icon-grid-items row row--x-center row--align-top">
	        <?php while ( has_sub_field( 'grid_items' ) ): ?>
	            <?php $icon = get_sub_field( 'icon' ); ?>
                <?php if ( isset( $icon['url'] ) ): ?>
                    <?php $icon_alt = empty( $icon['alt'] ) ? get_sub_field( 'heading' ) : $icon['alt']; ?>
                    <div class="icon-grid-item <?php the_sub_field( 'column_width' ); ?> <?php the_sub_field( 'column_offset' ); ?>">
                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon_alt; ?>"/>
                        <div class="icon-grid-item__heading">
                            <?php the_sub_field( 'heading' ); ?>
                        </div>
                        <div class="icon-grid-item__subheading">
	                        <?php the_sub_field( 'subheading' ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <?php if ( get_sub_field( 'cta_link' ) && get_sub_field( 'cta_text') ): ?>
        <div class="icon-grid__cta">
            <a href="<?php the_sub_field( 'cta_link' ); ?>" class="btn-cta btn-cta--wide"><?php the_sub_field( 'cta_text' ); ?></a>
        </div>
    <?php endif; ?>
</section>
<!-- END Icon Grid -->