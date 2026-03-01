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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'Vb6ZBlF9ynJ8oopC4LW8HOs+yUKtTo4l' );

/** Database hostname */
define( 'DB_HOST', 'mariadb:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'DvU?)@nh/tClqNZnL8n>CAM?NJ5PD$]?xepvn,{`=[O&Ov6LD@gFN1y5X;ZqMV<Z' );
define( 'SECURE_AUTH_KEY',   'C!V[sH/,!Xi,5F3=j~7%  x=bP^W#S0z_7Re@8f{Yy`NVq-fPoY3Aa-9&(TKDkK=' );
define( 'LOGGED_IN_KEY',     ')soPx};5=QJh%:P(${Q+$(a4loYOoy21uig>J&Bfc:fe1MZd`:l,]I%Q4j<hMk:J' );
define( 'NONCE_KEY',         '=0{U3]P[[JEzwY/(ZSEb5w&aW[-g)ytx-4fOm6V7$ eCX_<0#:T2b/J{LKfQ^i]v' );
define( 'AUTH_SALT',         ')CU4^CVw|UQGn&A,H`Jf@;_yXK1&2F+c,T6i!1S^$b>~7LEHACO2PVsZx{sWzg:W' );
define( 'SECURE_AUTH_SALT',  'z`U#BHG0Al`-5UWbKv .ITO$Q#H)Ljx_1r5MHaOsQ[tYh67(;mDt^IPQFc(/2JT~' );
define( 'LOGGED_IN_SALT',    't!9}*R+B;/?1jcq~Hv8A[5 =+e]DSZFSxz6 IAENnXdf!@@[&v#/{s:G0R9,skIs' );
define( 'NONCE_SALT',        'yjdDL}r(9btG)==>6WrWGY5u}VG]3TY(:kmG;*h<53&.Ns VziTk5_>hQ79d>OUr' );
define( 'WP_CACHE_KEY_SALT', 'r@-=8D~c`$v|HYDoZOx*>49*NkN5+Bf S93sj5J{7TXRc._J?:A1;WooI38l}{!u' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
