<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
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

$lang = array_merge($lang, array(
	'TEST_LANG_DAYS'		=> array(
		0 => '%2$d hours %3$d minutes %4$d secs', 
		1 => '%1$d days %2$d hours %3$d minutes %4$d secs',
	),
	'TEST_LANG_HOURS' 		=> array(
		0 => '%2$d minutes %3$d secs', 
		1 => '%1$d hours %2$d minutes %3$d secs',
	),
	'TEST_LANG_MINUTES' 		=> array(
		0 => '%2$d secs', 
		1 => '%1$d minutes %2$d secs',
	),
));