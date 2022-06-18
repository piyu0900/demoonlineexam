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
define('DB_NAME', 'petroleague');

/** MySQL database username */
define('DB_USER', 'petroleague');

/** MySQL database password */
define('DB_PASSWORD', 'Petroleague@123');

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
define('AUTH_KEY',         '!g^ L!LH2y^B!oR>GjNPaE|lWk0v,SW22>GKihLu,(QX0r <GePb8[1vgs|%8 Od');
define('SECURE_AUTH_KEY',  'kl<.E>sCUd1f<L]=Wau0lq)#KhL)a U(D+GbnSny]zu: ijwRge$ Z<AuPz{` cW');
define('LOGGED_IN_KEY',    'kuqk%%JKpQR{XSQMKkT[P5G#|@WrFp(X.*p?.wCmFD[uU++8Mn*Lt%!J4>BZ*94 ');
define('NONCE_KEY',        '7@u4;@ 4TONBcx;|aol8G?IuAn!@(e IWHy!:OAQ=PR8Ext|yV1kI4ck<{r~{39{');
define('AUTH_SALT',        '(@%D=r$LvuBzpu-M`mLp0liQm[m~$SF/{gG_BnZsB*e+]a)D7b9YhY|kD|B3+#PU');
define('SECURE_AUTH_SALT', 'JJh{C3Pyh,jN,Zk/YM4!Ivh*;Vv;_5=0%qJ2iAMArGv{NoV;1 3 7,F]SRf{>_!d');
define('LOGGED_IN_SALT',   '/i&xxHw8 XE@?]h r(k41;jJeIeI2:VZus{.ZGCN_0y^jLOpeS7#m7[0{I)F@ZaQ');
define('NONCE_SALT',       'vXNW@dtQ=}JMx04c28XCV?9|1MZ-!];a.&MP?=&AtxV#nt?C&W#Mbp[JC>]28cpb');

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
