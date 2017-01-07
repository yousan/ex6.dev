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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'root_ex6' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'example' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql.dev' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'k wr}Q(NQq)GOb!h$xQ#Kp@a1,c~eaX/3v=L2mHrvHwpouaroD~(kt _IMw<pK[I');
define('SECURE_AUTH_KEY',  '`^D[9twrkNjPqOP)V0,Q:Ze7tbEVFe|O>|pw-U0.0DIXECb4bFWC|>1LL7u!b w.');
define('LOGGED_IN_KEY',    'c/&P0?BknS<;<WsfP]mU qK}~k2g$fV |e2 _|0!0CI&>7L5qW~O:#@0Wu]Q`;Un');
define('NONCE_KEY',        ')0: %N-g=lRVapR?];/pe6T]s=)J`qHe_-4}O(2OBCpcmT4{c0.|cN#.$IFEG%WO');
define('AUTH_SALT',        'ulDlW}39MY0%]Q$Gi^q9,1,m@jn-.=OoPY,DUiD(_xT]F=,c->KnC5eTkP3)[S:O');
define('SECURE_AUTH_SALT', '09OWNIxY)aT6JIh>K@oHPPbHdfOT]gl+L``GzIj49a[2Bft.RSsQ]g7Fgj*jdE+7');
define('LOGGED_IN_SALT',   '- @x:;eKd<ImmNf`OsrdJ.WhWO`T]w6W8 !*V$M/_sF%UJ{en[}nsT7(.heyu~g$');
define('NONCE_SALT',       '>N6://{|0h!BGu2*]U+|Hfk#@: 738Wu@Oma`-Gm-clK4+<BGl3dLe$(`$nFh2p+');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'FS_METHOD', 'direct' );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
