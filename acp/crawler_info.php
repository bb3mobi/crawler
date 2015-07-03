<?php
/**
* @package Rotation for blocks
* @author Anvar [http://bb3.mobi]
* @version v1.0.0, 2015/07/03
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/

namespace bb3mobi\crawler\acp;

class crawler_info
{
	function module()
	{
		return array(
			'filename'	=> '\bb3mobi\crawler\acp\crawler_module',
			'title'		=> 'ACP_CRAWLER_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'config'		=> array('title' => 'ACP_CRAWLER', 'auth' => 'ext_bb3mobi/crawler', 'cat' => array('ACP_CRAWLER_TITLE')),
			),
		);
	}
}
