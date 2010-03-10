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

	// register Backend Panel
tx_caretaker_ServiceHelper::registerExtJsBackendPanel (
	'node-accounts',
	'caretaker-nodeaccounts',
	Array( 'EXT:caretaker/res/css/tx.caretaker.overview.css' ),
	Array( 'EXT:caretaker_accounts/res/js/tx.caretaker_accounts.NodeAccounts.js' ),
	$_EXTKEY
);

	// register Ajax Methods
$TYPO3_CONF_VARS['BE']['AJAX']['tx_caretaker_accounts::nodeaccounts'] = 'EXT:caretaker_accounts/classes/ajax/class.tx_caretakeraccounts_AjaxNodeAccounts.php:tx_caretakeraccounts_AjaxNodeAccounts->ajaxGetNodeAccounts';

?>
