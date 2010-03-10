<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_caretakeraccounts_types'] = array (
	'ctrl' => $TCA['tx_caretakeraccounts_types']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,name,url_pattern,type_icon'
	),
	'feInterface' => $TCA['tx_caretakeraccounts_types']['feInterface'],
	'columns' => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'name' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_types.name',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'url_pattern' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_types.url_pattern',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'type_icon' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_types.type_icon',		
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],	
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
				'uploadfolder' => 'uploads/tx_caretakeraccounts',
				'show_thumbs' => 1,	
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;1;;1-1-1, name, url_pattern, type_icon')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);



$TCA['tx_caretakeraccounts_accounts'] = array (
	'ctrl' => $TCA['tx_caretakeraccounts_accounts']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,uid_node,node_table,username,password,url,hostname,type'
	),
	'feInterface' => $TCA['tx_caretakeraccounts_accounts']['feInterface'],
	'columns' => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'username' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_accounts.username',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'password' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_accounts.password',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'url' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_accounts.url',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'hostname' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_accounts.hostname',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'type' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:caretaker_accounts/locallang_db.xml:tx_caretakeraccounts_accounts.type',		
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'tx_caretakeraccounts_types',
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => array(
                '_PADDING'  => 2,
                '_VERTICAL' => 1,
                'add' => array(
                    'type'   => 'script',
                    'title'  => 'Create new record',
                    'icon'   => 'add.gif',
                    'params' => array(
                        'table'    => 'tx_caretakeraccounts_types',
                        'pid'      => '###CURRENT_PID###',
                        'setValue' => 'prepend'
                    ),
                    'script' => 'wizard_add.php',
                ),
                'edit' => array(
                    'type'                     => 'popup',
                    'title'                    => 'Edit',
                    'script'                   => 'wizard_edit.php',
                    'popup_onlyOpenIfSelected' => 1,
                    'icon'                     => 'edit2.gif',
                    'JSopenParams'             => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                ),
            ),

			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;;;1-1-1, type, username;;;;2-2-2, password, url;;;;3-3-3, hostname, ')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);
?>