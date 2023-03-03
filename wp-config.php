<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
define('WP_SITEURL', 'https://dev.vietnamgarage.vn/');
define('WP_HOME', 'https://dev.vietnamgarage.vn/');
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vietnamgarage_vn' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', 'Thanh@3290' );
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
define( 'AUTH_KEY',         'LeJ!M69vGf}/ `:[NZ/oEw]RC{iSH$asm;dhIWQJTSvv^~_k`kM#MSBazHOAL]4n' );
define( 'SECURE_AUTH_KEY',  'UFvf{N=1P>mmZ#/ec!WSnC6C:EIrc_$5&>tA,!)VFU]7F9Ld5:}w0>~_2hhHQjNN' );
define( 'LOGGED_IN_KEY',    'V_Q8;KEY>_8 rABeN#y15~PeM@U`4Jfru>_wbBbm$.4b+6*lbV,lR-pmnaK/Ln4E' );
define( 'NONCE_KEY',        '1Xm_Kbpy*}!i:lOVr>P*fg8GX?nB-y@^3!{y,4w3eAu^yArN6CfKwjVp-a?zhRE!' );
define( 'AUTH_SALT',        '.6*I;uK;2v`vw;c.<N{~NtHhSP0Dsi[eX|pd^-e>|QVGn!I+.nWPC,lIX0|#ozsX' );
define( 'SECURE_AUTH_SALT', ',1s !HmA]x!,J<16s`43+.zRJ6XB+K_syVR$q:&cxBg1[Xa`9yZz6bNtW5ZQO3i[' );
define( 'LOGGED_IN_SALT',   '`w7;zv+]D.Cs}Pk5:DTEiK@~^&Sz#zNQF2Xj-C-a-$$&@sN6+10N}8PdNP6O[5ce' );
define( 'NONCE_SALT',       'Tk0vru5^3$`}gya-4FEq}0u1Rk:J~m8ol7Bjk]UN5j|<|b)REk,;N<?6|A%z&$L8' );
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
/*** FTP login settings ***/
define("FTP_HOST", "localhost");
define("FTP_USER", "ftp-user");
define("FTP_PASS", "ftp-password");
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

?>