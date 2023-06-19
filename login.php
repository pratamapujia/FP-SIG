<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db-sig")
?>

<!doctype html>
<html lang="en-US">

<head>

  <meta charset="utf-8">

  <title>Login</title>

  <link rel="stylesheet" href="login.css">

  <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>

  <div id="login">

    <h2><span class="fontawesome-lock"></span>Sign In</h2>

    <form role="form" method="POST">

      <fieldset>

        <p><label for="email">E-mail address</label></p>
        <p><input type="email" id="email" name="email" value="mail@address.com" onBlur="if(this.value=='')this.value='mail@address.com'" onFocus="if(this.value=='mail@address.com')this.value=''"></p>
        <!-- JS because of IE support; better: placeholder="mail@address.com" -->

        <p><label for="password">Password</label></p>
        <p><input type="password" id="password" name="pass" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p>
        <!-- JS because of IE support; better: placeholder="password" -->

        <p><input type="submit" name="login" value="Sign In"></p>

      </fieldset>

    </form>

    <?php
    if (isset($_POST['login'])) {
      $ambil = $koneksi->query("SELECT * FROM login WHERE email='$_POST[email]' AND password='$_POST[pass]'");
      $yangcocok = $ambil->num_rows;
      if ($yangcocok == 1) {
        $_SESSION['pengguna'] = $ambil->fetch_assoc();
        echo "<div class='alert alert-info'><center>Login Sukses</center></div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
      } else {
        echo "<div class='alert alert-danger'><center>Login Gagal</center></div>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
      }
    }
    ?>

  </div> <!-- end login -->



</body>

</html>