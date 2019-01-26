<?php

//共通変数・関数ファイルを読込み
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　トップページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();
?>
<?php
$siteTitle = 'PostOnceADay';
require('head.php');
?>
<body>
	<!-- ヘッダー -->
	<?php require('header.php'); ?>

	<!-- メインコンテンツ -->
	<main>
		<section class="site-wrap">
			<p id="js-show-msg" style="display: none;" class="msg-slide">
				<?php echo getSessionFlash('msg_success'); ?>
			</p>
			<!-- 投稿一覧 -->
			<?php require('postList.php'); ?>
		</section>
	</main>

<!-- フッター -->
<?php require('footer.php'); ?>