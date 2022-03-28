<<<<<<< HEAD
<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8" />
	  <title>Login</title>
  </head>

<body>
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
        else
        $query   = "SELECT * FROM users WHERE username=$username";
        $result  = $pdo->query($query);

        if (!$result->rowCount())
            die("User not found");

        $row = $result->fetch();
        $pwTemp  = $row['password'];
        $userID  = $row['id'];

        if (password_verify(str_replace("'", "", $pw_temp), $pw)) {
            session_start();
            $_SESSION['userID'] = $userID;
            header('Location: ./addcar.php');
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
</body>
</html>
=======
<?php 
  
  $dsn = 'mysql:dbname=lomace;host=localhost';
  //DSN: The Data Source Name - it contains the information required to connect to the database.
  //dbname: use your database name on AMPPS/MAMPS or your user-name on Turing
  //host: use localhost on both AMPPS/MAMPS and Turing. 
  $dbUser = 'lomace'; //use root on AMPPS/MAMPS or your user-name on Turing
  $dbPassword = 'lomace';
  //For password, use empty string on AMPPS/MAMPS or your password if you have one. 
  //Default AMPPS/MAMPS password is mysql
  
?>
>>>>>>> 3b8dcddec080e2938ab9ac3abead0ab4ff946a2b
