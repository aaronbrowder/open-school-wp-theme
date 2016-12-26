<?php
if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") $_SERVER["HTTPS"] = "on";
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
define('DB_NAME', 'c9');

/** MySQL database username */
define('DB_USER', substr(getenv('C9_USER'), 0, 16));

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', getenv('IP'));

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
define('AUTH_KEY',         'fLQ;(|Gb4<(uBm^+=J<+%sn,=,BYAyzL3.B=,F9&XN-#|5H-Uz^PlCA4dndJDDb-');
define('SECURE_AUTH_KEY',  'mxF/]dW s#avrK#g(=J5g=O4Ch[erTHMBjW|zta1i6=EZKH92L[k}zR&jxZpQ889');
define('LOGGED_IN_KEY',    '+XT;M8FgM+OUFE$-(t}?/f{+M-OF50t++SapksYn.uUZxXPi#>~g{x #fD !<5,B');
define('NONCE_KEY',        '>:}[/]`G6-7b8s3S`Cz $FU?F-D.%]@^Y9,luzY1+>*0dKmCZWq<_y]ja_G.hIJH');
define('AUTH_SALT',        '@y%i]OZtY9_rHVMC`q*q2j0uYd*7#%>jp+Ujh#WoJQ/TeX|(%z|Nvuwgu=I+lY*4');
define('SECURE_AUTH_SALT', 'I-GV`2J;8J@(%vOcF#c0lUC^^J]?#>F/tX7+{;>[]S-V@5~Q.?k(IL0`T-bFG=VH');
define('LOGGED_IN_SALT',   '/.:=d4QJ-m[,<y~k]CxPem=loNi*/&o#UuZT)+/nb)vPx^U<uYp)w~+YL?[Q:5FB');
define('NONCE_SALT',       'uQ$q4TL/]7T+3Z_Cv>U^RgxB3)9+P5+9Ncu&(_9,<?T!]+.@aZYZ;uQt%@;KM~7I');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tnmtd848_';

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
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
