<?php
include('backend/condb.php');
$query_product = "SELECT * FROM tbl_product as p
inner join tbl_type as t
on p.type_id = t.type_id
ORDER BY p.p_id ASC";
$result_pro = mysqli_query($con, $query_product) or die("Error in query: $query_type " . mysqli_error($con));
//echo ($query_product);
//exit()
$temp = 0;
?>
<!DOCTYPE html>
<html>
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="decorate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<!--Slideshow-->
<div class="Slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext">1 / 5</div>
        <img src="Project_Sala/image/header4.png" style="width:100%">
        <div class="text-slideshow"></div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">2 / 5</div>
        <img src="Project_Sala/image/header1.png" style="width:100%">
        <div class="text-slideshow">Product002</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">3 / 5</div>
        <img src="Project_Sala/image/header2.png" style="width:100%">
        <div class="text-slideshow">Product003</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">4 / 5</div>
        <img src="Project_Sala/image/header3.png" style="width:100%">
        <div class="text-slideshow">Product004</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">5 / 5</div>
        <img src="Project_Sala/image/header5.jpg" style="width:100%">
        <div class="text-slideshow">Product005</div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
</div>

<!--New text-->
<div class="New-product">
    <h3>
        Early Bird Specials
    </h3>
    <div class="to-product">
        <a href="product.php">see all product</a>
    </div>
    <div class="line-new">
        <hr width="100%" color="green" />
    </div>
</div>

<!--New product list-->
<div class="New-productList product-list">
    <?php foreach ($result_pro as $row_pro) if ($temp++ < 3) { ?>
        <div class="col-md-3">
            <div class="first row1">
                <div class="cols">
                    <a href="product_detail.php?id=<?php echo $row_pro['p_id'] ?>">
                        <img src="backend/p_img/<?php echo $row_pro['p_img']; ?>" alt="Product001" style="height: 287px;">
                    </a>
                    <h3 class="plzsomeonekillme"><?php echo $row_pro['p_name']; ?></h3>
                    <br>

                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
        myFunction()
    };

    // Get the navbar
    var navbar = document.getElementById("navbar");

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>


</body>

</html>