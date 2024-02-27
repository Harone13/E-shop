<?php

class User
{
    private $error = "";
    public function signup($post){
        $db = database::getInstance();
        $user  = $_POST['name'];
        $email = $_POST['email'];
        $pass1 = sha1($_POST['password1']);
        $pass2 = sha1($_POST['password2']);

        if(empty($email) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $email)){
            $this->error .= "Plese Enter a valid email <br>";
        }
        if(empty($user) || !preg_match("/^[a-zA-Z]+$/", $user)){
            $this->error .= "Plese Enter a valid name <br>";
        }
        if($pass1 !== $pass2){
            $this->error .= "Password do not much";
        }
        if(strlen($pass1) < 4){
            $this->error .= "Password must be longer than 4 chars <br>";
        }
        // check if email existe in database
        $check = false;
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $check = $db->read($sql, [$email]);
        if(is_array($check)){
            $this->error .= "This email is existe <br>";
        } 
        $check = false;
        $sql = "SELECT * FROM users WHERE name = ? LIMIT 1";
        $check = $db->read($sql, [$user]);
        if(is_array($check)){
            $this->error .= "This name is existe <br>";
        } 
        $url = rand();
        $check = false;
        $sql = "SELECT * FROM users WHERE url_adress = ? LIMIT 1";
        $check = $db->read($sql, [$url]);
        while (is_array($check)) { 
          $url = rand();
          $check = false;
          $sql = "SELECT * FROM users WHERE url_adress = ? LIMIT 1";
          $check = $db->read($sql, [$url]);
        } 
        if($this->error == ""){
            //save
            $rank = "customer";
            $date = date("Y-m-d H:i:s");
            $query = "insert into users(url_adress, name, email, password, rank, date) 
                      values( ?, ?, ?, ?, ?, ?)";
            $result = $db->write($query, [$url, $user, $email, $pass1, $rank, $date]);     
            if($result){
                header("location:" . ROOT . "login");
                die;
            }     
        } 
        $_SESSION['error'] = $this->error;

        //! Don't miss the private function whitch gives a random urlAdress

    }
    public function login($post){
        $db = database::getInstance();
        $email = $_POST['email'];
        $pass  = sha1($_POST['pass']);
        if(empty($email) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $email)){
            $this->error .= "Plese Enter a valid email <br>";
        }

        if(strlen($pass) < 4){
            $this->error .= "Password must be longer than 4 chars <br>";
        }

        $sql = "SELECT * FROM users WHERE email = ? && password = ? LIMIT 1";
        $check = $db->read($sql, [$email, $pass]);
        if($this->error == ""){ 
           if(is_array($check)){
                     $_SESSION['user_url'] = $check[0]->url_adress; 
                     header("location:" . ROOT . "home");
                     die;
            }else {
                $this->error.= "This email or password does not existe <br>";
            } 
            
        }    
        $_SESSION['error'] = $this->error;
    }
    public function getUser($post){

    }

public function check_login($redirect = false, $arrcheck = array()){

    if (isset($_SESSION['user_url'])) {
            $arr['urll'] = $_SESSION['user_url'];
            $query = "SELECT * FROM users WHERE url_adress =:urll LIMIT 1";
            $db = database::getInstance();
            $result = $db->read($query, $arr);

        if(is_array($result)) {  
           if (count($arrcheck) > 0) {
            if(in_array($result[0]->rank, $arrcheck)) {
                return $result[0];
            } else {   
                header("location:" . ROOT . "login");
                die;
            }

           } else {   
            return $result[0];
           }
         
         }
    }
    if ($redirect === true){
        header("location:" . ROOT . "login");
        die;
      }   
    return false;

}


    public function logout(){
        if(isset($_SESSION['user_url'])){
            unset($_SESSION['user_url']);
            header("location:" . ROOT . "home");
            die;
        } else {
            echo '----------------';
        }
    }

};