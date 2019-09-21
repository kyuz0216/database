<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>レコードの表示</title>
</head>

<body>
<h3>一覧</h3>

<?php
 //接続設定
 $user ="nakabayashi";
 $pass="Qq72i8nE";
 //データベースに接続
 $dsn ="mysql:host=localhost;dbname=nakabayashi_db;charset=utf8";
 try {
    $dbh =new PDO($dsn, $user, $pass);
 }catch(PDOException $e){
	echo 'データベースにアクセスできません'. $e -> getMessage();
    exit();
 }

 $sql= "select * from user_id order by name ASC";
 $stmt = $dbh->query($sql);
 foreach ($stmt as $row) {
     echo $row['age'].$row['name'].$row['number'].nl2br($row['bikou']);
     echo '<br>';
 }

?>


<form action="input.php" >

 <input type="submit" name="input" value="登録する">

</form>


</body>

</html>