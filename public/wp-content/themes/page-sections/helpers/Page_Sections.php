<?php

class Page_Sections {
    const PAGE_SECTIONS_TEMPLATE_PATH = 'template-parts/page-sections/';
    /**
     * @param $acfField
     *
     * @return bool
     */
    public static function getWrapperClasses() {
        if (! get_sub_field( 'wrapper_classes' ) ) {
            return false;
        }

        return get_sub_field( 'wrapper_classes' );
    }
}