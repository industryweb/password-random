<?php
/**
 * Class PasswordRandom
 *
 * @author Industry Web <info@industryweb.com>
 * @link    https://industryweb.com
 *
 * @version 0.1.1
 */

namespace IndustryWeb;


class PasswordRandom {

	protected $min;
	protected $max;
	protected $lower;
	protected $upper;
	protected $number;
	protected $symbol;

	/**
	 * Constructor
	 *
	 * @param $min
	 * @param $max
	 * @param $lower
	 * @param $upper
	 * @param $number
	 * @param $symbol
	 *
	 * @since 0.1.0
	 */
	public function __construct( $min = 15, $max = 25, $lower = 3, $upper = 3, $number = 3, $symbol = 3 ) {

		$this->min     = $min;
		$this->max     = $max;
		$this->lower   = $lower;
		$this->upper   = $upper;
		$this->number  = $number;
		$this->symbol  = $symbol;

	}
	public function min( $min ) {
		$this->min = $min;
		return $this;
	}
	public function max( $max ) {
		$this->max = $max;
		return $this;
	}
	public function lower( $lower ) {
		$this->lower = $lower;
		return $this;
	}
	public function upper( $upper ) {
		$this->upper = $upper;
		return $this;
	}
	public function number( $number ) {
		$this->number = $number;
		return $this;
	}
	public function symbol( $symbol ) {
		$this->symbol = $symbol;
		return $this;
	}

	/**
	 * Generate
	 *
	 * @return string
	 *
	 * @since 0.1.0
	 */
	public function generate() {

		$min = $this->min;
		$max = $this->max;
		$lower = $this->lower;
		$upper = $this->upper;
		$number = $this->number;
		$symbol = $this->symbol;

		// Character maps
		$lower_list   = 'abcdefghijklmnopqrstuvwxyz';
		$upper_list   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$number_list  = '0123456789';
		$symbol_list = '~*!@$#%_+.?:,{}';

		// Base values
		$count         = mt_rand( $min, $max );
		$total         = $lower + $upper + $number + $symbol;
		$counter       = 0;
		$password      = '';
		$second        = '';
		$lower_count   = 0;
		$upper_count   = 0;
		$number_count  = 0;
		$symbol_count = 0;
		$all           = '';

		// Build required character map
		if ( $lower ) {
			$all .= $lower_list;
		}
		if ( $upper ) {
			$all .= $upper_list;
		}
		if ( $number ) {
			$all .= $number_list;
		}
		if ( $symbol ) {
			$all .= $symbol_list;
		}

		// Build the first password with required characters amounts
		for ( $i = 0; $i < $count; $i ++ ) {

			if ( $lower_count < $lower ) {
				$lower_count ++;
				$password .= substr( str_shuffle( $lower_list ), 0, 1 );
			}

			if ( $upper_count < $upper ) {
				$upper_count ++;
				$password .= substr( str_shuffle( $upper_list ), 0, 1 );
			}

			if ( $number_count < $number ) {
				$number_count ++;
				$password .= substr( str_shuffle( $number_list ), 0, 1 );
			}

			if ( $symbol_count < $symbol ) {
				$symbol_count ++;
				$password .= substr( str_shuffle( $symbol_list ), 0, 1 );
			}
			$counter ++;
		}

		// Build a second password with all the required characters
		for ( $i = 0; $i < $count; $i ++ ) {
			$second .= substr( str_shuffle( $all ), 0, 1 );
		}

		// Remove the subtracted amount of required characters on the second password
		$remove = ( $count - $total );
		$pass2  = substr( $second, 0, $remove );

		// Concatenate the two then shuffle
		$result = str_shuffle( $password . $pass2 );

		// Return random generated password.
		return $result;

	}

}