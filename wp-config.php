<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'sobegbf');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T DFdR4FsV IE~k(q!x?3$NB8(o _6Z>0r&1EQ},,Je},^mb#P>5*{j0ZAS` Ad`');
define('SECURE_AUTH_KEY',  'HKC}=5=ta70/(.?64oZqyoo(%^HU|Sr}o%99}Fg{w/!d/,YkbOf-MZ4v{;@laRr5');
define('LOGGED_IN_KEY',    'abYMxqi[p{F FYfi6VSAGepv7__uITU)0.4/]=*fbVVn;6|)dHQ,DDYnDiIO)S+V');
define('NONCE_KEY',        'zKIX`i2|N-kJ^eKHa;H&m4c|B}[25F>8lfv2#bCBH`Q;!/*Ch6bl6YxT-oMEjTFw');
define('AUTH_SALT',        '&S`#i_`vtfyxI+`2e-[fs#`(-oU bDWa[/EKAc@SrT^TBC`#BDirboQ.?6ihpRp+');
define('SECURE_AUTH_SALT', 'Axefd>WZ{z:(qC4/uqUEhayaI)CK]J-F-u]W9y)<m`:DlD~gCYon2-!85tU,`},|');
define('LOGGED_IN_SALT',   'bC--W4uC}8wP.{]A6sDF;Vq1[Of<9D|Z(6}T;7h]Zp!6P3?qFm.[@14,jY)B44#*');
define('NONCE_SALT',       'gi0x#>DdZrri9IR$+l[B_M_k?^;sIZrkm.99wU)6KVH$iEQ3vd{VDS`5@[W@N!4V');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'sobegbf_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');