<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>telafica SMS Gateway - Log In</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/normalize.css">

</head>

<body class="login">
    <div class="container">
        <div class="twelve columns center logo">
            <img src="images/logo.png" />
        </div>
        <div class="twelve columns center white login-title">
            <h1><strong>SMS Gateway</strong> Login</h1>
        </div>
    </div>
    <div class="container">
        <div class="six columns offset-by-three">
            <div class="login-wrapper center">
                <div class="twelve columns login-form">
                        <form name="login" id="loginForm" action="dashboard.php" method="post">
                            <div class="spacer">&nbsp;</div>
                            <div class="twelve columns">
                                <input type="text" placeholder="E-Mail Address" autocomplete="off" class="emailInput u-full-width" name="email" />
                            </div>
                            <div class="twelve columns"><div class="spacer">&nbsp;</div></div>
                            <div class="twelve columns">
                                <input type="password" placeholder="Password" autocomplete="off" class="passwordInput u-full-width" name="password" />
                            </div>
                            <div class="twelve columns"><div class="spacer">&nbsp;</div></div>
                            <div class="four columns margin5 center" >
                                <input type="button" name="register" class="button-primaryloginRegister center greenBG white u-full-width " value="Register" />
                            </div>
                            <div class="three columns margin5 center">
                                <input type="submit" name="submit" class="button-primary loginSubmit blueBG white u-full-width" value="Login" />
                            </div>
                            <div class="four columns forgotLinks">
                                <span class="u-full-width"><a href="#" class="forgotUsername">Forgot your Username?</a></span>
                                <span class="u-full-width"><a href="#" class="forgotUsername">Forgot your Password?</a></span>
                            </div>
                        </form>
                </div>
            <div class="twelve columns"><div class="spacer"></div></div>
            <div class="twelve columns left">
                <span class="Linkarrow"><img src="images/right133.png" alt="" /></span><a href="../">Go to Home Page</a></div>
            </div>
        </div>
    </div>
    <script src="js/jquery-2.1.4.js"></script>

</body>
</html>
