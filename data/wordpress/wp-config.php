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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'qwerty' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

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
define( 'AUTH_KEY',          'L4NV#]/v,Kv )8mT!~Op2U .lKoT&OAGnQEqR!O}YLC<K34U1hZ]l5C,bCH6YIA[' );
define( 'SECURE_AUTH_KEY',   '{^oAW6_1kh/YG5[)|/zs7!]K>s[i@Um{w:PYXw$1f=e{E TIC r{)(cQr>en8WPl' );
define( 'LOGGED_IN_KEY',     'M~2Iv2dd3.uQgFb*?wa` ;TCN/i[A7i/|sv}Rn_Z$yOCjv4/Jq;q$)#zM7%>;TNA' );
define( 'NONCE_KEY',         'Ypk~kcF.iiD!m&7]L$twQO s^wWv!H,[kiV2k(sqJUqHPDL|QP:E^EuN)PI%CY;^' );
define( 'AUTH_SALT',         'vK@T!=hpve&(*,y73B3{cJ>Wg^(YP?TvO$x7UiKH3bJ=WZ~A@@U~,#z7{mH0+1MY' );
define( 'SECURE_AUTH_SALT',  'e)7?=&keeQGeoSfPL<baZ&bvNpX:{;I{CizW!?3xn 2euR68abR<!y0k3hRaL?4C' );
define( 'LOGGED_IN_SALT',    'AN7,&Y.A<}p?QBp$6d)KU?DM#U)8ra.s!k+d9+nZ?v.VO8@9QX-]zX7rAs@Zv#7k' );
define( 'NONCE_SALT',        'NKPNPXzC/zBsrr*4l|u@Zm;`lUIDxUC[In`~MUu#t~RM8%RJ%9Z)`AJAq2FVsY<[' );
define( 'WP_CACHE_KEY_SALT', 'dLhgl(S03+}w#W6zj|V.bd.(dP~kA}BeHx<AN.#TQOB*=s RK;K=94TxBhLSq 8Q' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
