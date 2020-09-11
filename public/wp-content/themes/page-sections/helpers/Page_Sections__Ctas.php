<?php

class Page_Sections__Ctas {
    /**
     * @param $acfField
     *
     * @return bool
     */
    public static function loadCtasFromAcfField( $acfField ) {
        if (! self::acfFieldHasCtas( $acfField) ) {
            return false;
        }
        foreach ( get_sub_field( $acfField ) as $cta ) {
            /**
             * Scope of $cta will persist in included cta PHP template
             */
            include( locate_template( "template-parts/page-sections/ctas/{$cta['type']}.php") );
        }

        return true;
    }

    public static function acfFieldHasCtas( $acfField ) {
        if (! get_sub_field( $acfField ) ) {
            return false;
        }

        return true;
    }
}