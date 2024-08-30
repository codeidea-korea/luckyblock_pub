<?php include_once('lib/common.lib.php'); ?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="utf-8">
	<title>luckyblock</title>
	<meta http-equiv="imagetoolbar" content="no">
	<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<link href="https://design01.codeidea.io/link_style.css" rel="stylesheet">
	<link rel="stylesheet" href="./dist/css/swiper-bundle.min.css" />
	<link rel="stylesheet" href="./dist/css/app.css" />
	<link rel="stylesheet" href="./dist/css/layout.css" />
	<link rel="stylesheet" href="./dist/css/custom.css" />
	<style>
		.ex_table th{
			border-bottom-width:1px;	
			border-right-width:1px;
		}
		.ex_table th:last-child{
			border-right-width:0px;
		}
		header {display:none; }
		.quick_menu {display:none; }
		#wrap .side_menu {display:none; }
	</style>
</head>
</body>

<div class="publishing-help">
	<span class="label not">작업중</span>
	<span class="label popup">팝업</span>
	<span class="label change">수정</span>
	<span class="label add">최근 추가</span>
</div>

<?php
function txtRecord($dir)
{
	if (is_dir($dir)) {
		$handle  = opendir($dir);
		$files = array();
		while (false !== ($filename = readdir($handle))) {
			if ($filename == "." || $filename == "..") continue;
			if (is_file($dir . "/" . $filename)) {
				$files[] = $filename;
			}
		}
		closedir($handle);
		rsort($files);
		if (count($files) > 0) {
			echo '<div class="_record rsort">';
			echo '<ul>';
			foreach ($files as $f) {
				$name = '수정 ' . preg_replace("/[^0-9]*/s", "", $f);
				echo '<li><a href="' . $dir . $f . '" target="_black">' . $name . '</a></li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	}
}
echo txtRecord('./@record/');
?>

<div id="publishingContainer">

	<ul class="page-link">
		<li class="" data-label="메인">
            <ul>
                <li><a href="./index.html" target="_blank" class="">메인 - 로그인 후</a></li>
                <li><a href="./index_logout.html" target="_blank" class="">메인 - 로그인 전</a></li>
                <li><a href="./index_ko.html" target="_blank" class="">메인 - 한국어 번역</a></li>
            </ul>
        </li>

		<li class="mt20" data-label="공통모달">
            <ul>
                <li>
					<button class="pop-modal" onclick="modalOpen('sign-modal'); tabChange('#sign-1-tab button')">Sign up 모달</button>
					<button class="pop-modal" onclick="modalOpen('sign-modal'); tabChange('#sign-2-tab button')">Login 모달</button>
					<button class="pop-modal" onclick="modalOpen('reset_password-modal')">Reset Password 모달</button>
				</li>
				<li>
					<button class="pop-modal" onclick="modalOpen('coin-modal')">COIN 모달</button>
					<button class="pop-modal" onclick="modalOpen('wallet-modal')">Wallet 모달</button>
				</li>
            </ul>
        </li>

		<li class="mt20" data-label="Casino">
            <ul>
                <li>
					<a href="./casino_index.html" target="_blank" class="">Casino - lobby</a>
					<ul>
						<li><a href="./casino_detail.html" target="_blank" class="">Casino - detail</a></li>
						<li><button class="pop-modal" onclick="modalOpen('casino_search-modal')">Casino search (mobile) 모달</button></li>
					</ul>
				</li>
                <li><a href="./casino_slots.html" target="_blank" class="">Casino - slots</a></li>
                <li><a href="./casino_live.html" target="_blank" class="">Casino - Live casino</a></li>
                <li><a href="./casino_game.html" target="_blank" class="">Casino - Game shows</a></li>
                <li><a href="./casino_all.html" target="_blank" class="">Casino - All games</a></li>
            </ul>
        </li>

		<li class="mt20" data-label="Slots">
            <ul>
                <li><a href="./slots_index.html" target="_blank" class="">Slots - Discover</a></li>
                <li><a href="./slots_new.html" target="_blank" class="">Slots - New Games</a></li>
                <li><a href="./slots_crypto.html" target="_blank" class="">Slots - Crypto Games</a></li>
            </ul>
        </li>


		<li class="mt20" data-label="Live Casino">
			<ul>
                <li><a href="./live_index.html" target="_blank" class="">Live Casino</a></li>
                <li><a href="./live_blackjack.html" target="_blank" class="">Live Casino - Blackjack</a></li>
                <li><a href="./live_roulette.html" target="_blank" class="">Live Casino - Roulette</a></li>
                <li><a href="./live_show.html" target="_blank" class="">Live Casino - Game Shows</a></li>
                <li><a href="./live_baccarat.html" target="_blank" class="">Live Casino - Baccarat</a></li>
                <li><a href="./live_poker.html" target="_blank" class="">Live Casino - Poker</a></li>
            </ul>
		</li>

		<li class="mt20" data-label="Sports">
		</li>

		<li class="mt20" data-label="Menu">
            <ul>
				<li><a href="./vipClub.html" target="_blank" class="">VIP club</a></li>
				<li><a href="./vfbStuttgart.html" target="_blank" class="">VfB Stuttgart</a></li>
				<li><a href="./promotions.html" target="_blank" class="">Promotions</a>
					<ul>
						<li><a href="./promotions_detail.html" target="_blank" class="">Promotions - detail</a></li>
					</ul>
				</li>
				<li><a href="./loyalty.html" target="_blank" class="">Loyalty</a></li>	
				<li><a href="./telegram_casino.html" target="_blank" class="">Telegram Casino</a></li>	
				<li><a href="./buy_crypto.html" target="_blank" class="">Buy Crypto</a></li>	
				<li><a href="./play_with_lblock.html" target="_blank" class="">Play with $LBLOCK</a></li>
				<li><a href="./help.html" target="_blank" class="">help</a></li>	
            </ul>
        </li>

		<li class="mt20" data-label="Profile">
			<ul>
				<li><a href="./settings.html" target="_blank" class="">Settings</a></li>
				<li><a href="./activity.html" target="_blank" class="">Activity</a></li>
			</ul>
		</li>


	</ul>
</div>

<!-- 모달 -->
<div id="wrap"></div>



<script src='https://design01.codeidea.io/link_script.js'></script>
<script src="./dist/js/app.js"></script>
<script src="./dist/js/jquery-1.12.4.js"></script>
<script src="./dist/js/jquery-ui.js"></script>
<script src="./dist/js/swiper-bundle.min.js"></script>
<script src="./dist/js/custom.js"></script>


</body>

</html>