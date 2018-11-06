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
define('DB_NAME', 'test');

/** MySQL database username */
define('DB_USER', 'mamp');

/** MySQL database password */
define('DB_PASSWORD', 'mima');

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
define('AUTH_KEY',         'aeUz%{;AHNFG7rK5Y^P54qo@,#VK$|xBK}a-oF(4T0IbN3c2HWy#Z8*~g;d& k q');
define('SECURE_AUTH_KEY',  'ILFf8&0gKz&N$-czls~kLg$cnH0PUhPnLLz_(7bSU5g+#K/&`Ia*5ZMi$nUxJ}W-');
define('LOGGED_IN_KEY',    'iQG9(Q(J2 AiPx#Vi31lrOyAYB%Ysz4b6~aRkgrp}E8^^(lBHymO<e6-NBx}[JhA');
define('NONCE_KEY',        '`Dx@`I7I.Pn4Ip~,c!.y4VYAJb/W0cl65DlD hBT>D7?Txq#:W_4^~`Ig$I(3L&c');
define('AUTH_SALT',        '>61_uTZ*a<#NwI-kweU5<#$gHYm`/@s!39c*8-3&+0!aeQPhJT}pZk{<Yp%ZX4B?');
define('SECURE_AUTH_SALT', 'w_!H>,7$6?%T}&#VBG?vh+BGw-<[CQ.bMYBa6;caG>j]a@FJUN?HuqKsYj]M#f<]');
define('LOGGED_IN_SALT',   '%ST!=0soL<4B2=L1e`%n=)*m{gr=$NN?aK:[nvsc[ywZlsTHh%_YqVFo~@;4]b):');
define('NONCE_SALT',       'P;FG[k/J3l~Kv.Gc{LP`jXK[@MM]9,+Yz.%*{v]3My:8iy?pbS|CNmi!3`(fM#QU');

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
