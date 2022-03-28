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
        throw new PDOException($e->POSTMessage(), (int)$e->POSTCode());
        die("Fatal Error - Could not connect to the database" . "</body></html>" );
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = sanitise($pdo, $_POST["username"]);
        $password = sanitise($pdo, $_POST["password"]);

        if (empty($_POST['username']) or empty($_POST['password']))
            echo "Missing username or password.";
        else {
        $query   = "SELECT * FROM owners WHERE email=$username";
        $result  = $pdo->query($query);

        if (!$result->rowCount())
            echo "User not found";
        else {
          $row = $result->fetch();
          $pwTemp  = $row['password'];
          $userID  = $row['id'];

          if (password_verify($password, $pwTemp)) {
              session_start();
              $_SESSION['userID'] = $userID;
              header('Location: ./AddCar.php');
          }
          else {
            echo "Username or Password incorrect";
          }
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
</body>
</html>
