<?php
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    $postdata = file_get_contents("php://input");
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $username = $request->username;
        $password = $request->password;

        if ($username != "") {
            $con = mysqli_connect("localhost","root","root","pro") or die('Unable to connect to database');

            $query = "SELECT * FROM tbl_users WHERE uname = '$username' AND password = '$password'";
            $result = mysqli_query($con, $query);
            $count = mysqli_num_rows($result);
            if ($count > 0)
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
    }
    else {
        die("Unable to connect");
    }
?>