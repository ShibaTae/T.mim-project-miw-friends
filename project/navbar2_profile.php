<?php include('h.php'); ?>

<div id="navbar">
  <a href="index_pro.php" class="split">Home</a>
  <a href="product_profile.php" class="Product">Product</a>
  <a href="cart_profile.php" class="cart">
    <img src="Project_Sala/image/shopping-cart.png" style="width: 20px;">
  </a>
  <div class="search-container">
    <form action="product_profile.php" method="GET">
      <input type="textS" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
