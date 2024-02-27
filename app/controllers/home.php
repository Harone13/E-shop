<?php

class Home extends Controller
{
    public function index()
    {
        $User = $this->load_model('User');

        $Udata = $User->check_login();
        if (is_object($Udata)) { 
          $data['user_data'] = $Udata;
        }
        
        $data['page_title'] = "Home";
        $this->view("index",$data);
    }
}