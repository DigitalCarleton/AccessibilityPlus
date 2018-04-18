<?php

class AccessibilityPlusPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        '',''
    );

    protected $_filters = array(
        '',''
    );
    public function install() {
        $this->_installOptions();
    }

    public function uninstall() {
        $this->_uninstallOptions();
    }

    public function hookInstall()
    {
        $db = $this->_db;
        $sql = "";
        $db->query($sql);
    }

    public function hookUninstall($args)
    {
    }

}
