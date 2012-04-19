<?php

/***************************************************************
* Copyright notice
*
* (c) 2009 by n@work GmbH and networkteam GmbH
*
* All rights reserved
*
* This script is part of the Caretaker project. The Caretaker project
* is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * This is a file of the caretaker project.
 * http://forge.typo3.org/projects/show/extension-caretaker
 *
 * Project sponsored by:
 * n@work GmbH - http://www.work.de
 * networkteam GmbH - http://www.networkteam.com/
 *
 * $Id: ext_localconf.php 30744 2010-03-04 09:04:16Z martoro $
 */

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$TCA['tx_caretakeraccounts_types'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_types',		
		'label'     => 'name',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'res/icons/accounttype.png',
	),
);

$TCA['tx_caretakeraccounts_accounts'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_accounts',		
		'label'     => 'username',
		'label_alt'  => 'type',
		'label_alt_force' => true,
		'hideTable' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'res/icons/account.png',
	),
);

$tempColumns = array (
	'tx_caretakeraccounts_accounts' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretaker_instance.tx_caretakeraccounts_accounts',		
		'config' => array (
			'type' => 'inline',
			'foreign_table' => 'tx_caretakeraccounts_accounts',
			'foreign_field' => 'uid_node',
			'foreign_table_field' => 'node_table',
			'appearance' => array (
				'collapseAll' => true,
				'expandSingle' => true
			)
		)
	),
);


t3lib_div::loadTCA('tx_caretaker_instance');
t3lib_extMgm::addTCAcolumns('tx_caretaker_instance',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('tx_caretaker_instance','--div--;Accounts,tx_caretakeraccounts_accounts;;;;1-1-1' , '' , 'after:contacts' );

$tempColumns = array (
	'tx_caretakeraccounts_accounts' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretaker_instancegroup.tx_caretakeraccounts_accounts',		
		'config' => array (
			'type' => 'inline',
			'foreign_table' => 'tx_caretakeraccounts_accounts',
			'foreign_field' => 'uid_node',
			'foreign_table_field' => 'node_table',
			'appearance' => array (
				'collapseAll' => true,
				'expandSingle' => true
			)
		)
	),
);


t3lib_div::loadTCA('tx_caretaker_instancegroup');
t3lib_extMgm::addTCAcolumns('tx_caretaker_instancegroup',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('tx_caretaker_instancegroup','--div--;Accounts, tx_caretakeraccounts_accounts;;;;1-1-1' , '' , 'after:contacts' );
?>