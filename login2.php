<?php
session_start ();
include "koneksikomik1.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
  
h1{
	text-align: center;
	/*ketebalan font*/
	font-weight: 3600;
  color: white;
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
	border: 1000;
	border-radius: 3px;
	padding: 10px 20px;
}


</style>
</head>
</style>
</head>

    

    
    <form action="" method="post">
        <h1>LOGIN</h1>
        <div class="kotak_login">

        <label for="username">Username :</label>
            <input type="text" name="username" placeholder="Username">
        
            <label for="password">Password :</label>
            <input type="password" name="password"  placeholder="Password">
       
            <input type="submit" name="login" value="Login" name="proseslog">
      
    </form>
</body>
</html>
 
<?php
include "koneksikomik1.php";
if(isset($_POST['proseslog'])){
  $sql = mysqli_query($koneksikomik1,"select * from user where username = '$_POST[username]'
  and password = '$_POST[password]'");

  $cek = mysqli_num_rows($sql);
  if($cek > 0) {
      $_SESSION['username'] = $_POST['username'];

      echo "<meta http-equiv=refresh content=0;URL='index.php'>";

  }else{
      echo "<p align=center><b> Username atau Password salah</b></p>";
      echo  "<meta http-equiv=refresh content=1;URL='login2.php'>";
  }
}
