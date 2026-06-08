<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('FS_METHOD', 'direct');
define( 'DB_NAME', 'simplior' );

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
define( 'AUTH_KEY',         'G?[OQ>F:UTG/ucNP`>lm}n1%>i}}[I`Z%]y:KSpW6G.VSx zKT94L^1W4E0&Bqm!' );
define( 'SECURE_AUTH_KEY',  'g:<^Xc|^OP}rBp pH~Ep5t8Ev60EP1uyIMo//(p`u. `vUaYq},# 5vF@ml&UlOs' );
define( 'LOGGED_IN_KEY',    'Aui:0,,]Pr6G_um_Z bOn~R> smn|EjVT@V*p/#UT%iw^1}ff>4x8gnL_Ew~?ZHU' );
define( 'NONCE_KEY',        '2?:!*X5dD-&USIZ&qXxzju?$7pY9q?o1/Vk=8ds&mq!@~:B/+q.E-EsIN2Ur9Uo8' );
define( 'AUTH_SALT',        'H7?WNXkyG[=wx|qqU|u>R$NVu7TE mpOj7q:NZg$qi4qwY#e|Xq4y_O;(7v/m;,s' );
define( 'SECURE_AUTH_SALT', 'Zoz7@r/z@N[2OS~x;A$bD{z.IKuj>~%(tn0_remlJ2jqSqM9dM{8<f5bsnR8o=ss' );
define( 'LOGGED_IN_SALT',   'Ec+,l_QK#(kXV-xGxw4yXRr_BnQc:)v+=M^ jq!o(Si?BJZV|ySXjnr&?{n+at|R' );
define( 'NONCE_SALT',       '*.w%7(uWup3-;*x2c{8Q)QIx@RoMQ:P<UDR4J7oDW8J6<|yRm@!u.1M5NF$ck^vB' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cws_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
