<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Files extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->_path = "/public/stylesheets/";
        $this->_path1 = "public/javascript/";

    }
    public function index()
    {
        echo "";
    }
    public function js()
    {
        $segs = $this->uri->segment_array();
        foreach ($segs as $segment)
        {
            $filepath = $this->_path1.$segment.'.js';
            if(file_exists($filepath))
            {
                readfile($filepath);
            }
        }
    }
    public function css()
    {
        $segs = $this->uri->segment_array();
        foreach ($segs as $segment)
        {
            $filepath = $this->_path.$segment.'.css';
            if(file_exists($filepath))
            {
                readfile($filepath);
            }
        }

    }
}
