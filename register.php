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
        throw new PDOException($e->POSTMessage(), (int)$e->POSTCode());
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
            header('Location: ./AddCar.php');
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
                <td><input name="Register" type="submit" value="Register" /></td>
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
