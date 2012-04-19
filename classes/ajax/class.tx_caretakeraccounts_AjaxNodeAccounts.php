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
 * $Id: class.tx_caretaker_NodeInfo.php 30754 2010-03-04 14:30:17Z martoro $
 */

/**
 * Ajax Methods node account informations
 * plugin for caretaker-overview backend-module.
 *
 * @author Martin Ficzel <martin@work.de>
 * @author Thomas Hempel <thomas@work.de>
 * @author Christopher Hlubek <hlubek@networkteam.com>
 * @author Tobias Liebig <liebig@networkteam.com>
 *
 * @package TYPO3
 * @subpackage caretaker
 */
class tx_caretakeraccounts_AjaxNodeAccounts {

    /**
	 * Get the account informations for the given node for AJAX
	 *
	 * @param array $params
	 * @param TYPO3AJAX $ajaxObj
	 */
	public function ajaxGetNodeAccounts ($params, &$ajaxObj){

        $node_id = t3lib_div::_GP('node');
		$node_repository = tx_caretaker_NodeRepository::getInstance();

        if ($node_id && $node = $node_repository->id2node($node_id, true) ){

			$accounts = array();
			$count = 0;

			while ( $count < 3 && $node && $node->getType() != tx_caretaker_Constants::nodeType_Root ){

				$resAccounts = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_caretakeraccounts_accounts' , 'uid_node=' .  $node->getUid() . ' AND node_table=\'' . $node->getStorageTable() . '\'');

				while ( $account_row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resAccounts)) {

						// get Type Infos
					if ($account_row['type']){
						$resType = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_caretakeraccounts_types' , 'uid=' .  $account_row['type'] . ' AND deleted = 0 AND hidden = 0 ' );
						if ( $t = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resType) ){
							$type = $t;
						} else {
							$type = array ( 'name' => '',  'url_pattern'=> '' );
						}
					}

					$url = $account_row['url'];
					if ($type['url_pattern']){
						$url = $type['url_pattern'];

						if ( !$account_row['url'] ) {
							$account_row['url'] = $node->getInstance()->getUrl();
						}

						if ( !$account_row['hostname'] ) {
							$account_row['hostname'] = $node->getInstance()->getHostname();
						}

						$url = str_replace( '###URL###', $account_row['url'] ,$url );
						$url = str_replace( '###HOSTNAME###', $account_row['hostname'] ,$url );
						$url = str_replace( '###USERNAME###', $account_row['username'] ,$url);
						$url = str_replace( '###PASSWORD###', $account_row['password'] ,$url);
					}

					$account = array(
						'num'          => $count++,
						'id'           => $node->getCaretakerNodeId(). '_account_' . $account_row['uid'] . '_address_' . $address['uid'],

						'node_title'   => $node->getTitle(), //. ' par ' . $node->getParent()->getTitle() ,
						'node_type'    => $node->getType(),
						'node_type_ll' => $node->getTypeDescription(),
						'node_id'      => $node->getCaretakerNodeId(),

						'account_username'  => $account_row['username'],
						'account_password'  => $account_row['password'],
						'account_url'       => $account_row['url'],

						'type_name'          => $type['name'],

						'url'                => $url,

					);

					$accounts[] = $account;
					$count ++;
				}

				$node = $node->getParent();

			}

			$content = Array();
			$content['accounts']     = $accounts;
			$content['totalCount']   = $count;

            $ajaxObj->setContent($content);
            $ajaxObj->setContentFormat('jsonbody');
        }
    }


}
?>
