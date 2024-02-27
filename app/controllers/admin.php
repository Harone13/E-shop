<?php

class Admin extends Controller
{
    public function index()
    {
        $User = $this->load_model('User');
        $Udata = $User->check_login(true, ["admin"]);

        if (is_object($Udata)) { 
          $data['user_data'] = $Udata;
        }
        $data['page_title'] = "admin";
        $this->view("admin/index", $data);
    }

// {
//     public function index()
//     {
//         $User = $this->load_model('User');
//         if (isset($_SESSION['user_url'])){ 
//         $Udata = $User->check_login(true, ['admin']);
//         if (is_object($Udata)) { 
//           $data['user_data'] = $Udata;
         
//         }

//         $data['page_title'] = "Admin";
//         $this->view("admin/index", $data); 
//         }else{
//             $data['page_title'] = "Admin Log";
//             $this->view("login", $data);  
//         }   
//     }

    
    public function products()
    {
        $User = $this->load_model('User');
        $Udata = $User->check_login(true, ['admin']);

        if (is_object($Udata)) { 
          $data['user_data'] = $Udata;
         

        $data['page_title'] = "P";
        $this->view("admin/products", $data); 
    }


    }        

}    
