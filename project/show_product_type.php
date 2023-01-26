<?php
$type_id = $_GET['type_id'];
$query_product_type = "SELECT * FROM tbl_product as p
    inner join tbl_type as t
    on p.type_id = t.type_id
    where p.type_id = $type_id
    ORDER BY p.p_id ASC";
$result_pro = mysqli_query($con, $query_product_type) or die("Error in query: $query_type_type " . mysqli_error($con));
?>
<div class="row product-list">
    <?php foreach ($result_pro as $row_pro) { ?>
        <div class="col-md-3">
            <div class="first row">
                <div class="cols">
                    <a href="product_detail.php?id=<?php echo $row_pro['p_id'] ?>">
                        <img src="backend/p_img/<?php echo $row_pro['p_img']; ?>" alt="Product001" style="height: 287px;">
                    </a>
                    <h3 class="plzsomeonekillme"><?php echo $row_pro['p_name']; ?></h3>
                    <br>
                    <a href="product_detail.php?id=<?php echo $row_pro['p_id'] ?>">
                        <button type="submit" class="buyBtn">PRE ORDER
                            <p style="color: #fff; font-size: 18px;"><?php echo $row_pro['p_cost'] ?> ฿</p>
                        </button>
                    </a>
                    <a href="product_detail.php?id=<?php echo $row_pro['p_id'] ?>">
                        <button type="submit" class="ReleaseBtn">Release
                            <?php $phpdate = strtotime($row_pro['release_date']);
                            $row_pro['release_date'] = date('d-m-Y', $phpdate); ?>
                            <p style="color:#fff;"><?php echo $row_pro['release_date'] ?>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("Slides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
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