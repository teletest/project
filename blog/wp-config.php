<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'teletest_project');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'q-. XPPby$pswut35`LyPOh`-~0;<&H4B>9{MDlHZ1VI9?iC#7#|ult7fVCbG!kt');
define('SECURE_AUTH_KEY',  'RR^`wv.RAIRz-yn`In#. <[+gkZSHy RJ&u|[-XoQX&^+]Ecdv,cx}ZDdi9MKX[c');
define('LOGGED_IN_KEY',    'xVTvg<CPRG|IMi&9FnIm-;B3)2R*gB#*;~_;S&5F05V-n@_z9I-yWz|Nx4xB=3J}');
define('NONCE_KEY',        ']t `MOi4k-.1U+[NcFu$O8>&C>gHRUF|k~K>+|u<M.((4iHIbZ?c5YL(YX/;5|DM');
define('AUTH_SALT',        '^F{Z55qd[t_^60.]Cm,YJAg-Gn^uw+oV<PRIF4uaJz2hU L.4GY+h,Q1tvlUwjK6');
define('SECURE_AUTH_SALT', 'Byk-5*>BqyW@(r[k<0gAXC2+0+^].!^msBv~JvBIN Fp&rHB^?90KH1^GcC#K|}E');
define('LOGGED_IN_SALT',   'U~FQ|v/nA3UQ@y8N#5lZ[+4=.$X!|H}Svn{-<?-xZCnWAKyVMjy2|cTiv8M8wap1');
define('NONCE_SALT',       'a=AhTRot:kFsF%g(^pwXW~V-7CcN`v|S/}-XD{ K[ C-JjZOp7.=<dKWYJ7|`~]Q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
