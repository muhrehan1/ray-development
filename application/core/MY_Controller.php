<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller	extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->settings = $this->general->single('settings');
    }
}

class Front_Controller extends MY_Controller {

	function __construct() {
        parent::__construct();
     
        $this->category = $this->general->all_select('category_name,category_slug,category_id','category');
    }
}