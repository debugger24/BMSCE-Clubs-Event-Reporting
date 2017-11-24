<?php
    session_start();
    require_once __DIR__ . '/db_config.php';

    function login($username, $password) {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());

        $ip = $_SERVER['SERVER_ADDR'];

        $username = strtolower(trim($username));

        $username = mysqli_real_escape_string($con,$username);
        $password = mysqli_real_escape_string($con,$password);

        // $hashFormat = "$2y$10$";
        // $salt = "qW45WE96sd89eE84df2e3w";
        // $hash_and_salt = $hashFormat . $salt;
        // $password = crypt($password, $hash_and_salt);

        $myquery = "SELECT userID, Email, DisplayName, Type FROM `user` WHERE (`Email`='$username' AND `Password` ='$password')";
        $result = mysqli_query($con, $myquery);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['type'] = 'admin';
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['emailID'] = $row['Email'];
            $_SESSION['displayname'] = $row['DisplayName'];
            $_SESSION['userType'] = $row['Type'];

            $result = array();
            $result['status'] = "true";
            $result['displayname'] = $row['DisplayName'];
            return $result;
        }
        $result = array();
        $result['status'] = "false";
        return $result;
    }

    if (isset($_POST['email']) && isset($_POST['password'])) {
        echo json_encode(login($_POST['email'], $_POST['password']));
    }
    else {
        $result['status'] = "false";
        echo json_encode($result);
    }
?>
