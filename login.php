<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8" />
      <link rel="stylesheet" type="text/css" href="CSS/common.css" />
      <link rel="stylesheet" href="https://unpkg.com/rivet-core@2.0.0-beta.2/css/rivet.min.css">
      <link rel="stylesheet" href="https://assets.uits.iu.edu/css/rivet/1.8.0/rivet.min.css">
	  <title>Login</title>
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
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<body>

<div class="rvt-border-all rvt-border-radius rvt-p-all-md">
<main id="main-content" role="main"></main>
    <div class="rvt-box">
        <div class="rvt-box__header">
            Users Login
          </div>
        <div class="rvt-box__body">
            <p class="text rvt-m-bottom-xl" id="text">For Returning Users: Enter your username and password to login.<br></br>For New Users: Go to <a href="register.php">Register New User</a> to create an account.</p>
           
                    
                    <div class="rvt-container--center" style="max-width: 80%">
                        <div class="rvt-grid">

<?php
$username = "";
$password = "";
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
$username = sanitise($pdo, floatval($_GET["username"]));
$password = sanitise($pdo, floatval($_GET["password"]));

if (empty($username) or empty($password))
    echo "Missing username or password.";
else {
$query   = "SELECT * FROM owners WHERE email='$username'";
$result  = $pdo->query($query);

if (!$result->rowCount())
    die("User not found");

$row = $result->fetch();
$pwTemp  = $row['password'];
$userID  = $row['id'];

if (password_verify(str_replace("'", "", $pw_temp), $pw)) {
    session_start();
    $_SESSION['userID'] = $userID;
    header('Location: ./AddCar.php');
}
}
}
?>
<form action="login.php" method="post">
<h3>Login</h3>
<table>
    <tr>
        <td>Username:</td>
        <td><input type="text" name= "username" id="username" size= 10 /></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input type="text" name= "password" id="password" size= 10 /></td>
    </tr>
    <tr>
        <td><input name="Login" type="submit" value="Login" /></td>
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

<script src="https://assets.uits.iu.edu/javascript/rivet/1.7.2/rivet.min.js"></script>
</body>
</html>
