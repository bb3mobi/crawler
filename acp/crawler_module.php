<?php
/**
* @package Rotation for blocks
* @author Anvar [http://bb3.mobi]
* @version v1.0.0, 2015/07/03
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/

namespace bb3mobi\crawler\acp;

class crawler_module
{
	var $u_action;
	var $new_config = array();

	function main($id, $mode)
	{
		global $config, $user, $template, $request;

		$this->page_title = 'ACP_CRAWLER_TITLE';
		$this->tpl_name = 'acp_board';

		$submit = $request->is_set_post('submit');

		$form_key = 'crawler';
		add_form_key($form_key);

		$display_vars = array(
			'title'	=> 'ACP_CRAWLER',
			'vars'	=> array(
				'legend1'	=> 'ACP_RECENT_SETTINGS',
					'crawler_behavior'		=> array('lang' => 'ACP_CRAWLER_BEHAVIOR',		'validate' => 'bool',		'type' => 'radio:yes_no', 'explain' => true),
					'crawler_id'			=> array('lang' => 'ACP_CRAWLER_ID',			'validate' => 'string',		'type' => 'textarea:6:30', 'explain' => true),
					'crawler_speed'			=> array('lang' => 'ACP_CRAWLER_SPEED',			'validate' => 'int:0:22',	'type' => 'number:0:22', 'explain' => true),
					'crawler_neutral'		=> array('lang' => 'ACP_CRAWLER_NEUTRAL',		'validate' => 'int:0:999',	'type' => 'number:0:999', 'explain' => false),
					'crawler_direction'		=> array('lang' => 'ACP_CRAWLER_DIRECTION',		'validate' => 'bool',		'type' => 'radio:yes_no', 'explain' => false),
					'crawler_moveatleast'	=> array('lang' => 'ACP_CRAWLER_MOVEATLEAST',	'validate' => 'int:0:9',	'type' => 'number:0:9', 'explain' => false),
				'legend2'	=> 'ACP_SUBMIT_CHANGES',
			),
		);

		if (isset($display_vars['lang']))
		{
			$user->add_lang($display_vars['lang']);
		}

		$this->new_config = $config;

		$cfg_array = ($request->is_set('config')) ? utf8_normalize_nfc($request->variable('config', array('' => ''), true)) : $this->new_config;
		$error = array();

		// We validate the complete config if wished
		validate_config_vars($display_vars['vars'], $cfg_array, $error);

		if ($submit && !check_form_key($form_key))
		{
			$error[] = $user->lang['FORM_INVALID'];
		}
		// Do not write values if there is an error
		if (sizeof($error))
		{
			$submit = false;
		}

		// We go through the display_vars to make sure no one is trying to set variables he/she is not allowed to...
		foreach ($display_vars['vars'] as $config_name => $null)
		{
			if (!isset($cfg_array[$config_name]) || strpos($config_name, 'legend') !== false)
			{
				continue;
			}

			$this->new_config[$config_name] = $config_value = $cfg_array[$config_name];

			if ($submit)
			{
				$config->set($config_name, $config_value);
			}
		}

		if ($submit)
		{
			// POST Forums config && Anvar (bb3.mobi)
			$values = request_var('recent_only_forums', array(0 => ''));
			$news = implode(',', $values);
			$config->set('recent_only_forums', $news);

			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
		}

		$this->page_title = $display_vars['title'];

		$template->assign_vars(array(
			'L_TITLE'				=> $user->lang[$display_vars['title']],
			'L_TITLE_EXPLAIN'		=> $user->lang[$display_vars['title'] . '_EXPLAIN'],
			'L_TITLE_DESCRIPTION'	=> $user->lang[$display_vars['title'] . '_DESCRIPTION'],

			'S_ERROR'			=> (sizeof($error)) ? true : false,
			'ERROR_MSG'			=> implode('<br />', $error),
		));

		// Output relevant page
		foreach ($display_vars['vars'] as $config_key => $vars)
		{
			if (!is_array($vars) && strpos($config_key, 'legend') === false)
			{
				continue;
			}

			if (strpos($config_key, 'legend') !== false)
			{
				$template->assign_block_vars('options', array(
					'S_LEGEND'		=> true,
					'LEGEND'		=> (isset($user->lang[$vars])) ? $user->lang[$vars] : $vars)
				);

				continue;
			}

			$type = explode(':', $vars['type']);

			$l_explain = '';
			if ($vars['explain'] && isset($vars['lang_explain']))
			{
				$l_explain = (isset($user->lang[$vars['lang_explain']])) ? $user->lang[$vars['lang_explain']] : $vars['lang_explain'];
			}
			else if ($vars['explain'])
			{
				$l_explain = (isset($user->lang[$vars['lang'] . '_EXPLAIN'])) ? $user->lang[$vars['lang'] . '_EXPLAIN'] : '';
			}

			$l_description = (isset($user->lang[$vars['lang'] . '_DESCRIPTION'])) ? $user->lang[$vars['lang'] . '_DESCRIPTION'] : '';

			$content = build_cfg_template($type, $config_key, $this->new_config, $config_key, $vars);

			if (empty($content))
			{
				continue;
			}

			$template->assign_block_vars('options', array(
				'KEY'					=> $config_key,
				'TITLE'					=> (isset($user->lang[$vars['lang']])) ? $user->lang[$vars['lang']] : $vars['lang'],
				'S_EXPLAIN'				=> $vars['explain'],
				'TITLE_EXPLAIN'			=> $l_explain,
				'TITLE_DESCRIPTION'		=> $l_description,
				'CONTENT'				=> $content,
				)
			);

			unset($display_vars['vars'][$config_key]);
		}
	}
}
