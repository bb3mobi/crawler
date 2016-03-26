<?php

/**
* @package Rotation for blocks
* @author Anvar [http://bb3.mobi]
* @version v1.0.0, 2015/07/03
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace bb3mobi\crawler\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->template = $template;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after' => 'crawler',
		);
	}

	public function crawler()
	{
		$this->template->assign_vars(array(
			'S_CRAWLER'				=> true,
			'S_CRAWLER_SPEED'		=> $this->config['crawler_speed'],
			'S_CRAWLER_BEHAVIOR'	=> $this->config['crawler_behavior'],
			'S_CRAWLER_NEUTRAL'		=> $this->config['crawler_neutral'],
			'S_CRAWLER_DIRECTION'	=> $this->config['crawler_direction'],
			'S_CRAWLER_MOVEATLEAST'	=> $this->config['crawler_moveatleast'],
			)
		);

		$crawler_ids = explode(',', $this->config['crawler_id']);
		foreach ($crawler_ids as $crawler_id)
		{
			$this->template->assign_block_vars('crawlerrow', array(
				'CRAWLER_ID'	=> trim(str_replace('#', '', $crawler_id)),
			));
		}
	}
}
