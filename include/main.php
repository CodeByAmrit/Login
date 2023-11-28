<?php session_start(); ?>

<div class="rigthTop">
    <input type="text" id="search" placeholder="Search" />
    <img src="img/bell.svg" alt="notification" class="prevent-select message" />
</div>
<div class="welcome">
    <!-- php for later -->
    <div class="text1">
        <p>
            Welcome back, <?php echo strtoupper($_SESSION['FirstName']); ?>
        </p>
        <p>Always stay updated in your student portal</p>
    </div>

    <img src="img/clipart.png" alt="clipart" class="prevent-select" />
</div>
