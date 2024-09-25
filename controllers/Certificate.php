<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Certificate extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        if (!has_permission('certificate', '', 'generator' )) {
            access_denied('certificate dashboard');
        }
        $this->load->view('certificate/dashboard');
    }
}
