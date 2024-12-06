<!doctype html>
<html lang="en">

<head>
    <title>SIGN-UP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-image: url('../assets/img/home.jpg');">
    <div class="login-wrap">
        <a href="../index.php" class="home">HOME</a>
        <div class="login-html" style="height: 780px;">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign Up</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
            <div class="login-form">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="sign-in-htm">
                    <form action="validate.php" method="post">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input" name="username">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="email" class="input" name="email">
                            <?php
                            if (isset($_GET['error']) && $_GET['error'] == 'email_same') {
                                echo "<script>alert('Email Same');</script>";
                            }
                        ?>
                        </div>
                        <div class="group">
                            <label for="pass1" class="label">Phone no.</label>
                            <input id="pass1" type="number" class="input" name="phone">
                            <?php
                            if (isset($_GET['error']) && $_GET['error'] == 'phone_same') {
                                echo "<script>alert('Phone no. Same');</script>";
                            }
                            ?>
                        </div>
                        <div class="group">
                            <label for="pass2" class="label">Password</label>
                            <input id="pass2" type="password" class="input" data-type="password" name="pass">
                        </div>
                        <div class="group">
                            <label for="pass3" class="label">Repeat Password</label>
                            <input id="pass3" type="password" class="input" data-type="password" name="cpass">
                            <?php
                            if (isset($_GET['error']) && $_GET['error'] == 'pass_not_match') {
                                echo "<script>alert('Password Does not match');</script>";
                            }
                            ?>
                        </div>
                        <div class="group" style="margin-top: 2rem;">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                    </form>
                    <div class="foot-lnk">
                        <a href="index.php" style="margin-top: 2rem; display: inline-block;">
                            Already Member?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>