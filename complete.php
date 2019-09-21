<?php
session_start();

$age= htmlentities($_SESSION[age], ENT_QUOTES, "UTF-8");
$name= htmlentities($_SESSION[name], ENT_QUOTES, "UTF-8");
$number= htmlentities($_SESSION[number], ENT_QUOTES, "UTF-8");
$bikou=htmlentities($_SESSION[bikou], ENT_QUOTES, "UTF-8");



//接続設定
$user ="nakabayashi";
$pass="Qq72i8nE";
//データベースに接続
$dsn ="mysql:host=localhost;dbname=nakabayashi_db;charset=utf8";
try {
    $dbh =new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //データ追加
    $sql="INSERT INTO user_id (age, name, number, bikou) VALUES(:age,:name,:number,:bikou)";
    $stmt=$dbh ->prepare($sql);
    //SQLインジェクション
    $stmt->bindValue(':age', $age, PDO::PARAM_INT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':number', $number, PDO::PARAM_INT);
    $stmt->bindValue(':bikou', nl2br($bikou), PDO::PARAM_STR);
    $stmt->execute();
}catch(PDOException $e){
    echo $e -> getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>登録ページ</title>
</head>
<body>

	<p>登録完了</p>

	<form action="index.php" >
       <input type="submit" name="index" value="戻る">

    </form>

</body>
</html>
