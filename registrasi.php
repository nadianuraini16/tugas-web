<?php

require 'functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST) >0){
        echo"<script>

            alert('user baru berhasil di tambahkan');
            document.location.href = 'login.php'
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
  
h1{
	text-align: center;
	/*ketebalan font*/
	font-weight: 3600;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.form_login{
	/*membuat lebar form penuh*/
	box-sizing : border-box;
	width: 100%;
	padding: 10px;
	font-size: 11pt;
	margin-bottom: 20px;
}


body{
	font-family: sans-serif;
	background: #008080;
}

.kotak_login{
	width: 350px;
	background: white;
	/*meletakkan form ke tengah*/
	margin: 80px auto;
	padding: 30px 20px;
}

.container {
  padding: 100px 350px;
}

.tombol_login{
	background: #bae1ff;
	color: black;
	font-size: 11pt;
	width: 100%;
	border: none;
	border-radius: 3px;
	padding: 10px 20px;
}


</style>
</head>
</style>
</head>
<div class="kotak_login">
</head>
<body>



    <form  action="" method="POST">
    <h1>Registrasi</h1>
    
        <div class="user">
                <label for="username">Username :</label>
                <input type="text"class="form_login" name="username" id="username" placeholder="Masukan Username">
        </div>    
        <div class="password">
                <label for="password">Password :</label>
                <input type="password" class="form_login" name="password" id="password" placeholder="Masukan Password">
          </div>
          <div class="password1">
                <label for="password2">Konfirmasi Password :</label>
                <input type="password"class="form_login"name="password2" id="password2" placeholder="Konfirmasi Password">
          </div>
          <div class="submit">
                <input type="submit" name="register"class="tombol_login" value="Daftar">
          </div>

 
    </form>
</div>

</body>
</html>