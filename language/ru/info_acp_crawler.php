<?php
/**
* @package Rotation for blocks
* @author Anvar [http://bb3.mobi]
* @version v1.0.0, 2015/07/03
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
	'ACP_CRAWLER_TITLE'				=> 'Ротатор блоков',
	'ACP_CRAWLER'					=> 'Каруселька',
	'ACP_CRAWLER_DESCRIPTION'		=> '',
	'ACP_CRAWLER_EXPLAIN'			=> 'Anvar &copy; <a href="http://bb3.mobi">BB3.Mobi</a>',
	'ACP_CRAWLER_SETTINGS'			=> 'Изменение настроек',
	'ACP_CRAWLER_ID'				=> 'id блоков',
	'ACP_CRAWLER_ID_EXPLAIN'		=> 'id блоков через запятую, содержимое которых необходимо вращать',
	'ACP_CRAWLER_SPEED'				=> 'Скорость при наведении',
	'ACP_CRAWLER_SPEED_EXPLAIN'		=> 'Задать скорость вращения при наведении мыши.',
	'ACP_CRAWLER_BEHAVIOR'			=> 'Активное наведение',
	'ACP_CRAWLER_BEHAVIOR_EXPLAIN'	=> 'При наведении мыши слева или справа будет вращение в противоположную сторону иначе пауза.',

	'ACP_CRAWLER_NEUTRAL'			=> 'Нейтральный',
	'ACP_CRAWLER_DIRECTION'			=> 'Сохранить направление',
	'ACP_CRAWLER_MOVEATLEAST'		=> 'Скорость движения',
));
