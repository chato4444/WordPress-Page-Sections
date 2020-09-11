<?php

class Page_Sections {
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