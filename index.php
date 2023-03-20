<!doctype html>
<html>
<head>
    <title>Inloggen</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
         <h2>Inloggen</h2>
         <?php if (isset($_GET['error'])) { ?>
             <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>
         <label>Username</label>
         <input type="text" name="username" placeholder="Username">

         <label>Password</label>
         <input type="text" name="password" placeholder="Password">

         <button type="submit">Login</button>
     </form>

</body>
</html>

