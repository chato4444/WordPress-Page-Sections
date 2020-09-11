<!-- BEGIN blocks/image_column -->
<!-- template-parts/sections/blocks/image_column -->
<?php /** @var string $equalHeightsClass */ ?>
<div class="block-image-column content-column <?php the_sub_field( 'column_width' ); ?> <?php the_sub_field( 'column_offset' ); ?> <?php echo $equalHeightsClass; ?> <?php the_sub_field( 'column_wrapper_classes' ); ?>">
    <?php
    $columnImage = '';
    if ( get_sub_field( 'image' ) ) {
        $columnImage = get_sub_field( 'image' );
    }
    ?>
    <?php if ( isset( $columnImage['url'] ) ): ?>
        <img src="<?php echo $columnImage['url'] ?>" />
    <?php endif; ?>
</div>
<!-- END blocks/image_column -->
