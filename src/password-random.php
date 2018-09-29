<?php
/**
 * Password random generator.
 *
 * @author Industry Web <info@industryweb.com>
 * @link    https://industryweb.com
 *
 * @version 0.2.0
 */

namespace IndustryWeb;


class PasswordRandom {

	protected $length_min;
	protected $length_max;
	protected $lower_min;
	protected $lower_max;
	protected $lower_list;
	protected $upper_min;
	protected $upper_max;
	protected $upper_list;
	protected $number_min;
	protected $number_max;
	protected $number_list;
	protected $symbol_min;
	protected $symbol_max;
	protected $symbol_list;


	public function __construct() {
		$this->config();
	}

	/**
	 * Default configuration.
	 */
	public function config() {

		$this->length_min  = 9;
		$this->length_max  = 12;
		$this->lower_list  = 'abcdefghijklmnopqrstuvwxyz';
		$this->lower_min   = 2;
		$this->lower_max   = strlen( $this->lower_list );
		$this->upper_list  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$this->upper_min   = 2;
		$this->upper_max   = strlen( $this->upper_list );
		$this->number_list = '0123456789';
		$this->number_min  = 1;
		$this->number_max  = strlen( $this->number_list );
		$this->symbol_list = '~*!@$#%_+.?:,{}';
		$this->symbol_min  = 1;
		$this->symbol_max  = strlen( $this->symbol_list );

	}

	/**
	 * Password min/max length setter.
	 *
	 * @param $min
	 * @param string $max
	 *
	 * @return $this
	 */
	public function length( $min, $max = '' ) {
		$this->length_min = $min;
		$max ? $this->length_max = $max : $this->length_max;

		return $this;
	}

	/**
	 * Lowercase min/max length and character list setter.
	 *
	 * @param $min
	 * @param string $max
	 * @param string $list
	 *
	 * @return $this
	 */
	public function lower( $min, $max = '', $list = '' ) {
		$this->lower_min = $min;
		if ( $list ) {
			$this->lower_list = $list;
			$this->lower_max  = strlen( $this->lower_list );
		}
		$max ? $this->lower_max = $max : $this->lower_max;

		return $this;
	}

	/**
	 * Uppercase min/max length and character list setter.
	 *
	 * @param $min
	 * @param string $max
	 * @param string $list
	 *
	 * @return $this
	 */
	public function upper( $min, $max = '', $list = '' ) {
		$this->upper_min = $min;
		if ( $list ) {
			$this->upper_list = $list;
			$this->upper_max  = strlen( $this->upper_list );
		}
		$max ? $this->upper_max = $max : $this->upper_max;

		return $this;
	}

	/**
	 * Number min/max length and character list setter.
	 *
	 * @param $min
	 * @param string $max
	 * @param string $list
	 *
	 * @return $this
	 */
	public function number( $min, $max = '', $list = '' ) {
		$this->number_min = $min;
		if ( $list ) {
			$this->number_list = $list;
			$this->number_max  = strlen( $this->number_list );
		}
		$max ? $this->number_max = $max : $this->number_max;

		return $this;
	}

	/**
	 * Symbol min/max length and character list setter.
	 *
	 * @param $min
	 * @param string $max
	 * @param string $list
	 *
	 * @return $this
	 */
	public function symbol( $min, $max = '', $list = '' ) {
		$this->symbol_min = $min;
		if ( $list ) {
			$this->symbol_list = $list;
			$this->symbol_max  = strlen( $this->symbol_list );
		}
		$max ? $this->symbol_max = $max : $this->symbol_max;

		return $this;
	}

	/**
	 * Generate password.
	 *
	 * @return string
	 *
	 * @since 0.1.0
	 */
	public function generate() {

		$length_min  = $this->length_min;
		$length_max  = $this->length_max;
		$lower_min   = $this->lower_min;
		$lower_max   = min( $this->lower_max, $length_max );
		$lower_list  = $this->lower_list;
		$upper_min   = $this->upper_min;
		$upper_max   = min($this->upper_max, $length_max );
		$upper_list  = $this->upper_list;
		$number_min  = $this->number_min;
		$number_max  = min($this->number_max, $length_max );
		$number_list = $this->number_list;
		$symbol_min  = $this->symbol_min;
		$symbol_max  = min($this->symbol_max, $length_max );
		$symbol_list = $this->symbol_list;
		$count        = mt_rand( $length_min, $length_max );
		$lower_count  = 0;
		$upper_count  = 0;
		$number_count = 0;
		$symbol_count = 0;
		$lower_list_min = '';
		$lower_list_max = '';
		$upper_list_min = '';
		$upper_list_max = '';
		$number_list_min = '';
		$number_list_max = '';
		$symbol_list_min = '';
		$symbol_list_max = '';


		// Build the first password with required characters amounts
		for ( $i = 0; $i < $count; $i ++ ) {

			if ( $lower_count < $lower_max ) {

				if ( $lower_count <= $lower_min ) {
					$lower_list_min .= substr( str_shuffle( $lower_list ), 0, 1 );
					$lower_count ++; // = strlen($lower_list_min);
				}
				if ( $lower_count < $lower_max ) {
					$lower_list_max .= substr( str_shuffle( $this->make_list( $count, $lower_list ) ), 0, 1 );
					$lower_count ++;
				}
			}


			if ( $upper_count < $upper_max ) {

				if ( $upper_count <= $upper_min ) {
					$upper_list_min .= substr( str_shuffle( $upper_list ), 0, 1 );
					$upper_count ++; // = strlen($upper_list_min);
				}
				if ( $upper_count < $upper_max ) {
					$upper_list_max .= substr( str_shuffle( $this->make_list( $count, $upper_list ) ), 0, 1 );
					$upper_count ++;
				}
			}

			if ( $number_count < $number_max ) {

				if ( $number_count <= $number_min ) {
					$number_list_min .= substr( str_shuffle( $number_list ), 0, 1 );
					$number_count ++; // = strlen($number_list_min);
				}
				if ( $number_count < $number_max ) {
					$number_list_max .= substr( str_shuffle( $this->make_list( $count, $number_list ) ), 0, 1 );
					$number_count ++;
				}
			}

			if ( $symbol_count < $symbol_max ) {

				if ( $symbol_count <= $symbol_min ) {
					$symbol_list_min .= substr( str_shuffle( $symbol_list ), 0, 1 );
					$symbol_count ++; // = strlen($symbol_list_min);
				}
				if ( $symbol_count < $symbol_max ) {
					$symbol_list_max .= substr( str_shuffle( $this->make_list( $count, $symbol_list ) ), 0, 1 );
					$symbol_count ++;
				}
			}


		}

		// Concatenate the two then shuffle
		$min_results = str_shuffle( $lower_list_min . $upper_list_min . $number_list_min . $symbol_list_min );

		$needed = $count - strlen($min_results);


		$result = str_shuffle( $lower_list_max . $upper_list_max . $number_list_max . $symbol_list_max);

		$max_results = substr( $result, $needed, $needed );

		// Return random generated password.
		return str_shuffle($min_results . $max_results );

	}

	public function make_list( $max, $list ){
		$new_list = '';
		$i = 0;
		while ( $max > $i ){
			$i++;
			$new_list .= substr( str_shuffle( $list ), 0, 1 );
		}

		return $new_list;
	}


}