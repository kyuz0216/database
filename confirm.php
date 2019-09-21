
<?php

session_start();
//XSS対策
$age= htmlentities($_POST[age], ENT_QUOTES, "UTF-8");
$name= htmlentities($_POST[name], ENT_QUOTES, "UTF-8");
$number= htmlentities($_POST[number], ENT_QUOTES, "UTF-8");
$bikou= htmlentities($_POST[bikou], ENT_QUOTES, "UTF-8");



//セッションに保存
$_SESSION["age"]=$age;
$_SESSION["name"]=$name;
$_SESSION["number"]=$number;
$_SESSION["bikou"]=$bikou;

//定義
$postData = $_POST;
//エラー変数
$error = array();

//バリデーション
	    function formValidation($postData) {
			if(empty($postData['age'])) {
				 $error[] = "年齢を入力してください";
			} else if(!preg_match('/^[0-9]+$/',$postData['age'])) {
				 $error[] = "年齢を正しく入力してください";
			}


			if (empty($postData['name'])) {
				$error[] = "お名前を入力してください";
			} else if (!preg_match('/^[ぁ-んァ-ヶー一-龠 　\r\n\t]+$/', $postData['name'])) {
				 $error[] = "お名前は全角文字で入力してください";
				}

			if(empty($postData['number'])) {
				 $error[] = "学籍番号を入力してください";
			} else if(!preg_match('/^[a-zA-Z0-9]+$/',$postData['number'])) {
				 $error[] = "学籍番号を正しく入力してください";
			}

            if (empty($postData['bikou'])) {
                $error[] = "備考欄を入力してください。何もなければなしと入力してください";
            } elseif(!preg_match('/^[ぁ-んァ-ヶー一-龠 　\r\n\t]+$/',$postData['bikou'])) {
				$error[] = "備考欄を正しく入力してください";
			}

			return $error;
		}
		$error = formValidation($postData);
		if(empty($postData['age']) || empty($postData['name']) ||empty($postData['number']) ||empty($postData['bikou']) || !empty($error)) {
		  $page_flag = 1;
		} else {
		  $page_flag = 0;
		}

?>


<?php if($page_flag == 1): ?>
<ul>
  <?php foreach( $error as $value ): ?>
  <li><?php echo $value; ?>
  </li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>確認画面</title>
	<style>
	h1{
		margin-left:50px;
	}
		th{
			width:200px;
			margin:10px 0;
		}
		input#send{
			margin-left:100px;
			margin-top:30px;
		}
	</style>
</head>


<body>


	<h3>確認画面</h3>
	<form action="complete.php" method="POST">
		<table border="1">
			<tr>
				<th>年齢</th>
				<td><?php echo $_SESSION["age"]; ?>
				</td>
			</tr>
			<tr>
				<th>名前</th>
				<td><?php echo $_SESSION["name"]; ?>
				</td>
			</tr>
			<tr>
				<th>学籍番号</th>
				<td><?php echo $_SESSION["number"]; ?>
				</td>
			</tr>
			<tr>
			 <th>備考欄</th>
			 <td><?php echo ($_SESSION["bikou"]); ?>
				</td>
			</tr>
		</table>

		<?php if ($page_flag==0) :?>
		<input type="submit" name="comp" value="完了">
		<?php endif ; ?>
	</form>

		<input name="back", type="button" value="戻る" onclick="history.back()">


</body>

</html>