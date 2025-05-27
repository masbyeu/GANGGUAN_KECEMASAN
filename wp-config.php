<?php
ob_start();
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
define( 'DB_NAME', 'sistem_pakar' );

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
define( 'AUTH_KEY',         'pNfL PuDU(s>XSle-])^tI<ijAE.?SiMZN*L&1w/tC_uew JH0itGCUbTP>VESuj' );
define( 'SECURE_AUTH_KEY',  'ETiVpeOv$=/@_5T$CzN=]r48o/+;2:4@<B[%!~JJY)<^i&m38S ZF]$8t1^56Mio' );
define( 'LOGGED_IN_KEY',    'Ft&s.qu9@SKP096&~S8?.mo%p/BMVFN$TP7oij:@y>#w2bV$pJtHJU>wOl{ UR(K' );
define( 'NONCE_KEY',        'AaHk8z<{8tFp*1,,;Ki@g*TSV,I~bxEP21MYL$0^qo_I70N;zkl;Z|_2q%ts9By2' );
define( 'AUTH_SALT',        'U4;{~~<8!L2{>R_WZ`C*P[Y~9<@E;hw5W6>xf[Gm0;:*/ZK}{?R;i5BH[zN`!OS%' );
define( 'SECURE_AUTH_SALT', '?1dk5X4hU]|H.>KD$>0:f]Gs1G=9X|maxE9:a2b4m M0qF$(n&=/g{,C$Ung@-.4' );
define( 'LOGGED_IN_SALT',   '2.n6q eDxZBAlSB)n*51yTBa)=+zAzeuY}n*y!G$k{oHa+!2?+ Xhk7eG/vrSJ^y' );
define( 'NONCE_SALT',       '#{3A.|lWG/}dr:z4<fp4=M9Ta,^>)Gg{iv35DeT<F<{jN0Zu`[ZyxxU[3$5%8 $k' );

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

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

