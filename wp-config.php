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
define( 'DB_NAME', 'nieuwerwetsmc' );

/** Database username */
define( 'DB_USER', 'nieuwerwetsmc' );

/** Database password */
define( 'DB_PASSWORD', '5P-S!39pT7' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'ruaonpcghondqa0lz2gse89u2rfcmy19afcrjdzx3lgnqwfll0n3gvaaoisfqyau' );
define( 'SECURE_AUTH_KEY',  '81ce4j9xsyus1rtk7ym6kmwsqehjfi7zucp1jo5fb1pyfil7lh2dusfrv0cv0lgl' );
define( 'LOGGED_IN_KEY',    'ryusxdkerogytnrtew0sn3a2wbukcs2dgrv1ixc14jyef3ic8vjdb1fldnocae3h' );
define( 'NONCE_KEY',        'ixwf2aiuymqznlp7ldywjh5a5xtxvswwd1cnqnwvx8w9jolxryeiynllkzc89cm4' );
define( 'AUTH_SALT',        'xf7gsjjlcpy7nyms5o1uamxkhpfjufd3nqrxp1mcj1tl8f8iorchgflhcpikgwoz' );
define( 'SECURE_AUTH_SALT', 'hqpv24zjaxk6zqaygyuji4bwzcmg3dp1ewo30b7itp43odtxn8smn2o4lhlxosi5' );
define( 'LOGGED_IN_SALT',   'dddsq4fa00ltqvipirxgicfbejkvumcg2kdyveecxjlgaq1dl3msgeoo13xsls45' );
define( 'NONCE_SALT',       'x4j3klgw8e0inhjmulklr5zqmkhhunqxmr7n0zls7xzettp6yubi7gdrfguflmxm' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpvq_';

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
