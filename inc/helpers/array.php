<?php
/**
 * Array helper functions.
 *
 * @package Meta Box
 */

/**
 * Array helper class.
 *
 * @package Meta Box
 */
class RWMB_Helpers_Array {
	/**
	 * Convert a comma separated string to array.
	 *
	 * @param string $csv Comma separated string.
	 * @return array
	 */
	public static function from_csv( $csv ) {
		return is_array( $csv ) ? $csv : array_filter( array_map( 'trim', explode( ',', $csv . ',' ) ) );
	}

	/**
	 * Change array key.
	 *
	 * @param  array  $array Input array.
	 * @param  string $from  From key.
	 * @param  string $to    To key.
	 */
	public static function change_key( &$array, $from, $to ) {
		if ( isset( $array[ $from ] ) ) {
			$array[ $to ] = $array[ $from ];
		}
		unset( $array[ $from ] );
	}

	/**
	 * Flatten an array.
	 *
	 * @link https://stackoverflow.com/a/1320156/371240
	 *
	 * @param  array $array Input array.
	 * @return array
	 */
	public static function flatten( $array ) {
		$return = array();
		array_walk_recursive(
			$array,
			function( $a ) use ( &$return ) {
				$return[] = $a;
			}
		);
		return $return;
	}
}
