<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */
defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Certificate
Description: Certificate module for COBRA ERP.
Version: 1.0
Requires at least: 2.3.*
*/

define('CERTIFICATE_MODULE_NAME', 'certificate');
register_language_files('CERTIFICATE_MODULE_NAME', ['certificate']);
hooks()->add_action('admin_init', 'certificate_module_init_menu_items');
hooks()->add_action('admin_init', 'certificate_permissions');
function certificate_module_init_menu_items()
{
    $CI = &get_instance();
    if (has_permission('certificate', '', 'global')) {
        $CI->app_menu->add_sidebar_menu_item('certificate_menu', [
            'name' => 'Certificate',
            'position' => 5,
            'icon' => 'fa-solid fa-certificate',
        ]);
    }
    if (has_permission('certificate', '', 'generator')) {
        $CI->app_menu->add_sidebar_children_item('certificate_menu', [
            'slug' => 'certificate-dashboard',
            'name' => _l('Generator'),
            'href' => admin_url('certificate/dashboard'),
            'position' => 1,
        ]);
    }
    
    
}

function certificate_permissions()
{
    $capabilities = [];

    $capabilities['capabilities'] = [
        'global' => _l('Global(view)'),
        'generator' => _l('Generator'),
    ];
    register_staff_capabilities('certificate', $capabilities, _l('Certificate'));
}