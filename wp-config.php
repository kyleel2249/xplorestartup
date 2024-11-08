<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'xplorestartup.com' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9b+n5kMi.AA%6?L%r1s1$IdaLpg,~s|Wni_,!H1WHEd5Y1wS<#wy}tK+.%K(Sf-S' );
define( 'SECURE_AUTH_KEY',  'cQ_7$qp1lz(Il4h1K;X>UQ&68sh%V]}[|6%0vB1/@5(198n-tA3EMo9%]uZXKR@:' );
define( 'LOGGED_IN_KEY',    'KNiz.pcyc2T9!Aao6Wndt0xQH/P0rz:%H?hf0dNDp;)(i?BV(Kn#|^a]RN_myuNt' );
define( 'NONCE_KEY',        '1Tx4+fvoOjY,dAS$Td,G9i[; f8Q|sc1K^U <>QEL1ZS?/r]`kGh*Zq_F(gz,ep@' );
define( 'AUTH_SALT',        'Ec-G>v}5+4ot:0adm}+B{;Lu152GtvkEz]w71S&X=0BE/19~F|<A_%h^KS9T SHu' );
define( 'SECURE_AUTH_SALT', '*bT_ePPFHv$1Tnh][O16++jZl1M;ueWR^{v%axV05;qdb.3h4:r%`i8p3i,]C:;]' );
define( 'LOGGED_IN_SALT',   '(1t`H>U^/&ww{YxgT&?YY)9#7TuQAeA^9r$l|+x9d+l<(X_i%Yz+ZS!<l?T@UWxQ' );
define( 'NONCE_SALT',       'yT9/0HVCiW[#En%i_]_+=OQgLCMt1IE-@z=7!c~mJwO6%@>RreNb:_HuzD%),nlI' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
