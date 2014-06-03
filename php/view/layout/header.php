
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
		<!-- Brand and toggle get grouped for better mobile display 
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="MainController.php?mode=individual_reports&user_id=<?php echo $session["user_id"]; ?>">個人ページ</a>
		</div>
		-->

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="MainController.php?mode=group_reports&user_id=<?php echo $session["user_id"]; ?>" >グループページ</a></li>
				<li><a href="MainController.php?mode=individual_reports&user_id=<?php echo $session["user_id"]; ?>">設定</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
