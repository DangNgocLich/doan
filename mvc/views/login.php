
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

	<style>
	html,
	body {
	  height: 100%;
	}

	body {
	  display: -ms-flexbox;
	  display: -webkit-box;
	  display: flex;
	  -ms-flex-align: center;
	  -ms-flex-pack: center;
	  -webkit-box-align: center;
	  align-items: center;
	  -webkit-box-pack: center;
	  justify-content: center;
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #f5f5f5;
	}

	.form-signin {
	  width: 100%;
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.form-signin .checkbox {
	  font-weight: 400;
	}
	.form-signin .form-control {
	  position: relative;
	  box-sizing: border-box;
	  height: auto;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	</style>
  </head>

  <body class="text-center">
    <form action="" method="POST" class="form-signin">
      <img class="mb-4" src="./public/img/logo.jpg" alt="" width="275" height="275">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      
	  <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
      
	  <label for="inputPassword" class="sr-only">Password</label>
      
	  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <!-- <label>Don't have an account ? <a href="signup.php"> Sign up</a></label> -->
      <?php
      	require_once("DB.php");
		if (isset($_POST["username"]) && isset($_POST["password"])) {
			$username = $_POST["username"];
			$password = $_POST["password"];

			$sql = "SELECT * FROM nhanvien Where CMND ='$username'and MATKHAU='$password'";

			$result = $conn->query($sql);
			if ($result->num_rows > 0){
				$_SESSION["username"] = $username;
				$row = $result->fetch_assoc();
				$_SESSION["quyen"]=$row["CHUCVU"];
				$_SESSION["manv"]=$row["CMND"];
				header("Location: ./index.php");

			} else {

				echo '<script language="javascript">';
				echo 'alert("Login failed")';
				echo '</script>';

			}
		}
		?>
	 
    </form>
	
  </body>
</html>
