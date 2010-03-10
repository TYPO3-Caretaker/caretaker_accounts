<?php

########################################################################
# Extension Manager/Repository config file for ext "caretaker_accounts".
#
# Auto generated 10-03-2010 10:19
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Caretaker Account Management',
	'description' => 'Manage Login Accounts for Caretaker Instances and Instancegroups',
	'category' => 'module',
	'author' => 'Martin Ficzel',
	'author_email' => 'ficzel@work.de',
	'shy' => '',
	'dependencies' => 'caretaker',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
			'caretaker' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:11:{s:9:"ChangeLog";s:4:"f630";s:10:"README.txt";s:4:"ee2d";s:12:"ext_icon.gif";s:4:"1bdc";s:14:"ext_tables.php";s:4:"9b5e";s:14:"ext_tables.sql";s:4:"b00d";s:38:"icon_tx_caretakeraccounts_accounts.gif";s:4:"475a";s:35:"icon_tx_caretakeraccounts_types.gif";s:4:"475a";s:16:"locallang_db.xml";s:4:"ab01";s:7:"tca.php";s:4:"9219";s:19:"doc/wizard_form.dat";s:4:"9d3c";s:20:"doc/wizard_form.html";s:4:"ed7c";}',
);

?>