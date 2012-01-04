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
define('DB_NAME', 'smrtgrfes');

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
define('AUTH_KEY',         '4h|`9QcK8,A|XU4SOxH[o$.Z;Ne]:7B :s2/=;.`tywI6{^@EGk7h<I2!9qR(3yO');
define('SECURE_AUTH_KEY',  'e35<k_oco3Ue[F$(0<@$vVC~%1z(piu>]?-4d:]y^<1 L1zjW,0hyR6{z&76H?5y');
define('LOGGED_IN_KEY',    'n`8Fw)#0HXr6U(ooZr}(#([HP$m:7H;8X-pL;D#GIjfaA7[xUS9sQ?[8r9eG;EY$');
define('NONCE_KEY',        '(IsxLb[zWd@)o2nS{H4nys|N=B.7ISMuFPLSVwMZ%x3zg|1k1C6{{|)Z*=?;0}x>');
define('AUTH_SALT',        '*{]d4s@N 2LGN` F#VCn~&OGFa@[{!:SfyyP|SRUbt1+<dUKA[&Q~b]aqG_g{/M8');
define('SECURE_AUTH_SALT', '_gdFhklAnqs!bA]86qKb4j]qge1AG:sJ4 K[UE3KT$od^iaial|F+W-dph.qMk|;');
define('LOGGED_IN_SALT',   'k-cAbOAH%I#/nKuglw&Vs^xng9B8?M=t,gg=YUT47Mp;,Rx@*5Ass+V%Q1mAyzn$');
define('NONCE_SALT',       '(0e~;v@/1R*d(sgEXApdv_r9T1&d|bnCz)npd%<e1t<<h*puF]`H`BtU$Di~t~pj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'smtgs_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
