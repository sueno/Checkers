
<link href="view/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="view/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" />


<script src="view/js/jquery-1.9.1.min.js"></script>
<script src="view/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
				function sendRequest (url, post) {
					console.log(post);
					$.ajax({
						url		: url,
						async	: false,	
						type	: "POST",
						data	: post,
						dataType: 'html',
						error	: function(XMLHttpRequest){
				            console.log(XMLHttpRequest);
						},
						success	: function(data,status){
							var nextPage = data;
// 							changeContents(nextPage);
// 							var state = $(this).attr("title")
// 							window.history.pushState(state, null, url);
	 						document.write(data);
						}
					});
				}
				//コンテンツの切り替え
				function changeContents(url) {
					$('article').load(url+' section');
				}

			$(function() {
				//戻る・進むボタンを押したとき
				onpopstate = function(event) {
					changeContents(location.pathname);
				}
			});
</script>

<?php $session = $_SESSION; ?>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="MainController.php?mode=individual_reports&user_id=<?php echo $session["user_id"]; ?>">個人ページ</a></li>
				<li class="active"><a href="MainController.php?mode=group_reports&user_id=<?php echo $session["user_id"]; ?>" >グループページ</a></li>
				<li><a href="MainController.php?mode=individual_reports&user_id=<?php echo $session["user_id"]; ?>">設定</a></li>
				<li class="navbar-right"><?php echo $session["user_name"]; ?> さん<br />グループ：<?php echo $session["group_name"]; ?></li>
				<li class="navbar-right"><a href="MainController.php?mode=logout">ログアウト</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
