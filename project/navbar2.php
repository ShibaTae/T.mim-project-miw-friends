<?php include('h.php'); ?>

<div id="navbar" >
  <a href="index.php" class="split">Home</a>
  <a href="product.php" class="Product">Product</a>
  <a href="form_login.php" class="cart">
    <img src="Project_Sala/image/shopping-cart.png" style="width: 20px;">
  </a>
  <div class="search-container">
    <form action="product.php" method="GET">
      <input type="textS" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>