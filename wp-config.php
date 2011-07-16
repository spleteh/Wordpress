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
define('DB_NAME', 'portal');

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
define('AUTH_KEY',         '8 _(S27@b|yLq<a=%oi)b;1lMY-3^/TB&}:>[s!TrbLBZVV0SIO@raA5)BCVDL_5');
define('SECURE_AUTH_KEY',  '#t)yT?uJU11`kofwgdu,zd4-W+T|w.<TS{QByy-SD8PPYT/auA*{Er@ovXEtcqrg');
define('LOGGED_IN_KEY',    'th#bT<l~M!$Z^-w0+z>^,t@xq<FJUsmuGSOYxE2Mxm{XnIshud8vTD-K{$u;&xub');
define('NONCE_KEY',        'TdvTkyTL}9/fazA86`z1l>HFI&U!C:`6TX7arV)hf:C6Cly&~BFJ3,UC6suTHhYw');
define('AUTH_SALT',        'N|M-2!]dk]wxW2*w,[t1cVpA d6WOIx=GAAgtBH9B09TkUBx8=~Rtg50J*6,Rnh<');
define('SECURE_AUTH_SALT', '=9=3O3RkjB!nB<1;3~y77dG2S?(rx/uB3! =!rf1QMlz(x.t6^C{cC@;71}}<F6I');
define('LOGGED_IN_SALT',   '<<Z8$.lx}|*sY#!bF5_7|8%J|rh6$,qn<LV>8 nPKmAyY/Sp~RYOswvkjPQ8QM+s');
define('NONCE_SALT',       '~Q1034Iia3k:&DYg`0.ag#CZc/n)^>+8H`{b9>Abh0(,=U?nSM~lE (^]~!J4ZR,');

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
