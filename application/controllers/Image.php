<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Image extends Base_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library( array('session', 'upload', 'image_lib') );
        $this->load->helper(array('url'));
    }
    public function upload()
    {
        $data = $_POST['image'];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time() . '.jpg';
        file_put_contents($_POST['path'] . $imageName, $data);
        echo $imageName;
    }
}