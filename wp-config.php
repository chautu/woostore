<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'woostore' );

/** Database username */
define( 'DB_USER', 'woostore' );

/** Database password */
define( 'DB_PASSWORD', '123456789' );

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
define( 'AUTH_KEY',         '07bZjXX0_H{>zupx)w*o#,pbJW8c+.Tz*!%}-z3lXe,63-Mpr*CDo^2axjEp@ QQ' );
define( 'SECURE_AUTH_KEY',  'Ap$a}.~c)e]NcK5k*;0Mv`{5Uk2b@:&IO5b#)6rK~%f@uGQ)i#cAN.}mbgx3}Mve' );
define( 'LOGGED_IN_KEY',    'fmDXM7/wo2q>O$_F(}CiGDa~beh@-YyakJwaMbCLAIEP]V)I>) P<d!{@l.2-g-A' );
define( 'NONCE_KEY',        '4^:5UzkJI~V|~4(0~2g/5c[Jh$L[k~~,g.UkRfijk|d}%R;/%kZzHX !Ay(nGMgX' );
define( 'AUTH_SALT',        'N4No=X6-{_A*:@44CJ7{U)mIKK8FC?v`%#V}Gp<CmfsE!5Q2}LP+eqJmQI[BO4-b' );
define( 'SECURE_AUTH_SALT', 'GZ:{h-T.8BacWH(|XB$$H3?!#=M#r:~/.@6Ef8>2Z`njNE}eNq&22tC2:{2u?qGP' );
define( 'LOGGED_IN_SALT',   ' ]JP{[RJ|8>d:] u=k>LU?CKw!gpS0-%[?tyD|<=OjaWuf9?K#s^Ih?yO]-OHXBQ' );
define( 'NONCE_SALT',       '*?7O)T+~pQ=x94BFYCnd} $G0}:^z|-T[vDfWi5@L%r0YzISMkfh&z>]X%EYa6&m' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
