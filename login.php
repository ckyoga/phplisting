<?php
// Need the utilities file:
require('includes/utilities.inc.php');

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check against the database:
    $q = 'SELECT id, userType, username, email, pass, dateAdded FROM users WHERE username=:username AND pass=SHA1(:pass)';
    $stmt = $pdo->prepare($q);
    $r = $stmt->execute(array(':username' => $_POST['username'], ':pass' => $_POST['password']));

    // Try to fetch the results:
    if ($r) {
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
    }

    // Store the user in the session and redirect:
    if ($user) {

        // Store in a session:
        $_SESSION['user'] = $user;

        // Redirect:
        header("Location:add-display.php");
        exit;
    } else {
        $username_err = "Username or Password incorrect.  Please try again.";
    }

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

        </form>
    </div>    
</body>
</html>