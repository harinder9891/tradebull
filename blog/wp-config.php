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
define( 'DB_NAME', 'mastetnr_tradebullio_blog' );

/** MySQL database username */
define( 'DB_USER', 'mastetnr_tradebull_blog' );

/** MySQL database password */
define( 'DB_PASSWORD', 'tradebull_blog@#2022' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'anKzMn@8i$&x_ERgBiq_%Jt(bBZHDj_`!fngDcev!mx)kJluKncG#B2+A@hg`H2,' );
define( 'SECURE_AUTH_KEY',  'V;0[?lCN7b,E6OMafD|F_i$`d5!Lw?w<jDEeh4!3s+[LS?}@q$<hqdh]x2&fzt8n' );
define( 'LOGGED_IN_KEY',    'tBqIL %PU^s[E3ecYxUUdnVBU}R$(2Z2]?/D4|{^}L7z&_I,qy1HrA6L#DgG1J&q' );
define( 'NONCE_KEY',        '/!1GhJkY>r?chQV!RVjd-@EY1_ot/I6f`k5<o($qkl9-@!cdq)P^}/D/WDs%w=b7' );
define( 'AUTH_SALT',        '#@=M,F{!^mC,C!;Z|n& ?`G@:Wq}3HR~0J%6DIs+0##)[G_i?ned^=oY,sm`u]W|' );
define( 'SECURE_AUTH_SALT', '[Oiovukg|}Dm-u*Xg^Oy)sgK/BODc$3JE)gTHOu;AE=0^-B=WKKm,{KDT-}[v7W$' );
define( 'LOGGED_IN_SALT',   'D:uCg*u{$orwEHWtkG}3KDNAJ1#y4wKS:9V1q]X)4Bi]!0L7o]yLf85!(eK:z?N5' );
define( 'NONCE_SALT',       'fved4Zhs|#%bUikoE:0v2|XuH*1gLF,UX0nPn1mG!v-fVaW9dfU]}}u8UbVpy[II' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
