<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2 eRIH!>!`q`hMBPVFTj2dqu90A{7qk4??v6OM GZ$:_@]`?KeIKb0D5k)mH/!eu');
define('SECURE_AUTH_KEY',  '&P:{p!{x[[}NIPieB&SA0ga3i`7[y-E]:b&BJkqT U:mpP2F)Ag=KN#AA`#~Q/*_');
define('LOGGED_IN_KEY',    '0JS|vF=wG NiH_%%JHEQF6BCXaj81HJCY}&GTec_T-Hv|Q3#DMPbw% ky1;S2+W-');
define('NONCE_KEY',        '&^H~UDw8lS;49HmVqBy6)w6x?[v?B{!04CyK9uC+ri%/j0_|Dqkm[<K1^%cMWpY9');
define('AUTH_SALT',        'ENqy<[1`E$VZsUuJzH:2H@c{Nu~;/aE/E7_$O(0Ozs*^7!B:=EOpiqZXtCX;|e:)');
define('SECURE_AUTH_SALT', 'ahb%((j%RB.Q ]nnsR^2p0W{H5JPWwCpkUd@see9wcQt4qhPZ;9+& e{GtdE]q|3');
define('LOGGED_IN_SALT',   '>!@QiJ;E`V*:XV]zknkzHge8k03r5L(VnFmnQB %++Q.t7Uzv]ZL+w#/F/e:!Y>+');
define('NONCE_SALT',       '=giKu1H3gVP0Gvkp6nkqBh3BY+>&06~VaDepVg[x K]`.mPX0FzH%9){^ fOqO{E');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
