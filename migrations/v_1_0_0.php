<?php
/**
* @package phpBB3.1 Rotatation for blocks
* @copyright Anvar Apwa.ru (c) 2015 bb3.mobi
*/

namespace bb3mobi\crawler\migrations;

class v_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['crawler_version']) && version_compare($this->config['crawler_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('crawler_id', '')),
			array('config.add', array('crawler_speed', '4')), //speed - pixel increment for each iteration of this marquee's movement
			array('config.add', array('crawler_behavior', 'cursor driven')), //mouseover behavior ('pause' 'cursor driven' or false)
			array('config.add', array('crawler_neutral', '600')),
			array('config.add', array('crawler_direction', '0')),
			array('config.add', array('crawler_moveatleast', '1')),

			// Current version
			array('config.add', array('crawler_version', '1.0.0')),

			// Add ACP modules
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_CRAWLER')),

			array('module.add', array('acp', 'ACP_CRAWLER', array(
				'module_basename'	=> '\bb3mobi\crawler\acp\crawler_module',
				'module_langname'	=> 'ACP_CRAWLER_SETTINGS',
				'module_mode'		=> 'config',
				'module_auth'		=> 'ext_bb3mobi/crawler',
			))),
		);
	}
}
