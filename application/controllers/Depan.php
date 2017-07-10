<?php

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 09/07/17
 * Time: 17:15
 */
class Depan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('template/base/header');
        $this->load->view('template/depan');
        $this->load->view('template/base/footer');
    }
}