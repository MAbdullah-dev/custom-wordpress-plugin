<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_plugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '%+Kg-;rmB8MkRNXJqF^+G|- (g6$adk7Rjn{UNSn7pJaWptNu.3j e!_d>M3Ss{c' );
define( 'SECURE_AUTH_KEY',  'Y8xKUTT82pA%Rs=gFsP/d@(Q-%S=m?tpaYUEDhR|0a1WRJTY1b^IL?+1AQGrqYh-' );
define( 'LOGGED_IN_KEY',    '|cbg5Qk~=irFl?Ef|;,-D29NJe3BLJw_5nq=ca~hp#Gd8#s2xe5<mst(j#kX#lQF' );
define( 'NONCE_KEY',        '7WCVoM+D-w#NJkq;U/4_BgbFMdBop^M18%A[u-C+s>0C#@h;  a[{4/,7-eV8e.g' );
define( 'AUTH_SALT',        'DH65$2<w}6]`*g>#u4f/TNDdqm`jwaH8IEiKbtZJ553:*]*ucam-0E>?;jV-;{G8' );
define( 'SECURE_AUTH_SALT', 'W l~W4IQc$5>]y}&URDIJmizg<g(:E({)#xZV^k<aQ@!2(&T&5(*|1.@`&F7zd8b' );
define( 'LOGGED_IN_SALT',   'SMbgdPco mPYN{#*Q]_Y,df&[FK_K,3 J@U*?l,WB,BWBaN6}6Xz8NQOAaWfKjS<' );
define( 'NONCE_SALT',       'Af!G]TNF_Xh7;Z*:}?#X7Rsa8or;t8MS2KT1+%>9*U&2z7LAW>{!+IQ%%,#@*ltG' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
