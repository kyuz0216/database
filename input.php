<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>登録フォーム</title>
</head>

<body>



	<h3>入力</h3>

	<form action="confirm.php" method="POST">

	    <table border="1">
			<tr>
				<th>年齢</th>
				<td><input type="text" name="age"  size="48" ></td>
			</tr>
			<tr>
				<th>名前</th>
				<td><input type="text" name="name" size="48" ></td>
			</tr>
			<tr>
				<th>学籍番号</th>
				<td><input type="text" name="number" size="48" ></td>
			</tr>
			<tr>
			 <th>備考欄</th>
			 <td><textarea placeholder="備考事項を記入してください。なければ「なし」と入力ください" name="bikou" cols="30" rows="4"></textarea></td>
			</tr>
			<tr>
			<td colspan="2" align="center">
			<input type="submit" id="send" name="btn_confirm" value="入力内容の確認">
			</td>
			</tr>

		</table>
	</form>
</body>

</html>