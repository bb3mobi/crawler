<?php
/**
* @package Rotation for blocks
* @author Anvar [http://bb3.mobi]
* @version v1.0.0, 2015/07/03
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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

$lang = array_merge($lang, array(
	'ACP_CRAWLER_TITLE'				=> 'Rotator blocks',
	'ACP_CRAWLER'					=> 'Crawler',
	'ACP_CRAWLER_DESCRIPTION'		=> '',
	'ACP_CRAWLER_EXPLAIN'			=> 'Anvar &copy; <a href="http://bb3.mobi">BB3.Mobi</a>',
	'ACP_CRAWLER_SETTINGS'			=> 'Change settings',
	'ACP_CRAWLER_ID'				=> 'id blocks',
	'ACP_CRAWLER_ID_EXPLAIN'		=> 'id blocks separated by a comma, the contents of which you want to rotate',
	'ACP_CRAWLER_SPEED'				=> 'Speed hover',
	'ACP_CRAWLER_SPEED_EXPLAIN'		=> 'Set rotation speed when mouse.',
	'ACP_CRAWLER_BEHAVIOR'			=> 'Active hover',
	'ACP_CRAWLER_BEHAVIOR_EXPLAIN'	=> 'If you move the mouse left or right will rotate in the opposite direction another pause.',

	'ACP_CRAWLER_NEUTRAL'			=> 'Neutral',
	'ACP_CRAWLER_DIRECTION'			=> 'Save direction',
	'ACP_CRAWLER_MOVEATLEAST'		=> 'Speed',
));
