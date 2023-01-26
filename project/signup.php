<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <!--Sign Up container-->
    <main class="login-container">
        <div class="login-Title">
            Sign Up
        </div>
        <form name="register" action="backend/member_form_add_db.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <div class="input-field">
                    <p style="color: black; font-size: 14px;">Already have an account?
                        <a href="form_login.php" style="text-decoration: none;" class="login-link"><span style="color: red;">Sign In here</span></a>
                    </p>

                    <div class="form-group">
                        <input name="m_user" placeholder="Username" type="text" required id="m_user" />
                    </div>
                    <div class="form-group">
                        <input name="m_pass" placeholder="Password" type="password" required id="m_pass" />
                    </div>
                    <div class="form-group">
                        <input name="m_name" placeholder="ชื่อ-นามสกุล" type="text" required id="m_name" />
                    </div>
                    <div class="form-group">
                        <input name="m_email" placeholder="Email" type="text" required id="m_email" />
                    </div>
                    <div class="form-group">
                        <input name="m_tel" placeholder="Telephone Number" type="text" required id="m_tel" />
                    </div>
                    <div class="form-group">
                        <input name="m_address" placeholder="Address" type="text" required id="m_address" />
                    </div>
                    <div class="login-button">
                        <button class="login-submit" type="submit" id="btn">Sign Up</button>
                        <a href="index.php">
                    </div>
                </div>
        </form>
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