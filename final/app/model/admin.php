<?php

class Admin{
    function login($login_id, $password){
        global $connection;
        $sql = "SELECT * FROM admins WHERE login_id = '$login_id' AND password = md5('$password')";
        $result = $connection->query($sql);
        $admin =mysqli_fetch_array($result);
        return $admin;
    }
}

function get_id($login_id)
{  
    global $connection;
    $sql  = "SELECT * FROM `admins` WHERE login_id = '$login_id'";

    $result = $connection->query($sql);
    return $result->num_rows == 1;
}

function update_token($login_id, $micro)
{
    global $connection;
    $sql = "UPDATE `admins` SET `reset_password_token`='$micro' WHERE login_id = '$login_id'";

    $connection->query($sql);
    return true;
}

function get_token()
{ 
    global $connection;
    $sql = "SELECT * FROM `admins` WHERE reset_password_token <> ''";

    $result = mysqli_query($connection, $sql);
    return $result->fetch_all();
}

function get_name($id)
{  
    global $connection;
    $sql = "SELECT * FROM `admins` WHERE id = '$id'";

    $result = mysqli_query($connection, $sql);
    $row = $result->fetch_assoc();
    return $row['login_id'];
}

function update_password($new_password, $login_id)
{  
    global $connection;
    $sql = "UPDATE `admins` SET `password`= md5('$new_password'), `reset_password_token`='' WHERE login_id = '$login_id'";

    $connection->query($sql);
    return true;
}

?>
