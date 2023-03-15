<?php
/**
 * Custom PSR-4 autoloader.
 *
 * @link  https://www.php-fig.org/psr/psr-4/
 *
 * @package    Action Hook Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Action_Hook_Block_Autoload {

	/**
	 * PHP class namespace.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $namespace = 'WebManDesign\Block\Action_Hook\';

	/**
	 * Directory to load PHP classes from.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $directory = 'includes';

	/**
	 * Array of white-listed, allowed files for improved security.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array
	 */
	private static $allowed_files = array(
		'/Block.php',
		'/Hooks.php',
		'/Options.php',
		'/Theme_Hook_Alliance.php',
	);

	/**
	 * Register custom autoload.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $class_name  Class name to load.
	 *
	 * @return  bool  True if the class was loaded, false otherwise.
	 */
	public static function register( $class_name ) {

		// Requirements check

			if ( 0 !== strpos( $class_name, self::$namespace . '\\' ) ) {
				return false;
			}


		// Variables

			$path  = '';
			$parts = explode( '\\', substr( $class_name, strlen( self::$namespace . '\\' ) ) );


		// Processing

			foreach ( $parts as $part ) {
				$path .= '/' . $part;
			}
			$path .= '.php';

			if ( ! in_array( $path, self::$allowed_files ) ) {
				return false;
			}

			$path = ACTION_HOOK_BLOCK_PATH . self::$directory . $path;

			if ( ! file_exists( $path ) ) {
				return false;
			}

			require_once $path;


		// Output

			return true;

	} // /register

}

spl_autoload_register( 'Action_Hook_Block_Autoload::register' );
