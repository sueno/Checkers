<html>
<head>
<meta charset="utf-8">
<title>グループページ</title>
<link href="../css/group_view.css" rel="stylesheet" type="text/css">

</head>


<body>


<div id="menu">


<ul>
<li><a href="" onclick="document.form1.submit();" >個人ページ</a>
<form name="form1" method="POST" action="../../MainController.php">
<input type=hidden name="mode" value="individual_reports">
</form>
</li>


<li><a href="" onclick="document.form2.submit();">グループページ</a>
<form name="form2" method="POST" action="../../MainController.php">
<input type=hidden name="mode" value="group_reports">
</form>
</li>


<li><a href="" onclick="document.form3.submit();">日報投稿</a>
</li>
<form name="form3" method="POST" action="../../MainController.php">
<input type=hidden name="mode" value="report_edit">
</form>

<li><a href="" >ログイン情報</a>
</li>
</ul>
</div>
<br>

<div>
</div>

</body>

</html>