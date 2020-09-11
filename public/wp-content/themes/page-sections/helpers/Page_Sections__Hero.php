<?php
class Page_Sections__Hero
{
    /**
     * @return bool
     */
    public static function hasCtas() {
        if ( ! get_sub_field( 'primary_cta_link' ) && ! get_sub_field( 'primary_cta_text' ) ) {
            return false;
        }
        if ( ! get_sub_field( 'secondary_cta_link' ) && ! get_sub_field( 'secondary_cta_text' )) {
            return false;
        }

        return true;
    }
}