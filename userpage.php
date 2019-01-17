<?php

//共通変数・関数ファイルを読込み
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　ユーザーページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

// ログイン認証
require('auth.php');
/*-------------------------------
	画面処理
-------------------------------*/
$u_id = $_GET['u_id'];
$dbPostData = '';
$dbPostGoodNum = '';
// ------------------------------
// get送信がある場合
if(!empty($_GET['u_id']) && !empty(getUser($u_id))){
	$dbPostData = getUserPostList($u_id);
	$dbPostGoodNum = count(getUserGoodPostList($u_id));
}else{
	header("Location:index.php");
}
?>
<?php
$siteTitle = (!empty($_SESSION['user_id'])) ? 'マイページ' : 'ユーザーページ';
require('head.php');
?>

<body>
	<!-- ヘッダー -->
	<?php require('header.php'); ?>

	<!-- メインコンテンツ -->
	<main>
		<div class="post-info">
			<span style="padding-left: 22%; margin-right: 24px;">
				<a class="mr-24" href="userpage.php?u_id=<?php echo sanitize($u_id); ?>">投稿：<?php echo count($dbPostData); ?></a>
				<a href="userpage.php?u_id=<?php echo sanitize($u_id).'&good=exist'; ?>">いいね：<?php echo $dbPostGoodNum; ?></a>
				<span class="setting"><i class="fas fa-cog fa-lg"></i></span>
		</div>

		<div class="mypage-wrap">
			<!-- サイドバー -->
			<?php require('sidebar.php'); ?>

			<section class="my-contents">
				<?php 
					if(empty($_GET['menu'])){
						//投稿一覧
						require('postList.php');
					}elseif($_GET['menu'] === 'profEdit'){
						//プロフィール編集
						require('profEdit.php');
					}elseif($_GET['menu'] === 'passEdit'){
						//パスワード変更フォーム
						require('passEdit.php');
					}elseif($_GET['menu'] === 'withdraw'){
						//退会ポップアップ
						require('withdraw.php');
					}else{
						debug('maimomo');
						header("Location:userpage.php?u_id=".$_SESSION['user_id']); //マイページへ
					}
				?>
			</section>
		</div>
	</main>

	<!-- フッター -->
	<?php require('footer.php'); ?>