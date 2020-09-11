<?php
class ACF_Image {

	/**
	 * @param $field
	 *
	 * @return bool
	 */
	public static function getImage( $field ) {
		if ( ! get_sub_field( $field ) && ! get_field( $field ) ) {
			return false;
		}

		// Try sub field first, try regular field as fallback
		$image = get_sub_field( $field );

		if (! isset( $image['url'] ) ) {
			$image = get_field( $field );
		}

		if (! isset( $image['url'] ) ) {
			return false;
		}

		return $image['url'];
	}

	/**
	 * @param $image
	 *
	 * @return array|bool|mixed
	 */
	public static function getImageArray( $image ) {
		if ( is_array( $image ) && isset( $image['id'] ) ) {
			return $image;
		}
		if ( ! get_sub_field( $image ) && ! get_field( $image ) ) {
			return false;
		}
		// Try sub field first, try regular field as fallback
		$image = get_sub_field( $image );
		if (! isset( $image['url'] ) ) {
			$image = get_field( $image );
		}
		if ( empty( $image ) ) {
			return false;
		}

		return $image;
	}

	/**
	 * @param $field
	 * @param bool $lazyLoad
	 *
	 * @return bool|string
	 */
	public static function getImageTag( $field, $size = 'full', $lazyLoad = true ) {
		$image = self::getImageArray( $field );
		if (! $image ) {
			return false;
		}
		$customAttributes = [];
		if ( $lazyLoad ) {
			$customAttributes['loading'] = 'lazy';
		}

		return wp_get_attachment_image(
			$image['ID'],
			$size,
			false,
			$customAttributes
		);
	}

	/**
	 * @param $field
	 * @param null $fallbackAlt
	 *
	 * @return bool|null
	 */
	public static function getImageAlt( $field, $fallbackAlt = null ) {
		if ( ! get_sub_field( $field ) && ! get_field( $field ) ) {
			return false;
		}

		// Try sub field first, try regular field as fallback
		$image = get_sub_field( $field );
		if ( ! isset( $image['alt'] ) || $image['alt'] == '' ) {
			$image = get_field( $field );
		}

		if ( ! isset( $image['alt'] ) || $image['alt'] == '' ) {
			if ( $fallbackAlt !== null ) {
				return Page::prepareAttributeText( $fallbackAlt );
			}

			// Default alt - use heading subfield - assumed to be present
			return get_sub_field( 'heading' );
		}

		return $image['alt'];
	}


}