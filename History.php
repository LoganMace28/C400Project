<?php
session_start();
?>
<!DOCTYPE html>

<html>
   <head>
   <style>
table.GeneratedTable {
  width: 100%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #000000;
  border-style: solid;
  color: #000000;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 2px;
  border-color: #000000;
  border-style: solid;
  padding: 3px;
}

table.GeneratedTable thead {
  background-color: #e32400;
}
</style>

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
              <a href="login.php"class="rvt-header-id__log-out">Log out</a><?php session_unset(); session_destroy(); ?>

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
                        <p>Your history:</p>
                    </div>
                
                </div>
                <div class="rvt-hero__image">
                    <img src="Image/carsimage.jpeg" alt="Car Background Image">
                </div>
            </div>
        </div>
    </div>
    <body>

<!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->
<table class="GeneratedTable">
  <thead>
    <tr>
      <th>Year</th>
      <th>Make</th>
      <th>Model</th>
      <th>Base Price</th>
      <th>Private Owner</th>
      <th>Suggested Retail</th>
      <th>Certified Pre</th>
    </tr>
  </thead>
  <tbody>
  <?php
       
       require_once 'auth.php';
       
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
      $userid = $_SESSION['userID'];
       $query = "SELECT cars.Year, cars.Make, cars.Model, car_owners.BasePrice, car_owners.PrivatePrice, car_owners.dealer, car_owners.cpo FROM cars, owners, car_owners WHERE car_owners.OWID = \"$userid\" and cars.id = car_owners.CID";
      //  $stmt = $pdo->prepare($query);
      // //$stmt->bindValue(':owid', $_SESSION['userID']);
      //  $stmt->execute();
       
       foreach ($pdo->query($query) as $row)
       {
           print "<tr><td>" . $row['Year'] . "</td>";
           print "<td>" . $row['Make'] . "</td>";
           print "<td>" . $row['Model'] . "</td>";
           print "<td>" . $row['BasePrice'] . "</td>";
           print "<td>" . $row['PrivatePrice'] . "</td>";
           print "<td>" . $row['dealer'] . "</td>";
           print "<td>" . $row['cpo'] . "</td></tr>";
       }
           ?>
  </tbody>
</table>
</body>




