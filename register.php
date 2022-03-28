<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8" />
	  <title>Register</title>
  </head>

<body>
    <?php
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
        $username = sanitise($pdo, floatval($_GET["username"]));
        $password = sanitise($pdo, floatval($_GET["password"]));
        $firstname = sanitise($pdo, floatval($_GET["firstname"]));
        $lastname = sanitise($pdo, floatval($_GET["lastname"]));
        $pwdConf = sanitise($pdo, floatval($_GET["passwordConf"]));

        if (empty($username) or empty($password) or empty($pwdConf) or empty($firstname) or empty($lastname))
            echo "Must fill all fields.";
        else {
          $query   = "SELECT * FROM users WHERE username=$username";
          $result  = $pdo->query($query);

          if ($result->rowCount())
              echo ("User already exists");
          else if ($password != $pwdConf){
            echo ("Passwords do not match");
          }
          else {
            $query = "INSERT INTO users (email, password, firstname, lastname)";
            $query .= "VALUES ('$username', ". password_hash($password, PASSWORD_DEFAULT);
            $query .= ", '$firstname', '$lastname')";
            if (!($result  = $pdo->query($query))) {
              die("There was an error </body></html>");
            }
            session_start();
            $_SESSION['userID'] = $userID;
            header('Location: ./addcar.php');
          }
        }
    }
    ?>
    <form action="register.php" method="post">
        <h3>Register</h3>
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name= "firstname" id="firstname" size= 10 /></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name= "lastname" id="lastname" size= 10 /></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name= "username" id="username" size= 10 /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name= "password" id="password" size= 10 /></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="text" name= "passwordConf" id="passwordConf" size= 10 /></td>
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
