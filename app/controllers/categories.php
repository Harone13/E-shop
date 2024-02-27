<?php

class Categories extends Controller
{
    public function index()
    {
        $User = $this->load_model('User');
        $Udata = $User->check_login();
        
        if (is_object($Udata)) { 
          $data['user_data'] = $Udata;
         
        } 

        $data['page_title'] = "Categories";
        $this->view("admin/categories", $data); 
    }

  
}