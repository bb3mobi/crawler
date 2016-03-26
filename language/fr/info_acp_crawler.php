<?php
/**
*
* Rotation for blocks extension for the phpBB Forum Software package.
* French translation by Galixte (http://www.galixte.com)
*
* @copyright (c) 2015 Anvar <http://bb3.mobi>
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_CRAWLER_TITLE'				=> 'Défilement des blocs',
	'ACP_CRAWLER'					=> 'Défilement des blocs',
	'ACP_CRAWLER_DESCRIPTION'		=> 'Permet de faire défiler les blocs.',
	'ACP_CRAWLER_EXPLAIN'			=> 'Anvar &copy; <a href="http://bb3.mobi">BB3.Mobi</a>',
	'ACP_CRAWLER_SETTINGS'			=> 'Modifier les paramètres',
	'ACP_CRAWLER_ID'				=> 'ID des blocs',
	'ACP_CRAWLER_ID_EXPLAIN'		=> 'Permet de saisir les ID des blocs, séparés par une virgule, que l’on souhaite voir défiler. Les ID des blocs sont visibles lorsque l’on affiche le code source de la page et sont du type : <em>div id="scroll-cr"</em>, ainsi il faudra saisir : <em>scroll-cr</em> est à saisir.',
	'ACP_CRAWLER_SPEED'				=> 'Vitesse du défilement maximum / par défaut',
	'ACP_CRAWLER_SPEED_EXPLAIN'		=> 'Permet de saisir la vitesse maximum du défilement au survol de la souris. Pour atteindre cette vitesse, il est nécessaire d’orienter la souris aux extrémités de l’affichage du défilement. Cette vitesse est celle par défaut lorsque l’option : « Activer le contrôle au survol de la souris » est désactivé.',
	'ACP_CRAWLER_BEHAVIOR'			=> 'Activer le contrôle au survol de la souris',
	'ACP_CRAWLER_BEHAVIOR_EXPLAIN'	=> 'Si activé, selon le mouvement du survol de la souris vers la gauche ou vers la droite, le défilement ira dans la direction opposée marquant une pause entre chaque changement. Un survol de la souris au centre arrête le défilement. Si désactivé, la vitesse de défilement sera celle du paramètre : « Vitesse du défilement maximum / par défaut ».',

	'ACP_CRAWLER_NEUTRAL'			=> 'Fluidité du défilement',
	'ACP_CRAWLER_DIRECTION'			=> 'Enregistrer la direction',
	'ACP_CRAWLER_MOVEATLEAST'		=> 'Vitesse du défilement par défaut lorsque le contrôle au survol de la souris est activé',
));
