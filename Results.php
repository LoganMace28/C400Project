<?php
session_start();
?>
<!DOCTYPE html>

<html>
   <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="CSS/common.css" />
    <link rel="stylesheet" href="https://unpkg.com/rivet-core@2.0.0-beta.2/css/rivet.min.css">
    <title>Home</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script>
    var _data = {};
            var _data = {"2022":{"Chevrolet":"Chevrolet","Dodge":"Dodge","Ford":"Ford","Honda":"Honda","Tesla":"Tesla"},
                        "2021":{"Chevrolet":"Chevrolet","Dodge":"Dodge","Ford":"Ford","Honda":"Honda","Tesla":"Tesla"},
};
    var _model = {};
            var _model = {"Chevrolet":{"Equinox":"Equinox","Cruze":"Cruze"},
                            "Dodge":{"Durango":"Durango", "Dart":"Dart"},
                            "Ford":{"Escape":"Escape","Focus":"Focus"},
                            "Honda":{"CRV":"CRV","Civic":"Civic"},
                            "Tesla":{"Model X":"Model X","Model 3":"Model 3"}};
   </script>

   </head>


   <body>
    <!-- Header and Page Banner -->
    <header class="rvt-header-wrapper">
    
    <div class="rvt-header-global">
        <div class="rvt-container-xl">
            <div class="rvt-header-global__inner">
                <div class="rvt-header-global__logo-slot">
                    <a class="rvt-lockup" href="AddCar.php">

                    <!--Application Title -->
                        <div class="rvt-lockup__body">
                            <span class="rvt-lockup__title">Red Book Value</span>
                            <span class="rvt-lockup__subtitle">Blue Team Inc.</span>
                        </div>
                    </a>
                </div>
                <div class="rvt-header-global__controls" data-rvt-disclosure="menu">

                    <!--Navigation-->
                    <nav aria-label="Main" class="rvt-header-menu" data-rvt-disclosure-target="menu" hidden>
                        <ul class="rvt-header-menu__list">
                        	<li class="rvt-header-menu__item">
                                <a class="rvt-header-menu__link" href="AddCar.php">Home</a>
                            </li>
                            <li class="rvt-header-menu__item">
                                <a class="rvt-header-menu__link" href="#0">History</a>
                            </li>
                            <li class="rvt-header-menu__item">
                                <a class="rvt-header-menu__link" href="register.php">Register New User</a>
                            </li>
                           <li class="rvt-header-menu__item">
                                <a class="rvt-header-menu__link" href="login.php">Log out</a>
                            </li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

      <div class="rvt-hero">
        <div class="rvt-container-lg">
            <div class="rvt-hero__inner">
                <div class="rvt-hero__body [ rvt-flow ]">
                    <h1 class="rvt-hero__title">Welcome to Red Book Value!</h1>
                    <div class="rvt-hero__teaser">
                        <p>Find the true value of your vehicle. Tell us which car you own below!</p>
                    </div>
                
                </div>
                <div class="rvt-hero__image">
                    <img src="Image/carsimage.jpeg" alt="Car Background Image">
                </div>
            </div>
        </div>
    </div>
    <?php
    
    
    
    
    
    ?>
