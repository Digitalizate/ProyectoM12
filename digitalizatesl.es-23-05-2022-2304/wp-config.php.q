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
define( 'DB_NAME', '277392786wordpress20220217185651' );

/** Database username */
define( 'DB_USER', 'mydig71a0e4' );

/** Database password */
define( 'DB_PASSWORD', 'aQ7wVuWh' );

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
define( 'AUTH_KEY',         ';P&])OK:>HRcb7N/@#itH55R?X0lXu2Id)<o-2m?X`awS7RgJ]:?,G$J|F@ZU?9x' );
define( 'SECURE_AUTH_KEY',  'IZ5T?U6,0/->>OxmU8rlIt/gw<0ph9fpsSavT]G |Hu#/c,58,io_xBA}+X08$~(' );
define( 'LOGGED_IN_KEY',    'e9nOOE`q4Gj!SQ0x`R|m^|$oP`cJ~3+ZE}MUz~OfNx$)&&UzUN(y94|N8e6j-q,+' );
define( 'NONCE_KEY',        '7Sq=y^J dQYr|9R-?g@%KTEmyak>e)G>,#cBR}jv&<qcyCIuU-5vm^4>8-[+thoM' );
define( 'AUTH_SALT',        '[iZR;`gOh<w27{|VUPWy[4puy.^ZcD|C_iu7u_wk[z>!xXT|LB>&AA6fOujx}+^y' );
define( 'SECURE_AUTH_SALT', '&2lVXhGwTwYp1;*FKJi.H)Ef$|H7nM|7)***A>/SbLF+wH-&ev_CK5m@M6}_-;12' );
define( 'LOGGED_IN_SALT',   'WtC-owsjY#e/i|yx~Zqu&6L|/M%l6)]&V=U2_~b_xYv+uKOpU%dV|*[/Eyd2;_m|' );
define( 'NONCE_SALT',       'PjrxD-w*~OyDR)y5/QBinsX%4Iz)FjME!Rt$TsK^QN_!dT0i+~YDG+FYV:?:B(:Z' );

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
