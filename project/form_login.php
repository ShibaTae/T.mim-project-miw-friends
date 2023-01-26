<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="decorate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div>
        <?php include('navbar1.php'); ?>
        <?php include('navbar2.php'); ?>
    </div>
    <!--login container-->
    <main class="login-container">
        <div class="login-Title">
            Login
        </div>

        <div class="input-field">
            <p style="color: black; font-size: 14px;">Don't have an account?
                <a href="signup.php" class="signUp" style="text-decoration: none;"><span style="color: red;">Sign up here</span></a>
            </p>
            <form name="formlogin" action="check_login.php" method="POST" id="login" class="form-horizontal">
                <input type="text" name="m_user" required placeholder="Username" />
                <input type="password" name="m_pass" required placeholder="Password" />
                <div class="login-button">
                    <button class="login-submit" type="submit">Sign In</button>
                </div>
            </form>
        </div>

        <div class="checkbox1">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
    </main>
    <script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            stickyFunction()
        };

        // Get the navbar
        var navbar = document.getElementById("navbar");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function stickyFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>

</body>

</html>