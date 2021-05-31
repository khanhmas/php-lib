<?php
if (!defined('_PS_VERSION_'))
    exit;

class Fooprint extends Module
{
    public function __construct()
    {
        $this->name = 'fooprint';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Alex LU';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('fooprint');
        $this->description = $this->l('My fooprint is fooprint.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        // if (!Configuration::get('MYAPP')) {
        //     $this->warning = $this->l('No name provided');
        // }
    }

    public function install()
    {
        echo 'INSTALLING FOOPRINT...';
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install() ||
            !$this->registerHook('leftColumn') ||
            !$this->registerHook('header') ||
            !Configuration::updateValue('FOOPRINT', 'my friend')
        ) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() ||
            !Configuration::deleteByName('FOOPRINT')
        ) {
            return false;
        }

        return true;
    }

    public function hookHeader()
    {
        return "Hello from my module fooprint <a href='https://google.com' target='_blank'>Google here</a>";
    }
}