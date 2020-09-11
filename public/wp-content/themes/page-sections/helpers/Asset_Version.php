<?php

class Asset_Version {
	const VERSION_PARAMETER = 'v';

	/**
	 * Cache busting - Get version parameter from file modified date.
	 *
	 * @param $file
	 *
	 * @return string
	 */
	public static function getVersionParam( $file ) {
		$fileUrl  = get_stylesheet_directory_uri() . $file;
		$filePath = get_stylesheet_directory() . $file;
		if ( file_exists( $filePath ) ) {
			$fileUrl = "$fileUrl?" . self::VERSION_PARAMETER . "=" . filemtime( $filePath );
		}

		return $fileUrl;
	}
}