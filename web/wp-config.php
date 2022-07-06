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
define( 'DB_NAME', 'jugaso_local' );

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
define( 'AUTH_KEY',         'a;P+lI6rcvQ~sg(rGuEe4]j:wqC}o(`zk%l5bb{1@vh]wJ-%#xFI^&rr-Sc]@ZJ ' );
define( 'SECURE_AUTH_KEY',  'e%Jf|~^ETmXJhJG}KmIL:o?PAD?($SU-}1w/j;2]:0;L?v_(mZmNX}_hMv@d/{qW' );
define( 'LOGGED_IN_KEY',    'j[0-b4adOPauvm=c1h*djnrTnt9qIJ {3ooDzT[QQS2xO],u$!K8[$&;voW6jK1W' );
define( 'NONCE_KEY',        'wvb}=qi{D`_Sig0-nl?%+9#Or$BSLGR=NW!!h,xLtQlz67`pR*|!>9,]^{9RoZvv' );
define( 'AUTH_SALT',        '$[pHJQMavq6bCmRz1P]Hh!Lp<1*9zBsG,XQVk1uD6lpUG|gfyQ4)Com^VJi1nord' );
define( 'SECURE_AUTH_SALT', 'xdR)@I+,tkNcN 4m3wM$RcoV*3$81p+%~{Oqz|PU)JVGMQdU9r<*~&y[:NJ{)!?T' );
define( 'LOGGED_IN_SALT',   'Q$TXlv)x{di+MV60Gs-3!yoDWZM)I6kaLi!a5,nio$wtFFyT_`eadvywux@_h8Gs' );
define( 'NONCE_SALT',       '@.;ffKDF0`C5]<oFi|s;@u~6fh`h8[ut=RThJwsvWxX.&^4~ kM7#Mh?@k7(DboG' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
