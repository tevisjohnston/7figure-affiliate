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
define( 'DB_NAME', '7figure-affiliate' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '4o1/YN>kXvS&L?Gv: WT6ips]Sy]URbf:!{yN}J$Mm8s/-Y61OF+/pj=:T=[50 U' );
define( 'SECURE_AUTH_KEY',  '87{6 $|$wF{ddEGqi!Y 3kq:^Z{iz-<bj4_,6},JMU6QVA4ww8oiw(:V*rnBb8>l' );
define( 'LOGGED_IN_KEY',    'jQEooF+aV@549XU}3c(lN,5AZ)O(]sVZu*>+yv1vdFpD[PMe114Y&Y2H;oV4M-0l' );
define( 'NONCE_KEY',        '9}lNk(V[/$(T>:LmM(U#gv0b2o%x$wb@NA~4?uSQ6CD`fVn,j0U]kEN846PZ;mjP' );
define( 'AUTH_SALT',        '|tw7EBZ Y:41,R=n=*acqR$[+xx-BAtoi>$-#Z1W,/r(M =J!dPUPk7uuZqfiZ~;' );
define( 'SECURE_AUTH_SALT', '6):dcYw)MVT|4O@hiuvS#5EPzOQKBR~~L#J~65MSqQ!0joArQ<b]e>nQdA(yl7{@' );
define( 'LOGGED_IN_SALT',   '8A;~dYT~$lFB&>g-7Zy+tmJ-e!p1);=of*VPVp$MhO$>>x-uD;qK/D#;@$J]>hp_' );
define( 'NONCE_SALT',       '3|L1Wi)& :/I*,/Gcxu_TO<q()XEnxXzsz%]Fwgm-_[ 3$3sWdk*MUkxS+iN;[,<' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
