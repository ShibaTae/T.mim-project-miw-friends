<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>All Product</title>
    <link rel="stylesheet" href="decorate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <?php include('navbar1_profile.php'); ?>
    <?php include('navbar2_profile.php'); ?>
    <!--Content-->
    <div class="row">
        <div class="col-md-2">
            <?php include('menu_profile.php'); ?>
        </div>
        <div class="col-md-10">
            <?php
            $act = (isset($_GET['type_id']) ? $_GET['type_id'] : '');
            $search = (isset($_GET['search']) ? $_GET['search'] : '');
            if ($act != '') {
                include('show_product_profile_type.php');
            }elseif($search!=''){
                include('show_product__profile_search.php');
            }else{
            include('show_product_profile.php'); }
            ?>
            
        </div>
    </div>

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