<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <link rel="stylesheet" type="text/css" href="CSS/common.css" />
      <link rel="stylesheet" href="https://unpkg.com/rivet-core@2.0.0-beta.2/css/rivet.min.css">
	    <title>Register</title>
  </head>
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

            </div>
        </div>
    </div>
</header>

<body>

<div class="rvt-border-all rvt-border-radius rvt-p-all-xl">
<main id="main-content" role="main"></main>
    <div class="rvt-box">
    <div class="rvt-box__body">
       
        <h1>New User Registration</h1>
          
        <div class="rvt-box__body">
            <p class="text rvt-m-bottom-xl" id="text">Welcome! Please complete the form to register as a user.</p>
           
                    
                    <div class="rvt-container--center" style="max-width: 80%">
                        <div class="rvt-grid">
                   
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $username = "";
    $password = "";
    $firstname = "";
    $lastname = "";
    $pwdConf = "";
    require_once 'auth.php';

    //Connect to MySQL Server: create a new object named $pdo
    try {
        $pdo = new PDO($dsn, $dbUser, $dbPassword);
    }
    catch (PDOException $e){
        throw new PDOException($e->getMessage(), (int)$e->getCode());
        die("Fatal Error - Could not connect to the database" . "</body></html>" );
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = sanitise($pdo, $_POST["username"]);
        $password = sanitise($pdo, $_POST["password"]);
        $firstname = sanitise($pdo, $_POST["firstname"]);
        $lastname = sanitise($pdo, $_POST["lastname"]);
        $pwdConf = sanitise($pdo, $_POST["passwordConf"]);

        if (empty($_POST['username']) or empty($_POST['password']) or empty($_POST['passwordConf']) or empty($_POST['firstname']) or empty($_POST['lastname']))
            echo "Must fill all fields.";
        else if ($_POST['password'] != $_POST['passwordConf'])
          echo ("Passwords do not match");
        else {
          $query   = "SELECT * FROM owners WHERE email=$username";
          $result  = $pdo->query($query);
          if ($result->rowCount())
            echo ("User already exists");
          else {
            $pwtemp = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO owners (firstname, lastname, email, password) VALUES ($firstname, $lastname, $username, '$pwtemp')";
            if (!($result  = $pdo->query($query))) {
              die("There was an error </body></html>");
            }
            $query   = "SELECT id FROM owners WHERE email=$username";
            if (!($result  = $pdo->query($query))) {
              die("There was an error </body></html>");
            }
            $row = $result->fetch();
            $userID  = $row['id'];
            session_start();
            $_SESSION['userID'] = $userID;
            header('Location:AddCar.php');
          }
        }
    }
    ?>
    <form action="register.php" method="post">
        <h3>Register</h3>
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name= "firstname" id="firstname" size= 20 /></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name= "lastname" id="lastname" size= 20 /></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name= "username" id="username" size= 20 /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name= "password" id="password" size= 20 /></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name= "passwordConf" id="passwordConf" size= 20 /></td>
            </tr>
            <tr>
                <td><input name="Register" type="submit" value="Register" /></td>
            </tr>
            <tr>
              <td><a href="login.php">Already have an account?</a></td>
            </tr>
    <?php
    function sanitise($pdo, $str)
    {
      $str = htmlentities($str);
      return $pdo->quote($str);
    }
    ?>
    
    
    </div>
                       
                       </div>
               
              
           </div>
       </div>
   </div>
   </div>
   
   <script src="https://assets.uits.iu.edu/javascript/rivet/1.7.2/rivet.min.js"></script>
   </body>
   </html>