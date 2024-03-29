<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Wildfire
 * @subpackage Plugin
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: //p4-wdpro/Projects/NGE/Shared/zend-framework/1.11.7/src/Zend/Wildfire/Plugin/Interface.php#1 $
 */

/**
 * @category   Zend
 * @package    Zend_Wildfire
 * @subpackage Plugin
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
interface Zend_Wildfire_Plugin_Interface
{

    /**
     * Flush any buffered data.
     *
     * @param string $protocolUri The URI of the protocol that should be flushed to
     * @return void
     */
    public function flushMessages($protocolUri);

    /**
     * Get the unique indentifier for this plugin.
     *
     * @return string Returns the URI of the plugin.
     */
    public function getUri();

}
