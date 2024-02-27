<?php

class Profile extends Controller
{
    public function index()
    {
        $User = $this->load_model('User');
        $Udata = $User->check_login(true);

        if (is_object($Udata)) { 
          $data['user_data'] = $Udata;
        }
        $data['page_title'] = "User Profile";
        $this->view("profile", $data);
    }
}