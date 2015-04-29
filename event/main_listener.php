<?php

/**
*
* @package Anavaro.com Event Medals
* @copyright (c) 2013 Lucifer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace anavaro\fbgcustom\event;

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'		=> 'user_setup_event',
		);
	}
	
	/**
	* Constructor
	* NOTE: The parameters of this method must match in order and type with
	* the dependencies defined in the services.yml file for this service.
	*
	* @param \phpbb\auth		$auth		Auth object
	* @param \phpbb\cache\service	$cache		Cache object
	* @param \phpbb\config	$config		Config object
	* @param \phpbb\db\driver	$db		Database object
	* @param \phpbb\request	$request	Request object
	* @param \phpbb\template	$template	Template object
	* @param \phpbb\user		$user		User object
	* @param \phpbb\content_visibility		$content_visibility	Content visibility object
	* @param \phpbb\controller\helper		$helper				Controller helper object
	* @param string			$root_path	phpBB root path
	* @param string			$php_ext	phpEx
	*/
	public function __construct(\phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, 
	\phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, \phpbb\controller\helper $helper)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->helper = $helper;
	}

	public function user_setup_event()
	{
		if ($this->user->data['user_id'] != ANONYMOUS || $this->user->data['user_type'] != USER_IGNORE)
		{
			// Ok so we need to set some cookies! Let's first get them!
			$cookie_jid = $this->request->variable($this->config['cookie_name'] . '_jid', '', true, \phpbb\request\request_interface::COOKIE);
			$cookie_nick = $this->request->variable($this->config['cookie_name'] . '_nick', '', true, \phpbb\request\request_interface::COOKIE);

			if (!$cookie_jid)
			{
				$this->user->set_cookie('jid', $this->user->data['username_clean']."@chat.f-bg.org", time() + 108000);
			}
			if (!$cookie_nick)
			{
				$this->user->set_cookie('nick', $this->user->data['username'], time() + 108000);
			}
		}
	}
}
