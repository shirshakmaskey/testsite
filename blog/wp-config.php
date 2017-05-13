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
//define('DB_NAME', 'springtr_blog');
define('DB_NAME', 'springtr_blog');

/** MySQL database username */
//define('DB_USER', 'springtr_blog');
define('DB_USER', 'root');

/** MySQL database password */
//define('DB_PASSWORD', 'P819wn{wBUZK');
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
define('AUTH_KEY',         '+T+k.[c#, EU0;ga=E:D{wLln!Mz;)kv!s&JTlGkLi 6LBoO)]_nSXff4=G:oaY&');
define('SECURE_AUTH_KEY',  '^Q>kc9>UffEaSDYOqcDS]<e9r<?F|mdz~4C.87m_c>Z*9wj)ingVnxklx8/=:>(F');
define('LOGGED_IN_KEY',    'fuH__e/lfZ).hDEo:z.RmW {0hh.{P{P+NpvYLONH~|GN)dsz_;$PeLd?a77P6O9');
define('NONCE_KEY',        '@;cRo:mMq3H]uCBiDHw-d>b/0s*@BRJTj3oe:{m_~?7Yd*vD8aYVJU2.j0G.!pCT');
define('AUTH_SALT',        'bzM.5uAl-CR#C+U*fv~ ]w}S-r!m2cU^g] a63AZk QrrTkq8MX5iAXxC!zLkbSG');
define('SECURE_AUTH_SALT', 'FlC,Z=)Dh84aoT`_6]nTP@F>WHE NQp>)tPTZknVg6&M+^>vah)>IA#Kk=RURBc^');
define('LOGGED_IN_SALT',   'E|Q`Gcna3~j~(`.k!Oq!c]oa=K5Xf@ PSXgk*2m(s!s2sYOJG+PQH|eR|*!mw[io');
define('NONCE_SALT',       'P]&5&UgsuNNEzUm9tCc,9#|,23W*(R|}f?(10_wj_A74!@h!P%%uiKeH|E/9)N ?');

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
