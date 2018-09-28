<?php
/**
 * Class PasswordRandom
 *
 * @author Industry Web <info@industryweb.com>
 * @link    https://industryweb.com
 *
 * @version 0.1.0
 */

namespace IndustryWeb;


class PasswordRandom {

	protected $min;
	protected $max;
	protected $lower;
	protected $upper;
	protected $number;
	protected $special;

	/**
	 * Constructor
	 *
	 * @param array $options
	 *
	 * @since 0.1.0
	 */
	public function __construct( $options = [] ) {
		$this->configuration( $options );
	}

	/**
	 * Configuration
	 *
	 * @param $options
	 *
	 * @since 0.1.0
	 */
	protected function configuration( $options = [] ){
		if ( isset( $options['min'] ) ) {
			$this->min = $options['min'];
		}
		if ( isset( $options['max'] ) ) {
			$this->max = $options['max'];
		}
		if ( isset( $options['lower'] ) ) {
			$this->lower = $options['lower'];
		}
		if ( isset( $options['upper'] ) ) {
			$this->upper = $options['upper'];
		}
		if ( isset( $options['number'] ) ) {
			$this->number = $options['number'];
		}
		if ( isset( $options['special'] ) ) {
			$this->special = $options['special'];
		}
	}

	/**
	 * Generate
	 *
	 * @return string
	 *
	 * @since 0.1.0
	 */
	public function generate( ) {

		// Character maps
		$lower_list   = 'abcdefghijklmnopqrstuvwxyz';
		$upper_list   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$number_list  = '0123456789';
		$special_list = '~*!@$#%_+.?:,{}';

		// Base values
		$count         = mt_rand( $this->min, $this->max );
		$total         = $this->lower + $this->upper + $this->number + $this->special;
		$counter       = 0;
		$password      = '';
		$second        = '';
		$lower_count   = 0;
		$upper_count   = 0;
		$number_count  = 0;
		$special_count = 0;
		$all           = '';

		// Build required character map
		if ( $this->lower ) {
			$all .= $lower_list;
		}
		if ( $this->upper ) {
			$all .= $upper_list;
		}
		if ( $this->number ) {
			$all .= $number_list;
		}
		if ( $this->special ) {
			$all .= $special_list;
		}

		// Build the first password with required characters amounts
		for ( $i = 0; $i < $count; $i ++ ) {

			if ( $lower_count < $this->lower ) {
				$lower_count ++;
				$password .= substr( str_shuffle( $lower_list ), 0, 1 );
			}

			if ( $upper_count < $this->upper ) {
				$upper_count ++;
				$password .= substr( str_shuffle( $upper_list ), 0, 1 );
			}

			if ( $number_count < $this->number ) {
				$number_count ++;
				$password .= substr( str_shuffle( $number_list ), 0, 1 );
			}

			if ( $special_count < $this->special ) {
				$special_count ++;
				$password .= substr( str_shuffle( $special_list ), 0, 1 );
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