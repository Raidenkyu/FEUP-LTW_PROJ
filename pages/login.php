<?php
  include_once('../database/dbUsers.php');
  include_once('../includes/session.php');
  $username = $_POST['name'];
  $password = $_POST['pass'];
  if (checkUserPassword($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
    header('Location: ../pages/home.html');
  } else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Login failed!');
    header('Location: ../pages/login.html');
  }
?>


<?php function draw_template($username) { 
/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in in order to draw the logout
 * link.
 */?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>GameIt</title>    
      <meta charset="UTF-8">
      <link rel="shortcut icon" href="../img/favicon.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="../css/style.css" rel="stylesheet">
      <link href="../css/layout.css" rel="stylesheet">
      <!--<link rel="shortcut icon" href="./favicon.ico"/>-->
    </head>
    <body>
      <header>
        <h1><a href="home.html">GameIt</a></h1>
        <div id="signup">
          <div>
          <a href="register.html">Register</a>
          </div>
          <div>
          <a href="login.html">Login</a>
          </div>
        </div>
      </header>
      <nav id="menu">
          <a href="home.html">Home</a>
          <a href="recent.html">Recent Section</a>
          <a href="hot.html">Hot Section</a>
          <a href="contro.html">Controversial Section</a>
      </nav>
      <section id="page_content">
          <form action="login.php" method="post">
              Username: <input type="text" name="name"><br>
              Password: <input type="password" name="pass"><br>
              <input type="submit" value="Sign In">
          </form>      
      </section>
      <footer>
        <p>&copy; GameIt, 2018/2019</p>
      </footer>
    </body>
  </html>
<?php } ?>