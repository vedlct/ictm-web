<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menum');

    }

    public function index()
    {
        $this->data['topmenu'] = $this->Menum->getTopMenu();
        $this->load->view('home', $this->data);
    }
}
