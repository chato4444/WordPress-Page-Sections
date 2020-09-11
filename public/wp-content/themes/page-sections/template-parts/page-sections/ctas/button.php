<?php
/**
 * @var TYPE_NAME $cta - in scope from parent include page
 *
 * $cta['link'] references a required ACF field
 * $cta['button_text'] if ACF is left blank the array index will still be set
 * $cta['button_style'] ACF selection has a default value, array index will always be set
 */
?>

<!-- template-parts/section/ctas/default -->
<a class="btn-cta <?php echo $cta['button_style']; ?>" href="<?php echo $cta['link']; ?>">
    <?php echo $cta['button_text']; ?>
</a>