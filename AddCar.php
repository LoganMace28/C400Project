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
    <!-- Header and Page Banner - Jean -->
    <header class="rvt-header-wrapper">
        <div class="rvt-header-global">
          <div class="rvt-container-xl">
            <div class="rvt-header-global__inner">
              <a class="rvt-lockup" href="AddCar.php">
          
                  <div class="rvt-lockup__body">
                    <span class="rvt-lockup__title">Red Book Value</span>
                    <span class="rvt-lockup__subtitle">Blue Team Inc.</span>
                    
                  </div>
                  
                </a>

              </div>
              <a href="register.php" class="rvt-header-id__log-out">
                Log out
                </a>
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
	if (isset($_POST['Submit'])) {
    $_SESSION["year"] = $_POST['year'];
    $_SESSION["make"] = $_POST['make'];
    $_SESSION["model"] = $_POST['model'];
    header("Location:CarDetails.php");
	}
    ?>
    <form method = "post" action ="AddCar.php">
       <div class = "rvt-container-lg">
       <h2 class = "select-title">Select the Year, Make, and Model of your car</h2>
       <select class = "dropdown form-control" id = "year" name = "year" >
          <option value="">Select</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
       </select>
       <select class = "dropdown form-control" id = "make" name = "make" >
          <option value="">Select</option>
       </select>
       <select class = "dropdown form-control" id = "model" name = "model" onchange="this.form.Submit.disabled=this.options[this.selectedIndex].value==''">
       <option value="">Select</option>
       <input name="Submit" type="Submit" value="Submit" disabled="disabled">
       </select>
       </div>
    </form>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $('#year').on('change', function(e){
        var source = $(this),
            val = $.trim(source.val()),
            target = $('#make');
			$(target).empty();
        if(typeof(_data[val]) != "undefined"){
            var options = (typeof(_data[val]) != "undefined") ? _data[val] : {};
			 $('<option>Select</option>').appendTo(target);
            $.each( options , function(value, index) {
                    $('<option value="' + value + '">' + index + '</option>').appendTo(target);
            });
        }

    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#make').on('change', function(e){
        var source = $(this),
            val = $.trim(source.val()),
            target = $('#model');
			$(target).empty();
        if(typeof(_model[val]) != "undefined"){
            var options = (typeof(_model[val]) != "undefined") ? _model[val] : {};
			 $('<option>Select</option>').appendTo(target);
            $.each( options , function(value, index) {
                    $('<option value="' + value + '">' + index + '</option>').appendTo(target);
            });
        }

    });
  });
</script>

</html>