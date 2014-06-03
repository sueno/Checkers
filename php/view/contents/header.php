<?php $session = $_SESSION; ?>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<!--       <a class="navbar-brand" href="#">個人ページ</a> -->
    </div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="MainController.php?mode=individual_reports&user_id=<?php echo $session["user_id"]; ?>">個人ページ</a></li>
				<li><a href="MainController.php?mode=group_reports" >グループページ</a></li>
				<li><a href="MainController.php?mode=report_manage" >日報投稿</a></li>
				
				<li><a href="MainController.php?mode=individual_reports&user_id=<?php echo $session["user_id"]; ?>">設定</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><?php echo $session["user_name"]; ?> さん<br />グループ：<?php echo $session["group_name"]; ?></li>
				<li><a href="MainController.php?mode=logout">ログアウト</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
