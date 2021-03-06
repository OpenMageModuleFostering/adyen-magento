<?php
/**
 *                       ######
 *                       ######
 * ############    ####( ######  #####. ######  ############   ############
 * #############  #####( ######  #####. ######  #############  #############
 *        ######  #####( ######  #####. ######  #####  ######  #####  ######
 * ###### ######  #####( ######  #####. ######  #####  #####   #####  ######
 * ###### ######  #####( ######  #####. ######  #####          #####  ######
 * #############  #############  #############  #############  #####  ######
 *  ############   ############  #############   ############  #####  ######
 *                                      ######
 *                               #############
 *                               ############
 *
 * Adyen Payment Module
 *
 * Copyright (c) 2019 Adyen B.V.
 * This file is open source and available under the MIT license.
 * See the LICENSE file for more info.
 *
 * Author: Adyen <magento@adyen.com>
 */
/**
 * @category   Payment Gateway
 * @package    Adyen_Payment
 * @author     Adyen
 * @property   Adyen B.V
 * @copyright  Copyright (c) 2014 Adyen BV (http://www.adyen.com)
 */
/** @var Mage_Sales_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$installer->run(
    "
DROP TABLE IF EXISTS `{$this->getTable('adyen/event_queue')}`;
CREATE TABLE `{$this->getTable('adyen/event_queue')}` (
`event_queue_id` int(11) NOT NULL AUTO_INCREMENT,
`psp_reference` varchar(55) DEFAULT NULL COMMENT 'pspReference',
`adyen_event_code` varchar(55) DEFAULT NULL COMMENT 'Adyen Event Code',
`increment_id` varchar(50) DEFAULT NULL COMMENT 'Increment Id',
`attempt` tinyint(1) DEFAULT NULL COMMENT 'attempt',
`response` text DEFAULT NULL COMMENT 'response',
`created_at` datetime NULL DEFAULT NULL COMMENT 'Created At',
PRIMARY KEY (`event_queue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `{$this->getTable('adyen/event_queue')}` ADD INDEX(`attempt`);
"
);
$installer->endSetup();
