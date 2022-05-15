<?php

/**
 * 2007-2020 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
  exit;
}

class ProductExtender extends Module
{
  public function __construct()
  {
    $this->name = "productextender";
    $this->tab = "front_office_features";
    $this->version = "1.0.0";
    $this->author = "Vittorio Aiello";
    $this->need_instance = 0;
    // SUPPORTO VERSIONE
    $this->ps_versions_compliancy = [
      'min' => '1.6',
      'max' => _PS_VERSION_
    ];
    // benefit of prestashop styling elements
    $this->bootstrap = true;

    parent::__construct();
    $this->displayName = $this->l('Product DB field extender');
    $this->description = $this->l("This module allow to final user to extend default product with new custom fields");
    $this->confirmUninstall = $this->l("");
  }

  public function install()
  {
    return parent::install()
      && $this->sqlInstall()
      && $this->installTab();
  }

  public function uninstall()
  {
    return parent::uninstall()
      && $this->sqlUninstall()
      && $this->uninstallTab();
  }

  public function sqlInstall()
  {
    // ALTER PS_PRODUCT TABLE
    $query = "ALTER TABLE `" . _DB_PREFIX_ . "product` ADD COLUMN `id_def` 
      INT(11) DEFAULT 0 AFTER `id_tax_rules_group`;
      
      CREATE TABLE IF NOT EXISTS`" . _DB_PREFIX_ . "_ext_definitions` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `tab_name` varchar(255) UNIQUE DEFAULT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ";

    return Db::getInstance()->execute($query);
  }

  public function sqlUninstall()
  {
    $query = "ALTER TABLE `" . _DB_PREFIX_ . "product` DROP COLUMN `id_def`;
      DROP TABLE `" . _DB_PREFIX_ . "_ext_definitions`;
    ";
    return Db::getInstance()->execute($query);
  }

  private function installTab()
  {
    $tabId = (int) Tab::getIdFromClassName('ProductExtension');
    if (!$tabId) {
      $tabId = null;
    }

    $tab = new Tab($tabId);
    $tab->active = 1;
    $tab->class_name = 'ProductExtension';
    // Only since 1.7.7, you can define a route name
    $tab->route_name = 'extproducts';
    $tab->name = array();
    
    foreach (Language::getLanguages() as $lang) {
      $tab->name[$lang['id_lang']] = $this->trans('Definitions', array(), 'Modules.MyModule.Admin', $lang['locale']);
    }
    $tab->id_parent = (int) Tab::getIdFromClassName('AdminCatalog');
    $tab->module = $this->name;

    return $tab->save();
  }

  public function uninstallTab()
  {
    $idTab = (int) Tab::getIdFromClassName('ProductExtension');

    if ($idTab) {
      $tab = new Tab($idTab);
      try {
        return $tab->delete();
      } catch (Exception $e) {
        echo $e->getMessage();
        return false;
      }
    }
  }

  public function hookActionAdminControllerSetMedia($hookParams)
  {
    // Adds your's JavaScript file from a module's directory
    // Adds your's JavaScript from a module's directory
  }
}
