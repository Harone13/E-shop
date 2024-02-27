<?php

function show($list)
{
    echo '<pre>'; 
    print_r($list);
    echo '</pre>';
}

function check_message(){
    if (isset($_SESSION['error']) && $_SESSION['error'] != ""){
        echo $_SESSION['error'];
        unset ($_SESSION['error']);
    }
}
?>