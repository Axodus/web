<?php
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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'axds_wp' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'Padrao123#' );

/** Database hostname */
define( 'DB_HOST', '34.27.178.193' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'Y7^w|_xUBFFDSq| +X4=y|-pt2xZUI`.1hfkM0cvH;&,9N[}m$sUz$IF:n8D1|d6');
define('SECURE_AUTH_KEY',  'YL@qJ+AnB_}KoB}Zk)?IxVT(!y|?,03}G[e*i=q-fhp.z+{)}n@buS@}B_/+x(0#');
define('LOGGED_IN_KEY',    '-JkC^(%(<nFP1#&Mb57Y:E]Je?_<]}h;3@yOZ2X4XIM90Zr2mE#mOK7o=Hth1s %');
define('NONCE_KEY',        'u,&hv#!{ i{:!<M<y7GGV;e=t|ORLU?0J[90ur<6FzcR8d.1>9scq([oA-.X.j0C');
define('AUTH_SALT',        'p6-$T%]xPP[D+MTDE-6^U%pc~JdS1C=E&t.^pBp&YLCM-Qr+S*~j-cI]|[c}oJ|4');
define('SECURE_AUTH_SALT', 'zx{nf/./SJ2TNlUuj?|Yi^6#bekX1:NB{kBi+BC/Cum~$xgLGrTu -.V7z3hERd3');
define('LOGGED_IN_SALT',   'iLF*o@-8b>*<#7FAd|)E+BHRzi?7^LodRT>UO!v(>1a,hh*iDG<44&i7&TO$]_+a');
define('NONCE_SALT',       '-3q&[p8SgQp6B*L{),AZ,;/,/cX3:c$HkB4,`amWj{JT=4;-9s|<030RKK>,0SWe');

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
define( 'WP_DEBUG_LOG', false );
/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
