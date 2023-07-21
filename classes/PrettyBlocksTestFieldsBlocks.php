<?php 
/**
 * Copyright (c) Since 2020 PrestaSafe and contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to contact@prestasafe.com so we can send you a copy immediately.
 *
 * @author    PrestaSafe <contact@prestasafe.com>
 * @copyright Since 2020 PrestaSafe and contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaSafe
 */

use PrestaSafe\PrettyBlocks\Interfaces\BlockInterface;

class PrettyBlocksTestFieldsBlocks implements BlockInterface
{
    private $module; 
    
    public function __construct($module)
    {
        $this->module = $module;
    }


    public function registerBlocks(): array
    {
        $logo = HelperBuilder::pathFormattedToUrl('$/modules/'.$this->module->name.'/logo.png');
        return [
            'name' => $this->module->l('PrettyBlocks TEST'),
            'description' => $this->module->l('For testing all fields values'),
            'code' => 'pretty_test',
            'tab' => 'general',
            'insert_default_settings' => true,
            'icon' => 'BugAntIcon',
            'logo' => $logo,
            'need_reload' => false,
            'templates' => [
                'default' => 'module:' . $this->module->name . '/views/templates/blocks/test.tpl',
                'reverse' => 'module:' . $this->module->name . '/views/templates/blocks/reverse.tpl',
            ],
            // repeater
            'config' => [
                'fields' => $this->module->getFieldsToTest()
            ],
            // reapeater
            'repeater' => [
                'name' => 'Element repeated',
                'nameFrom' => 'title',
                'groups' => $this->module->getFieldsToTest()
            ]

        ];
    }
}
