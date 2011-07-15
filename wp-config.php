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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'h^2qN-!K6W~5^)Y0gUnkJe!]$MXo9oKxF#oH-o6XB1T+U<r`W!=1tZQ=W.8Ph+|<');
define('SECURE_AUTH_KEY',  'Z3QH*T-VGjZevXol4j2M!h#f}aB!O9qu:^mE~yi(2Gy}mDTsPp%,_NR<V*O/vol,');
define('LOGGED_IN_KEY',    'MgW;N9+VYlK4UNYBY41>5b#PM<?X(o;@7vf-GN4^CXD}X8 tNIwD- u:MdG3*S|v');
define('NONCE_KEY',        'VWm& _5z,!lb#S48U?h>F%Hh/oVZ]Jn;^Ec5un5v~B$Zcd.7t))UYshnN/A[EHs[');
define('AUTH_SALT',        'EkFwxFTJkG0snOb76z*-y.CFuB;N@G!jz*oRmpP`R.)i}J=CE.**IJs#7,uqLjQ@');
define('SECURE_AUTH_SALT', '97k}3c.L+iS+?M8;d$zLqI#AO<%77^a)}i4B%8J:GWadq<bqe,&O#ih9Lt~-q%L#');
define('LOGGED_IN_SALT',   'Xk7R)GXV~acq]6!+_CXN(>i#38, 0A60Bl-~hwJW<[.L}$7V0UEqp*a%HgpJpo?k');
define('NONCE_SALT',       ':y5Y0|(J>B.|mtZrtFFI+ZZ~J_i0uV/N._$c(nb*AYd}I9vx@QOUlgKw)~z<TB{?');

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
