<?php
session_start();
?>
<!DOCTYPE html>

<html>
   <head>
    <meta charset="utf-8">
    <style type = "text/css">
		 .error {
			color: #ff0000;
			font-weight: bold;
			border: 0px none;
		}
      </style>
    <link rel="stylesheet" type="text/css" href="CSS/common.css" />
    <link rel="stylesheet" href="https://unpkg.com/rivet-core@2.0.0-beta.2/css/rivet.min.css">
    <title>Car Details</title>
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
              <a href="#0" class="rvt-header-id__log-out">
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
                        <p>Tell us a bit more about your vehicle for a final quote!</p>
                    </div>
                
                </div>
            </div>
        </div>
    </div>   
    <?php
   
   require_once 'login.php';
   
   $displayForm = true;
   $inputError = false;
   
     //Connect to MySQL Server: create a new object named $pdo
   try {
     $pdo = new PDO($dsn, $dbUser, $dbPassword);
   }
   catch (PDOException $e){
     die("Could not connect to the database server!" . "</body></html>" );
     //throw new PDOException($e->getMessage(), (int)$e->getCode());
   }
   $year_error="";
   $make_error="";
   $model_error="";
   $mileage = ""; $mileage_error="";
   $condition = ""; $condition_error="";
    //===========================================================================
if (isset($_POST['enter'])) {
  $_SESSION["mileage"] = $_POST['Mileage'];
  $_SESSION["condition"] = $_POST['Condition'];
  require_once 'addop.php';
}
	//===========================================================================
	if ($displayForm) {
	?>

    <form method = "post" action = "CarDetails.php">
       <p>Options</p>
  <div class = "Checkbox">
  <input type="Checkbox" id="heatseat" name="check[]" value="Heated Seats">
  <label for="heatseat">Heated Seats</label><br>
  <input type="Checkbox" id="Remo" name="check[]" value="Remote Start">
  <label for="Remo">Remote Start</label><br>  
  <input type="Checkbox" id="Auto" name="check[]" value="Automatic Headlights">
  <label for="Auto">Automatic HeadLights</label><br>
  <input type="Checkbox" id="Cruse" name="check[]" value="Cruse Control">
  <label for="Cruse">Cruse control</label><br>
  <input type="Checkbox" id="Bluetooth" name="check[]" value="Bluetooth">
  <label for="Bluetooth">Bluetooth</label><br><br>
  </div>
  <p>Mileage&nbsp;<input type="text" id="mileage_error" disabled ="True" class ="error" size = "40" value="<?php echo $mileage_error; ?>"></p>
  <div class = "radio">
  <input type="radio" id="low" name="Mileage" value="1">
  <label for="low">0-10k</label><br>
  <input type="radio" id="Mid" name="Mileage" value="2">
  <label for="Mid">11-40k</label><br>  
  <input type="radio" id="High" name="Mileage" value="3">
  <label for="High">41-70k</label><br>
  <input type="radio" id="Vhigh" name="Mileage" value="4">
  <label for="Vhigh">71-100k</label><br>
  <input type="radio" id="Shigh" name="Mileage" value="5">
  <label for="Shigh">101k and up</label><br><br>
  </div>
  <p>Condition&nbsp;<input type="text" id="condition_error" disabled = "True" class ="error" size = "40" value="<?php echo $condition_error; ?>"></p>
  <div class = "radio">
  <input type="radio" id="Fair" name="Condition" value="1">
  <label for="Fair">Fair</label><br>
  <input type="radio" id="Good" name="Condition" value="2">
  <label for="Good">Good</label><br>  
  <input type="radio" id="VeryG" name="Condition" value="3">
  <label for="VeryG">Very Good</label><br>
  <input type="radio" id="Exce" name="Condition" value="4">
  <label for="Exce">Excellent</label><br>
  <input type="submit" name = "enter" value="Submit">
  </div>
    </form>
    <?php
  }
	?>
</body>
</html>