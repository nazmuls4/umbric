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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'umbric' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '; WoZ!^@E/IUef#xTLhxB,@sNgQpL++(]d|T2:DfQW;FYY1{d|u8?7Epn*K6;m}h' );
define( 'SECURE_AUTH_KEY',  '%FYoM}ac5v?Z;yU} +/-lwiw(a;ak7FS,K zom#_tbWPQsRQ3kU*$uSk`sPz,Ody' );
define( 'LOGGED_IN_KEY',    'MW0&/h0)ws?$gCAv_9.m` _TktwRYW!BCvF$wG;*w*SEUeK.MUHFkjB*cT1}mY+;' );
define( 'NONCE_KEY',        '1S%=HSDV+MA!,{4!Q^#^!Z-!]6u~-|*Df3C%7^n>U0/saDwT=pI-X%|DKtEGXE+f' );
define( 'AUTH_SALT',        '3`-o06g8umLyw632bUI^|0G/:tOBb*&u<+Q.8&RkJQAC*n!&A(.#Ubxr6wf2$fs/' );
define( 'SECURE_AUTH_SALT', '%D?J8Xe<?$M<_B tKmccp,*t8nr@H?!pw)2xys8EZg2NX;XiZ(2TnHMGiq^]G`hm' );
define( 'LOGGED_IN_SALT',   'mYJ_/$@?l%DoUvGZST0:W[Kq!S9(qI0%b`!9LZfii2RNt|eqsL58F(E*o2Sd2W*l' );
define( 'NONCE_SALT',       'nOO$O+]8~JSMZcNbvx;+yyD~?r^Hph*%![XcehG@7]2x6.&K1]${w7.MXHAf@s.r' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wfhfhp_';

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


define( 'FS_METHOD', 'direct' );

