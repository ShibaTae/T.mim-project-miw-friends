<?php session_start(); ?>
<?php include('h.php'); ?>

<body>

    <div>
        <?php include('navbar1_profile.php'); ?>
        <?php include('navbar2_profile.php'); ?>
    </div>
    <div class="topNav">
        <a href="account.php" class="aboutUs">Account</a>
        <a href="" class="aboutUs">Order History</a>
    </div>
    <div id="OrderHistory" class="tabcontent">
        <h3>Order History</h3>
        <p>You haven't placed any orders yet.</p>
    </div>

    <div id="Account" class="tabcontent">
        <h3>My Account</h3>
        <p>Name : </p>
        <p>Address : </p>
    </div>

</body>