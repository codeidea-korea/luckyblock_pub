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


		<li class="mt20" data-label="프로필 모달">
			<ul>
				<li>
					<button class="pop-modal" onclick="profileModalToggle()">프로필 모달</button>
				</li>
				<li>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-1-tab button')">프로필 모달 - overview</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-2-tab button')">프로필 모달 - Missions</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-3-tab button')">프로필 모달 - Game of the Week</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-4-tab button'); profileTourList();">프로필 모달 - Tournament</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-4-tab button'); profileTourDetail();">프로필 모달 - Tournament - detail</button>
				</li>
				<li>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-5-tab button')">프로필 모달 - Levels</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-6-tab button'); profileSpinList();">프로필 모달 - Spin The Wheel</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-6-tab button'); profileSpinDetail();">프로필 모달 - Spin The Wheel - detail</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-7-tab button')">프로필 모달 - Match X</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-8-tab button')">프로필 모달 - Bonuses</button>
					<button class="pop-modal" onclick="profileModalToggle(); tabChange('#profile-9-tab button')">프로필 모달 - Inbox</button>
				</li>
				<li>
					<button class="pop-modal" onclick="modalOpen('level-modal')">Level 모달</button>
					<button class="pop-modal" onclick="modalOpen('level_active-modal')">Level-active 모달</button>
					<button class="pop-modal" onclick="modalOpen('mission-modal')">mission 모달</button>
					<button class="pop-modal" onclick="modalOpen('mission_lock-modal')">mission-lock 모달</button>
				</li>
			</ul>
		</li>


		<li class="mt20" data-label="Sports">
			<ul>
				<li data-label="home">
					<ul>
						<li><a href="./sports.html" target="_blank" class="">sports - highlights</a></li>
						<li><a href="./sports_schedule.html" target="_blank" class="">sports - schedule</a></li>
						<li><a href="./sports_bets_feed.html" target="_blank" class="">sports - bets feed</a></li>
					</ul>
				</li>
				<li><a href="./sports_live.html" target="_blank" class="">live</a></li>
				<li><a href="./sports_favorites.html" target="_blank" class="">Favorites</a></li>
				<li><a href="./sports_bet.html" target="_blank" class="">My bet</a></li>
				<li><a href="./sports_rapid.html" target="_blank" class="">Rapid betting</a></li>
				<li><a href="./sports_soccer.html" target="_blank" class="">sports - soccer</a></li>
				<li><a href="./sports_detail.html" target="_blank" class="">sports - detail</a></li>
				<li><a href="./sports_search.html" target="_blank" class="">search</a></li>
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
				<li><a href="./account_info.html" target="_blank" class="">Account Info</a></li>
				<li><a href="./balances.html" target="_blank" class="">Balances</a></li>
				<li><a href="./bonuses.html" target="_blank" class="">Bonuses</a></li>
			</ul>
		</li>


	</ul>
</div>

<!-- 모달 -->
<div id="wrap"></div>

<!-- 프로필 모달 -->
<div class="profile_modal">
    <div class="profile_cont">
        <div class="close_btn" onclick="profileModalToggle()"><span></span></div>
        <div class="mo_left_menu_bg" onclick="profileMenuToggle()"></div>
        <div class="left_menu">
            <div class="profile mt-5 mb-3 text-center">
                <i class="overflow-hidden block w-20 h-20 mx-auto rounded-full"><img src="./dist/images/profile/profile.webp" alt=""></i>
                <p class="my-2 text-lg">NICKNAME</p>
                <span class="inline-flex items-center px-3 py-1 text-xs text-black bg-white rounded-xl font-bold">Rookie</span>
            </div>
            <div class="pl-2 pb-3">
                <ul class="nav nav-tabs vertical-tabs" role="tablist">
                    <li id="profile-1-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm active" data-tw-toggle="pill" data-tw-target="#profile-tab-1" type="button" role="tab" aria-controls="profile-tab-1" aria-selected="true" onclick="moMenuClick()">
                            <img src="./dist/images/profile/home.png" class="w-10 md:w-7" alt="">
                            Overview
                        </button> 
                    </li>
                    <li id="profile-2-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm" data-tw-toggle="pill" data-tw-target="#profile-tab-2" type="button" role="tab" aria-controls="profile-tab-2" aria-selected="false" onclick="moMenuClick()">
                            <img src="./dist/images/profile/missions.png" class="w-10 md:w-7" alt="">
                            Missions
                        </button> 
                    </li>
                    <li id="profile-3-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm" data-tw-toggle="pill" data-tw-target="#profile-tab-3" type="button" role="tab" aria-controls="profile-tab-3" aria-selected="false" onclick="moMenuClick()">
                            <img src="./dist/images/profile/game.png" class="w-10 md:w-7" alt="">
                            Game of the Week
                        </button> 
                    </li>
                    <li id="profile-4-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm" data-tw-toggle="pill" data-tw-target="#profile-tab-4" type="button" role="tab" aria-controls="profile-tab-4" aria-selected="false" onclick="moMenuClick()">
                            <img src="./dist/images/profile/tournaments.png" class="w-10 md:w-7" alt="">
                            Tournaments
                        </button> 
                    </li>
                    <li id="profile-5-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm" data-tw-toggle="pill" data-tw-target="#profile-tab-5" type="button" role="tab" aria-controls="profile-tab-5" aria-selected="false" onclick="moMenuClick()">
                            <img src="./dist/images/profile/levels.png" class="w-10 md:w-7" alt="">
                            Levels
                        </button> 
                    </li>
                    <li id="profile-6-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm" data-tw-toggle="pill" data-tw-target="#profile-tab-6" type="button" role="tab" aria-controls="profile-tab-6" aria-selected="false" onclick="moMenuClick()">
                            <img src="./dist/images/profile/saw.png" class="w-10 md:w-7" alt="">
                            Spin The Wheel
                        </button> 
                    </li>
                    <li id="profile-7-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm" data-tw-toggle="pill" data-tw-target="#profile-tab-7" type="button" role="tab" aria-controls="profile-tab-7" aria-selected="false" onclick="moMenuClick()">
                            <img src="./dist/images/profile/matchx.png" class="w-10 md:w-7" alt="">
                            Match X
                        </button> 
                    </li>
                    <li id="profile-8-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm" data-tw-toggle="pill" data-tw-target="#profile-tab-8" type="button" role="tab" aria-controls="profile-tab-8" aria-selected="false" onclick="moMenuClick()">
                            <img src="./dist/images/profile/bonus.png" class="w-10 md:w-7" alt="">
                            Bonuses
                        </button> 
                    </li>
                    <li id="profile-9-tab" class="nav-item flex-1" role="presentation"> 
                        <button class="nav-link !flex items-center gap-2 w-full py-1.5 md:py-2 text-left text-lg md:text-sm" data-tw-toggle="pill" data-tw-target="#profile-tab-9" type="button" role="tab" aria-controls="profile-tab-9" aria-selected="false" onclick="moMenuClick()">
                            <img src="./dist/images/profile/activity.png" class="w-10 md:w-7" alt="">
                            Inbox
                        </button> 
                    </li>
                </ul>
            </div>
        </div>
        <div class="right_cont">
            <div class="top_box flex items-center justify-between px-5 md:px-10 leading-tight">
                <div class="hidden md:flex items-center gap-5">
                    <div class="flex items-center gap-2">
                        <img src="./dist/images/profile/tournaments.png" class="w-9" alt="">
                        <div>
                            <b class="block text-2xl leading-none">0</b>
                            <p class="font-medium">Levels points</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="./dist/images/profile/missions.png" class="w-14" alt="">
                        <div>
                            <b class="block text-2xl leading-none">0</b>
                            <p class="font-medium">Missions</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="./dist/images/profile/levels.png" class="w-11" alt="">
                        <div>
                            <b class="block text-2xl leading-none">1st</b>
                            <p class="font-medium">Level</p>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex items-center gap-1">
                    <img src="./dist/images/profile/Level_1.png" class="w-12" alt="">
                    <div>
                        <b>Next level is Joker</b>
                        <div class="progress_bar my-1"><i style="width:50%"></i></div>
                        <b>900 points to get there</b>
                    </div>
                </div>
                <button class="block md:hidden" onclick="profileMenuToggle()"><img src="./dist/images/profile/menu.png" alt=""></button>
                <div class="block md:hidden close cursor-pointer" onclick="profileModalToggle()"><span></span></div>
            </div>
            <div class="tab-content">
                <!-- overview -->
                <div id="profile-tab-1" class="tab-pane leading-relaxed p-4 active" role="tabpanel" aria-labelledby="profile-1-tab">

                    <div class="md:hidden block pb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-12">
                                <img src="./dist/images/profile/profile.webp" alt="">
                                <span class="inline-flex items-center px-2 py-1 mt-2 fs10 text-black bg-white rounded-xl">Rookie</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-end gap-2">
                                    <div class="flex items-center">
                                        <img src="./dist/images/profile/tournaments.png" class="z-10 relative w-10 -mr-5" alt="">
                                        <p class="flex items-center justify-center w-20 h-6 bg-white rounded-lg text-black font-bold">0</p>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="./dist/images/profile/missions.png" class="z-10 relative w-14 -mr-8" alt="">
                                        <p class="flex items-center justify-center w-20 h-6 bg-white rounded-lg text-black font-bold">0</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <b>1st Level</b>
                                    <p>Next level is <b>Joker</b></p>
                                </div>
                                <div class="progress_bar !w-full my-1"><i style="width:20%"></i></div>
                                <div class="text-right"><b>900</b> points to get there</div>
                            </div>
                        </div>
                        <div class="flex-wrap flex gap-3 mt-3">
                            <div class="w-24 py-2 text-center bg-back3 rounded">
                                <img src="./dist/images/profile/levels.png" class="w-14 mx-auto" alt="">
                                <p>Levels</p>
                            </div>
                            <div class="w-24 py-2 text-center bg-back3 rounded">
                                <img src="./dist/images/profile/matchx.png" class="w-14 mx-auto" alt="">
                                <p>Match X</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-xl font-medium">Latest missions</div>
                    <div class="noscrollbar overflow-x-auto md:overflow-x-visible flex md:grid grid-cols-5 gap-4 py-2 mt-1 mb-3">
                        <button class="relative flex flex-col justify-between hover-shadow shrink-0 w-[180px] md:w-full h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                            <i class="absolute left-2 top-2"><img src="./dist/images/profile/fire.png" class="w-7" alt=""></i>
                            <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                            <span class="inline-flex px-2 mx-auto fs10 bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                            <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto" alt=""></div>
                            <p class="w-full truncate-2 text-xs">
                                <b>Reward:</b><br/>
                                Get 20 Free Spins on "Yeti Quest"
                            </p>
                        </button>
                        <button class="flex flex-col justify-between hover-shadow shrink-0 w-[180px] md:w-full h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                            <div class="w-full truncate-2 font-bold fs15 leading-tight">🎯 Sports Daily </div>
                            <span class="inline-flex px-2 mx-auto fs10 bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                            <div class="w-full"><img src="./dist/images/profile/sports_daily.jpg" class="w-20 mx-auto" alt=""></div>
                            <p class="w-full truncate-2 text-xs">
                                <b>Reward:</b><br/>
                                A EUR 1 Free Bet | All Sports
                            </p>
                        </button>
                        <button class="flex flex-col justify-between hover-shadow shrink-0 w-[180px] md:w-full h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                            <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 2</div>
                            <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                            <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                            <p class="truncate-2 text-xs">
                                <b>Reward:</b><br/>
                                Get 60 Free Spins on "Yeti Quest"
                            </p>
                        </button>
                        <button class="flex flex-col justify-between hover-shadow shrink-0 w-[180px] md:w-full h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                            <div class="w-full truncate-2 font-bold fs15 leading-tight">Daily Streak</div>
                            <div class="w-full"><img src="./dist/images/profile/streak_1.png" class="w-20 mx-auto" alt=""></div>
                            <p class="w-full truncate-2 text-xs">
                                <b>Reward:</b><br/>
                                1 Spin of the Wheel
                            </p>
                        </button>
                        <button class="flex flex-col justify-between hover-shadow shrink-0 w-[180px] md:w-full h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                            <div class="w-full truncate-2 font-bold fs15 leading-tight">Super Streak</div>
                            <div class="w-full"><img src="./dist/images/profile/streak_2.png" class="w-20 mx-auto" alt=""></div>
                            <p class="w-full truncate-2 text-xs">
                                <b>Reward:</b><br/>
                                3 Spins of the Wheel
                            </p>
                        </button>
                    </div>
                    <div class="md:block hidden">
                        <div class="text-xl font-medium">Featured tournament</div>
                        <div class="grid grid-cols-3 gap-10 mt-3">
                            <div class="mySwiper" data-effect="fade" data-timer="5">
                                <div class="swiper-container">
                                    <ul class="swiper-wrapper">
                                        <li class="swiper-slide rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="modalOpen('mission-modal')">
                                            <div class="relative">
                                                <img class="h-[120px]" src="./dist/images/profile/banner_1.jpg" alt="">
                                                <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#6b8dce] text-xs rounded-lg">GATHERING</span>
                                            </div>
                                            <div class="pt-2 px-5 pb-4">
                                                <span class="fs11 leading-none">STARTING IN 7 DAYS</span>
                                                <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                                <div class="flex items-center justify-center gap-4 mt-3 text-xs text-center">
                                                    <div>
                                                        <b class="block mb-1">Buy In</b>
                                                        <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                    </div>
                                                    <div>
                                                        <b class="block mb-1">Registered</b>
                                                        <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                    </div>
                                                    <div>
                                                        <b class="block mb-1">Prize</b>
                                                        <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                    </div>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <button class="btn btn-pending py-1 text-lg font-bold">Join Tournament</button>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="swiper-slide rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="modalOpen('mission-modal')">
                                            <div class="relative">
                                                <img class="h-[120px]" src="./dist/images/profile/banner_2.jpg" alt="">
                                                <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#26a65b] text-xs rounded-lg">STARTED</span>
                                            </div>
                                            <div class="pt-2 px-5 pb-4">
                                                <span class="fs11 leading-none">STARTING IN 18 DAYS</span>
                                                <p class="truncate text-lg font-bold leading-none">€100,000 Prize Pool This Football Season! ⚽</p>
                                                <div class="flex items-center justify-center gap-4 mt-3 text-xs text-center">
                                                    <div>
                                                        <b class="block mb-1">Buy In</b>
                                                        <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                    </div>
                                                    <div>
                                                        <b class="block mb-1">Registered</b>
                                                        <span class="px-1.5 py-0.5 font-bold bg-provider rounded">8 / 1000</span>
                                                    </div>
                                                    <div>
                                                        <b class="block mb-1">Prize</b>
                                                        <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                    </div>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <button class="btn btn-pending py-1 text-lg font-bold">Join Tournament</button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <button class="flex flex-col justify-between hover-shadow h-72 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                <div class="w-full truncate-2 font-bold text-xl leading-tight">Level Up</div>
                                <div class="w-full"><img src="./dist/images/profile/Level_2.png" class="w-24 mx-auto" alt=""></div>
                                <div class="w-full truncate-2">Play your Favourite Games and Reach 900 Points to Unlock the Next Level Wheel</div>
                                <p class="w-full truncate-2 text-xs">
                                    <b>Reward:</b><br/>
                                    1 Spin of the Wheel
                                </p>
                            </button>
                            <button class="flex flex-col justify-between hover-shadow h-72 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                <div class="w-full truncate-2 font-bold text-xl leading-tight">🎯 Sports Daily </div>
                                <span class="inline-flex px-2 mx-auto bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36</span>
                                <div class="w-full"><img src="./dist/images/profile/sports_daily.jpg" class="w-24 mx-auto" alt=""></div>
                                <div class="w-full">Bet EUR 50 on any sport</div>
                                <p class="w-full truncate-2 text-xs">
                                    <b>Reward:</b><br/>
                                    A EUR 1 Free Bet | All Sports
                                </p>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-hidden md:hidden block">
                        <div class="mySwiper" data-per="1.5" data-gap="20" data-loop="false">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper">
                                    <li class="swiper-slide rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="modalOpen('mission-modal')">
                                        <div class="relative">
                                            <img class="h-[120px]" src="./dist/images/profile/banner_1.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#6b8dce] text-xs rounded-lg">GATHERING</span>
                                        </div>
                                        <div class="pt-2 px-5 pb-4 text-center">
                                            <p class="text-lg font-bold">Sunday's Lucky Live Casino</p>
                                            <span class="fs11">STARTING IN 7 DAYS</span>
                                        </div>
                                    </li>
                                    <li class="swiper-slide rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="modalOpen('mission-modal')">
                                        <div class="relative">
                                            <img class="h-[120px]" src="./dist/images/profile/banner_2.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#26a65b] text-xs rounded-lg">STARTED</span>
                                        </div>
                                        <div class="pt-2 px-5 pb-4 text-center">
                                            <p class="text-lg font-bold">€100,000 Prize Pool This Football Season! ⚽</p>
                                            <span class="fs11">STARTING IN 18 DAYS</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- missions -->
                <div id="profile-tab-2" class="tab-pane leading-relaxed p-2 md:p-4" role="tabpanel" aria-labelledby="profile-2-tab">
                    <ul class="noscrollbar overflow-x-auto nav nav-link-tabs full_type whitespace-nowrap" role="tablist">
                        <li id="mission-1-tab" class="nav-item" role="presentation">
                            <button class="nav-link py-2 active" data-tw-toggle="pill" data-tw-target="#mission-tab-1" type="button" role="tab" aria-controls="mission-tab-1" aria-selected="true"> Overview (7) </button> 
                        </li>
                        <li id="mission-2-tab" class="nav-item" role="presentation">
                            <button class="nav-link py-2" data-tw-toggle="pill" data-tw-target="#mission-tab-2" type="button" role="tab" aria-controls="mission-tab-2" aria-selected="false"> Available (6) </button> 
                        </li>
                        <li id="mission-3-tab" class="nav-item" role="presentation">
                            <button class="nav-link py-2" data-tw-toggle="pill" data-tw-target="#mission-tab-3" type="button" role="tab" aria-controls="mission-tab-3" aria-selected="false"> Locked (9) </button> 
                        </li>
                        <li id="mission-4-tab" class="nav-item" role="presentation">
                            <button class="nav-link py-2" data-tw-toggle="pill" data-tw-target="#mission-tab-4" type="button" role="tab" aria-controls="mission-tab-4" aria-selected="false"> Completed </button> 
                        </li>
                    </ul>
                    <div class="tab-content mt-5 p-2">
                        <div id="mission-tab-1" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="mission-1-tab">
                            <div class="hidden md:grid grid-cols-5 gap-x-4 gap-y-5">
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                    <i class="absolute left-2 top-2"><img src="./dist/images/profile/fire.png" class="w-7" alt=""></i>
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎯 Sports Daily </div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                                    <div class="w-full"><img src="./dist/images/profile/sports_daily.jpg" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        A EUR 1 Free Bet | All Sports
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 2</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 60 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 h-48 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-end gap-3">
                                        <img src="./dist/images/profile/streak_1.png" class="w-20" alt="">
                                        <div class="text-left">
                                            <h6 class="text-xl font-semibold">Daily Streak</h6>
                                            <p class="mt-4 font-semibold">Wager 20 EUR on your Favourite Slots</p>
                                            <div class="progress_bar mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full mt-2">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            1 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 h-48 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-end gap-3">
                                        <img src="./dist/images/profile/streak_2.png" class="w-20" alt="">
                                        <div class="text-left">
                                            <h6 class="text-xl font-semibold">Daily Streak</h6>
                                            <p class="mt-4 font-semibold">Wager 80 EUR on your Favourite Slots</p>
                                            <div class="progress_bar mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full mt-2">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            3 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">Mega Streak</div>
                                    <div class="w-full"><img src="./dist/images/profile/streak_2_full.png" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        7 Spins of the Wheel
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">Level Up</div>
                                    <div class="w-full"><img src="./dist/images/profile/Level_2.png" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        1 Spin of the Wheel
                                    </p>
                                </button>
                            </div>
                            <div class="grid md:hidden grid-cols-1 gap-y-3">
                                <button class="relative flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <i class="absolute left-2 top-2"><img src="./dist/images/profile/fire.png" class="w-7" alt=""></i>
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/game.png" class="w-24" alt="">
                                        <div class="flex-1 text-left">
                                            <div class="text-right">
                                                <span class="inline-flex px-2 py-0.5 mx-auto text-xs bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                                            </div>
                                            <h6 class="text-xl font-semibold">🎰 Game of the Week - Mission 1</h6>
                                            <p class="mt-2 font-semibold">Wager 20 EUR on your Favourite Slots</p>
                                            <div class="progress_bar !w-full mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            1 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/sports_daily.jpg" class="w-24" alt="">
                                        <div class="flex-1 text-left">
                                            <div class="text-right">
                                                <span class="inline-flex px-2 py-0.5 mx-auto text-xs bg-[#1498af] font-medium rounded-lg">AVAILABLE IN: 27:14:59:14</span>
                                            </div>
                                            <h6 class="text-xl font-semibold">🎯 Sports Daily</h6>
                                            <p class="mt-2 font-semibold">Bet EUR 50 on any sport</p>
                                            <div class="progress_bar !w-full mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            A EUR 1 Free Bet | All Sports
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/game.png" class="w-24 darkImg" alt="">
                                        <div class="flex-1 text-left">
                                            <div class="text-right">
                                                <span class="inline-flex px-2 py-0.5 mx-auto text-xs bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                            </div>
                                            <h6 class="text-xl font-semibold">🎰 Game of the Week - Mission 2</h6>
                                            <p class="mt-2 font-semibold">Wager 2,000 EUR on "Sugar Rush 1000"</p>
                                            <div class="progress_bar !w-full mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            A EUR 1 Free Bet | All Sports
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/streak_1.png" class="w-20" alt="">
                                        <div class="text-left">
                                            <h6 class="text-xl font-semibold">Daily Streak</h6>
                                            <p class="mt-2 font-semibold">Wager 20 EUR on your Favourite Slots</p>
                                            <div class="progress_bar mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full mt-2">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            1 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/streak_2.png" class="w-20" alt="">
                                        <div class="text-left">
                                            <h6 class="text-xl font-semibold">Daily Streak</h6>
                                            <p class="mt-2 font-semibold">Wager 80 EUR on your Favourite Slots</p>
                                            <div class="progress_bar mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full mt-2">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            3 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div id="mission-tab-2" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="mission-2-tab">
                            <div class="hidden md:grid grid-cols-5 gap-x-4 gap-y-5">
                                <button class="flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎯 Sports Daily </div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                                    <div class="w-full"><img src="./dist/images/profile/sports_daily.jpg" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        A EUR 1 Free Bet | All Sports
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">Daily Streak</div>
                                    <div class="w-full"><img src="./dist/images/profile/streak_1.png" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        1 Spin of the Wheel
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">Super Streak</div>
                                    <div class="w-full"><img src="./dist/images/profile/streak_2.png" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        3 Spins of the Wheel
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 h-48 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission-modal')">
                                    <div class="flex items-end gap-3">
                                        <img src="./dist/images/profile/streak_2_full.png" class="w-20" alt="">
                                        <div class="text-left">
                                            <h6 class="text-xl font-semibold">Daily Streak</h6>
                                            <p class="mt-4 font-semibold">Wager 20 EUR on your Favourite Slots</p>
                                            <div class="progress_bar mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full mt-2">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            1 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 h-48 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission-modal')">
                                    <div class="flex items-end gap-3">
                                        <img src="./dist/images/profile/Level_2.png" class="w-20" alt="">
                                        <div class="text-left">
                                            <h6 class="text-xl font-semibold">Daily Streak</h6>
                                            <p class="mt-4 font-semibold">Wager 80 EUR on your Favourite Slots</p>
                                            <div class="progress_bar mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full mt-2">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            3 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                    <i class="absolute left-2 top-2"><img src="./dist/images/profile/fire.png" class="w-7" alt=""></i>
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                            </div>
                            <div class="grid md:hidden grid-cols-1 gap-y-3">
                                <button class="relative flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/sports_daily.jpg" class="w-24" alt="">
                                        <div class="flex-1 text-left">
                                            <div class="text-right">
                                                <span class="inline-flex px-2 py-0.5 mx-auto text-xs bg-[#1498af] font-medium rounded-lg">AVAILABLE IN: 27:14:59:14</span>
                                            </div>
                                            <h6 class="text-xl font-semibold">🎯 Sports Daily</h6>
                                            <p class="mt-2 font-semibold">Bet EUR 50 on any sport</p>
                                            <div class="progress_bar !w-full mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            A EUR 1 Free Bet | All Sports
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <i class="absolute left-2 top-2"><img src="./dist/images/profile/fire.png" class="w-7" alt=""></i>
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/game.png" class="w-24" alt="">
                                        <div class="flex-1 text-left">
                                            <div class="text-right">
                                                <span class="inline-flex px-2 py-0.5 mx-auto text-xs bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                                            </div>
                                            <h6 class="text-xl font-semibold">🎰 Game of the Week - Mission 1</h6>
                                            <p class="mt-2 font-semibold">Wager 20 EUR on your Favourite Slots</p>
                                            <div class="progress_bar !w-full mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            1 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/streak_1.png" class="w-20" alt="">
                                        <div class="text-left">
                                            <h6 class="text-xl font-semibold">Daily Streak</h6>
                                            <p class="mt-2 font-semibold">Wager 20 EUR on your Favourite Slots</p>
                                            <div class="progress_bar mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full mt-2">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            1 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/streak_2.png" class="w-20" alt="">
                                        <div class="text-left">
                                            <h6 class="text-xl font-semibold">Daily Streak</h6>
                                            <p class="mt-2 font-semibold">Wager 80 EUR on your Favourite Slots</p>
                                            <div class="progress_bar mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full mt-2">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            3 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div id="mission-tab-3" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="mission-3-tab">
                            <div class="hidden md:grid grid-cols-5 gap-x-4 gap-y-5">
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 h-48 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="relative flex items-end gap-3">
                                        <span class="absolute right-0 -top-1 inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                        <img src="./dist/images/profile/game.png" class="w-20 darkImg" alt="">
                                        <div class="text-left">
                                            <h6 class="mt-2 text-lg font-semibold">🎰 Game of the Week - Mission 1</h6>
                                            <p class="mt-1 font-semibold">Wager 1,000 EUR on "Dawn of Kings"</p>
                                            <div class="progress_bar mt-2"><i style="width:0%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between gap-2 w-full mt-0">
                                        <p class="text-left font-medium truncate">
                                            <b class="text-xs">Reward:</b><br/>
                                            Get 150 Free Spins on "Dawn of Kings"
                                        </p>
                                        <span class="shrink-0 whitespace-nowrap text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 h-48 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="relative flex items-end gap-3">
                                        <span class="absolute right-0 -top-1 inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                        <img src="./dist/images/profile/game.png" class="w-20 darkImg" alt="">
                                        <div class="text-left">
                                            <h6 class="mt-2 text-lg font-semibold">🎰 Game of the Week - Mission 1</h6>
                                            <p class="mt-1 font-semibold">Wager 1,000 EUR on "Dawn of Kings"</p>
                                            <div class="progress_bar mt-2"><i style="width:0%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between gap-2 w-full mt-0">
                                        <p class="text-left font-medium truncate">
                                            <b class="text-xs">Reward:</b><br/>
                                            Get 150 Free Spins on "Dawn of Kings"
                                        </p>
                                        <span class="shrink-0 whitespace-nowrap text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                            </div>
                            <div class="grid md:hidden grid-cols-1 gap-y-3">
                                <button class="relative flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/game.png" class="w-24 darkImg" alt="">
                                        <div class="flex-1 text-left">
                                            <div class="text-right">
                                                <span class="inline-flex px-2 py-0.5 mx-auto text-xs bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                            </div>
                                            <h6 class="text-xl font-semibold">🎰 Game of the Week - Mission 2</h6>
                                            <p class="mt-2 font-semibold">Wager 2,000 EUR on "Sugar Rush 1000"</p>
                                            <div class="progress_bar !w-full mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            A EUR 1 Free Bet | All Sports
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div id="mission-tab-4" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="mission-4-tab">
                            <div class="py-20">
                                <img src="./dist/images/profile/empty_2.png" class="w-28 mx-auto emptydance" alt="">
                                <div class="mt-3 text-center text-lg font-semibold">You haven't completed any missions yet. Try something  <a href="javascript:;" class="underline">something simple</a> first.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- game of the week -->
                <div id="profile-tab-3" class="tab-pane leading-relaxed p-2 md:p-4" role="tabpanel" aria-labelledby="profile-3-tab">
                    <ul class="noscrollbar overflow-x-auto nav nav-link-tabs full_type whitespace-nowrap" role="tablist">
                        <li id="gameweek-1-tab" class="nav-item" role="presentation">
                            <button class="nav-link py-2 active" data-tw-toggle="pill" data-tw-target="#gameweek-tab-1" type="button" role="tab" aria-controls="gameweek-tab-1" aria-selected="true"> Available (1) </button> 
                        </li>
                        <li id="gameweek-2-tab" class="nav-item" role="presentation">
                            <button class="nav-link py-2" data-tw-toggle="pill" data-tw-target="#gameweek-tab-2" type="button" role="tab" aria-controls="gameweek-tab-2" aria-selected="false"> Locked (6) </button> 
                        </li>
                        <li id="gameweek-3-tab" class="nav-item" role="presentation">
                            <button class="nav-link py-2" data-tw-toggle="pill" data-tw-target="#gameweek-tab-3" type="button" role="tab" aria-controls="gameweek-tab-3" aria-selected="false"> Completed </button> 
                        </li>
                    </ul>
                    <div class="tab-content mt-5 p-2">
                        <div id="gameweek-tab-1" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="gameweek-1-tab">
                            <div class="hidden md:grid grid-cols-5 gap-x-4 gap-y-5">
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission-modal')">
                                    <i class="absolute left-2 top-2"><img src="./dist/images/profile/fire.png" class="w-7" alt=""></i>
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                            </div>
                            <div class="grid md:hidden grid-cols-1 gap-y-3">
                                <button class="relative flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <i class="absolute left-2 top-2"><img src="./dist/images/profile/fire.png" class="w-7" alt=""></i>
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/game.png" class="w-24" alt="">
                                        <div class="flex-1 text-left">
                                            <div class="text-right">
                                                <span class="inline-flex px-2 py-0.5 mx-auto text-xs bg-[#1498af] font-medium rounded-lg">LEFT 03:07:36:11</span>
                                            </div>
                                            <h6 class="text-xl font-semibold">🎰 Game of the Week - Mission 1</h6>
                                            <p class="mt-2 font-semibold">Wager 20 EUR on your Favourite Slots</p>
                                            <div class="progress_bar !w-full mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            1 Spin of the Wheel
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div id="gameweek-tab-2" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="gameweek-2-tab">
                            <div class="hidden md:grid grid-cols-5 gap-x-4 gap-y-5">
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 h-48 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="relative flex items-end gap-3">
                                        <span class="absolute right-0 -top-1 inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                        <img src="./dist/images/profile/game.png" class="w-20 darkImg" alt="">
                                        <div class="text-left">
                                            <h6 class="mt-2 text-lg font-semibold">🎰 Game of the Week - Mission 1</h6>
                                            <p class="mt-1 font-semibold">Wager 1,000 EUR on "Dawn of Kings"</p>
                                            <div class="progress_bar mt-2"><i style="width:0%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between gap-2 w-full mt-0">
                                        <p class="text-left font-medium truncate">
                                            <b class="text-xs">Reward:</b><br/>
                                            Get 150 Free Spins on "Dawn of Kings"
                                        </p>
                                        <span class="shrink-0 whitespace-nowrap text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="flex flex-col justify-between hover-shadow col-span-2 h-48 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="relative flex items-end gap-3">
                                        <span class="absolute right-0 -top-1 inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                        <img src="./dist/images/profile/game.png" class="w-20 darkImg" alt="">
                                        <div class="text-left">
                                            <h6 class="mt-2 text-lg font-semibold">🎰 Game of the Week - Mission 1</h6>
                                            <p class="mt-1 font-semibold">Wager 1,000 EUR on "Dawn of Kings"</p>
                                            <div class="progress_bar mt-2"><i style="width:0%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between gap-2 w-full mt-0">
                                        <p class="text-left font-medium truncate">
                                            <b class="text-xs">Reward:</b><br/>
                                            Get 150 Free Spins on "Dawn of Kings"
                                        </p>
                                        <span class="shrink-0 whitespace-nowrap text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                                <button class="relative flex flex-col justify-between hover-shadow h-48 p-2.5 rounded-lg bg-back3 text-center" onclick="modalOpen('mission_lock-modal')">
                                    <div class="w-full truncate-2 font-bold fs15 leading-tight">🎰 Game of the Week - Mission 1</div>
                                    <span class="inline-flex px-2 mx-auto fs10 bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                    <div class="w-full"><img src="./dist/images/profile/game.png" class="w-20 mx-auto darkImg" alt=""></div>
                                    <p class="w-full truncate-2 text-xs">
                                        <b>Reward:</b><br/>
                                        Get 20 Free Spins on "Yeti Quest"
                                    </p>
                                </button>
                            </div>
                            <div class="grid md:hidden grid-cols-1 gap-y-3">
                                <button class="relative flex flex-col justify-between hover-shadow col-span-2 p-2.5 rounded-lg bg-back3" onclick="modalOpen('mission_lock-modal')">
                                    <div class="flex items-center gap-3 w-full">
                                        <img src="./dist/images/profile/game.png" class="w-24 darkImg" alt="">
                                        <div class="flex-1 text-left">
                                            <div class="text-right">
                                                <span class="inline-flex px-2 py-0.5 mx-auto text-xs bg-[#d33] font-medium rounded-lg">LOCKED</span>
                                            </div>
                                            <h6 class="text-xl font-semibold">🎰 Game of the Week - Mission 2</h6>
                                            <p class="mt-2 font-semibold">Wager 2,000 EUR on "Sugar Rush 1000"</p>
                                            <div class="progress_bar !w-full mt-3"><i style="width:20%"></i></div>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between w-full">
                                        <p class="text-left font-medium">
                                            <b class="text-xs">Reward:</b><br/>
                                            A EUR 1 Free Bet | All Sports
                                        </p>
                                        <span class="text-xs font-medium">View details ➤</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div id="gameweek-tab-3" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="gameweek-3-tab">
                            <div class="py-20">
                                <img src="./dist/images/profile/empty_2.png" class="w-28 mx-auto emptydance" alt="">
                                <div class="mt-3 text-center text-lg font-semibold">You haven't completed any missions yet. Try something  <a href="javascript:;" class="underline">something simple</a> first.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tournaments -->
                <div id="profile-tab-4" class="tab-pane leading-relaxed p-4 pb-3" role="tabpanel" aria-labelledby="profile-4-tab">
                    <div class="tournament_list">
                        <ul class="noscrollbar overflow-x-auto nav nav-link-tabs full_type whitespace-nowrap" role="tablist">
                            <li id="tournament-1-tab" class="nav-item" role="presentation">
                                <button class="nav-link py-2 active" data-tw-toggle="pill" data-tw-target="#tournament-tab-1" type="button" role="tab" aria-controls="tournament-tab-1" aria-selected="true"> Overview (7) </button> 
                            </li>
                            <li id="tournament-2-tab" class="nav-item" role="presentation">
                                <button class="nav-link py-2" data-tw-toggle="pill" data-tw-target="#tournament-tab-2" type="button" role="tab" aria-controls="tournament-tab-2" aria-selected="false"> My Tournaments </button> 
                            </li>
                            <li id="tournament-3-tab" class="nav-item" role="presentation">
                                <button class="nav-link py-2" data-tw-toggle="pill" data-tw-target="#tournament-tab-3" type="button" role="tab" aria-controls="tournament-tab-3" aria-selected="false"> Started (9) </button> 
                            </li>
                            <li id="tournament-4-tab" class="nav-item" role="presentation">
                                <button class="nav-link py-2" data-tw-toggle="pill" data-tw-target="#tournament-tab-4" type="button" role="tab" aria-controls="tournament-tab-4" aria-selected="false"> Finished (4) </button> 
                            </li>
                        </ul>
                        <div class="tab-content mt-5 p-2">
                            <div id="tournament-tab-1" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="tournament-1-tab">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()">
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_1.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#6b8dce] text-xs rounded-lg">GATHERING</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()"> 
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_2.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#26a65b] text-xs rounded-lg">STARTED</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()">
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_3.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#6b8dce] text-xs rounded-lg">GATHERING</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()"> 
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_4.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#26a65b] text-xs rounded-lg">STARTED</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tournament-tab-2" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="tournament-2-tab">
                                <div class="py-20 text-center">
                                    <img src="./dist/images/profile/empty.png" class="w-28 mx-auto emptydance" alt="">
                                    <p class="mt-10 text-base font-semibold">You didn't register in any of the tournaments yet</p>
                                </div>
                            </div>
                            <div id="tournament-tab-3" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="tournament-3-tab">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()"> 
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_1.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#26a65b] text-xs rounded-lg">STARTED</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()"> 
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_2.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#26a65b] text-xs rounded-lg">STARTED</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()"> 
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_4.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#26a65b] text-xs rounded-lg">STARTED</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div id="tournament-tab-4" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="tournament-4-tab">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()"> 
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_1.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#888888] text-xs rounded-lg">FINISHED</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()"> 
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_2.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#888888] text-xs rounded-lg">FINISHED</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg bg-back3 overflow-hidden hover-shadow cursor-pointer" onclick="profileTourDetail()"> 
                                        <div class="relative">
                                            <img class="w-full" src="./dist/images/profile/banner_4.jpg" alt="">
                                            <span class="absolute right-1 bottom-1 px-2 py-0.5 bg-[#888888] text-xs rounded-lg">FINISHED</span>
                                        </div>
                                        <div class="pt-1 px-3 pb-3">
                                            <span class="text-xs leading-none">STARTING IN 7 DAYS</span>
                                            <p class="truncate text-lg font-bold leading-none">Sunday's Lucky Live Casino</p>
                                            <div class="flex items-center justify-evenly gap-5 mt-3 text-center">
                                                <div>
                                                    <b class="block mb-1">Buy In</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">Free</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Registered</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">10 / 10000</span>
                                                </div>
                                                <div>
                                                    <b class="block mb-1">Prize</b>
                                                    <span class="px-1.5 py-0.5 font-bold bg-provider rounded">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="tournament_detail hidden">
                        <button class="flex items-center gap-2" onclick="profileTourList()">
                            <svg viewBox="0 0 8 13" class="svg-icon w-7 rotate-90"><use xlink:href="./dist/images/icon-defs.svg?909#arrow_down_y"></use></svg>
                            <b class="color-softP2 font-bold text-base text-left">€100,000 Prize Pool This Football Season! ⚽</b>
                            <span class="px-2 py-0.5 bg-[#26a65b] text-xs text-white rounded-xl">STARTED</span>
                        </button>
                        <div class="relative overflow-hidden flex flex-col justify-between h-auto md:h-44 p-3 rounded-lg" style="background:url(./dist/images/profile/long_banner_1.png) no-repeat center center / cover;">
                            <div class="absolute left-0 top-0 w-full h-full bg-overlay"></div>
                            <div class="relative z-10">
                                <div class="inline-block px-2 py-1 md:mt-0 mt-20 bg-back3 rounded">
                                    <p class="text-xs font-semibold">Finishing</p>
                                    <div class="flex items-center justify-between gap-4 text-base">
                                        <b>03</b><b>:</b><b>15</b><b>:</b><b>45</b><b>:</b><b>15</b>
                                    </div>
                                </div>
                            </div>
                            <div class="relative z-10 flex md:flex-row flex-col items-start md:items-end justify-between">
                                <div>
                                    <p class="font-bold">September 6 - September 13</p>
                                    <div class="hidden md:flex items-center gap-2">
                                        <div class="px-2 py-1 border border-white border-opacity-30 rounded">
                                            <p class="fs10 opacity-50">Buy In</p>
                                            <b>Free</b>
                                        </div>
                                        <div class="px-2 py-1 border border-white border-opacity-30 rounded">
                                            <p class="fs10 opacity-50">Registered</p>
                                            <b>316 / 5000</b>
                                        </div>
                                        <div class="px-2 py-1 border border-white border-opacity-30 rounded">
                                            <p class="fs10 opacity-50">Duration</p>
                                            <b>7 days</b>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-pending w-full md:w-64 font-bold">Join Tournament</button>
                            </div>
                        </div>

                        <div class="md:hidden flex items-center gap-2 w-full mt-3">
                            <div class="flex-1 px-2 py-1 rounded bg-inbox">
                                <p class="fs10 opacity-50">Buy In</p>
                                <b class="text-base">Free</b>
                            </div>
                            <div class="flex-1 px-2 py-1 rounded bg-inbox">
                                <p class="fs10 opacity-50">Registered</p>
                                <b class="text-base">316 / 5000</b>
                            </div>
                            <div class="flex-1 px-2 py-1 rounded bg-inbox">
                                <p class="fs10 opacity-50">Duration</p>
                                <b class="text-base">7 days</b>
                            </div>
                        </div>

                        <div class="flex items-start gap-2">
                            <div class="overflow-x-hidden overflow-y-auto md:h-[340px] w-full md:w-3/5 noscrollbar">
                                <ul class="z-10 sticky top-0 nav nav-link-tabs big_type bg-content" role="tablist">
                                    <li id="tournament_detail-5-tab" class="nav-item flex-1" role="presentation"> 
                                        <button class="nav-link w-full py-3 active" data-tw-toggle="pill" data-tw-target="#tournament_detail-tab-5" type="button" role="tab" aria-controls="tournament_detail-tab-5" aria-selected="true"> Rules </button> 
                                    </li>
                                    <li id="tournament_detail-6-tab" class="nav-item flex-1" role="presentation"> 
                                        <button class="nav-link w-full py-3" data-tw-toggle="pill" data-tw-target="#tournament_detail-tab-6" type="button" role="tab" aria-controls="tournament_detail-tab-6" aria-selected="false"> Leaderboard </button> 
                                    </li>
                                    <li id="tournament_detail-7-tab" class="nav-item flex-1 md:hidden block" role="presentation"> 
                                        <button class="nav-link w-full py-3" data-tw-toggle="pill" data-tw-target="#tournament_detail-tab-7" type="button" role="tab" aria-controls="tournament_detail-tab-7" aria-selected="false"> Prize pool </button> 
                                    </li>
                                </ul>
                                <div class="tab-content mt-5">
                                    <div id="tournament_detail-tab-5" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="tournament_detail-5-tab">
                                        <p>Every week this football season you could win huge cash prizes, and there's €100,000 to be won.</p>
                                        <p><b>Duration:</b> every Friday from 00:00 to Thursday 23:59 UTC until 22.05.25.</p>
                                        <p> Here's how to enter:</p>
                                        <p>Opt in here, and then every winning bet of €20 or more on odds of 1.5 or above will earn you points. Bets have to be on football events.</p>
                                        <p>The more you win, the higher you'll climb in our weekly leaderboard. Longer odds get you more points, and if you finish in the top ten, you'll take home a cash prize!</p>
                                    </div>
                                    <div id="tournament_detail-tab-6" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="tournament_detail-6-tab">
                                        <div class="relative podium_box h-24">
                                            <div class="first inline-flex flex-col items-center gap-1">
                                                <div class="relative w-24"><img src="./dist/images/profile/529.webp" class="relative z-10 w-12 mx-auto" alt=""><img src="./dist/images/profile/first-place-frame.png" class="absolute left-0 top-0 w-full" alt=""></div>
                                                <p class="font-bold text-xs">Prima*****</p>
                                                <span class="px-2 font-bold bg-pending rounded-xl">136103</span>
                                            </div>
                                            <div class="second inline-flex flex-col items-center gap-1">
                                                <div class="relative w-24"><img src="./dist/images/profile/710.webp" class="w-12 mx-auto" alt=""></div>
                                                <p class="font-bold text-xs">bigb*****</p>
                                                <span class="px-2 font-bold bg-pending rounded-xl">20118</span>
                                            </div>
                                            <div class="third inline-flex flex-col items-center gap-1">
                                                <div class="relative w-24"><img src="./dist/images/profile/68795917.webp" class="w-12 mx-auto" alt=""></div>
                                                <p class="font-bold text-xs">Upto*****</p>
                                                <span class="px-2 font-bold bg-pending rounded-xl">12580</span>
                                            </div>
                                        </div>
                                        <div><img src="./dist/images/profile/tournament-podium.png" class="w-full md:w-4/5 mx-auto" alt=""></div>
                                        <div>
                                            <div class="flex items-center text-xs font-semibold py-2">
                                                <div class="w-1/5 px-3 text-center">Rank</div>
                                                <div class="w-3/5 px-3">Player</div>
                                                <div class="w-1/5 px-3 text-right">Score</div>
                                            </div>
                                            <div class="flex items-center text-base font-semibold py-1 px-2 mb-2 bg-inbox rounded">
                                                <div class="w-1/5 px-3 text-center">04</div>
                                                <div class="flex items-center gap-1 w-3/5 px-3"><img src="./dist/images/profile/131231143.webp" class="w-6" alt="">Godf******</div>
                                                <div class="w-1/5 px-3 text-right">8745</div>
                                            </div>   
                                            <div class="flex items-center text-base font-semibold py-1 px-2 mb-2 bg-inbox rounded">
                                                <div class="w-1/5 px-3 text-center">05</div>
                                                <div class="flex items-center gap-1 w-3/5 px-3"><img src="./dist/images/profile/131231143.webp" class="w-6" alt="">Nico*****</div>
                                                <div class="w-1/5 px-3 text-right">8064</div>
                                            </div>   
                                            <div class="flex items-center text-base font-semibold py-1 px-2 mb-2 bg-inbox rounded">
                                                <div class="w-1/5 px-3 text-center">06</div>
                                                <div class="flex items-center gap-1 w-3/5 px-3"><img src="./dist/images/profile/131231143.webp" class="w-6" alt="">MadM*****</div>
                                                <div class="w-1/5 px-3 text-right">5502</div>
                                            </div>     
                                            <div class="flex items-center text-base font-semibold py-1 px-2 mb-2 bg-inbox rounded">
                                                <div class="w-1/5 px-3 text-center">07</div>
                                                <div class="flex items-center gap-1 w-3/5 px-3"><img src="./dist/images/profile/131231143.webp" class="w-6" alt="">MadM*****</div>
                                                <div class="w-1/5 px-3 text-right">5502</div>
                                            </div>     
                                            <div class="flex items-center text-base font-semibold py-1 px-2 mb-2 bg-inbox rounded">
                                                <div class="w-1/5 px-3 text-center">08</div>
                                                <div class="flex items-center gap-1 w-3/5 px-3"><img src="./dist/images/profile/131231143.webp" class="w-6" alt="">MadM*****</div>
                                                <div class="w-1/5 px-3 text-right">5502</div>
                                            </div> 
                                            <div class="flex items-center text-base font-semibold py-1 px-2 mb-2 bg-inbox rounded">
                                                <div class="w-1/5 px-3 text-center">09</div>
                                                <div class="flex items-center gap-1 w-3/5 px-3"><img src="./dist/images/profile/131231143.webp" class="w-6" alt="">MadM*****</div>
                                                <div class="w-1/5 px-3 text-right">5502</div>
                                            </div>     
                                            <div class="flex items-center text-base font-semibold py-1 px-2 mb-2 bg-inbox rounded">
                                                <div class="w-1/5 px-3 text-center">10</div>
                                                <div class="flex items-center gap-1 w-3/5 px-3"><img src="./dist/images/profile/131231143.webp" class="w-6" alt="">MadM*****</div>
                                                <div class="w-1/5 px-3 text-right">5502</div>
                                            </div>                                              
                                        </div>
                                    </div>
                                    <div id="tournament_detail-tab-7" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="tournament_detail-7-tab">
                                        <div class="p-3 bg-back3 rounded noscrollbar">
                                            <div class="sticky top-0 bg-back3 pb-2">
                                                <h5 class="mb-1 text-lg font-bold">Prize pool</h5>
                                                <p class="flex items-center justify-between px-2 py-1 rounded bg-content text-xs font-bold"><span>Rank</span><span>Prize</span></p>
                                            </div>
                                            <div class="">
                                                <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                                    <div class="flex itesm-center gap-2">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">1</b>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                        <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                                    <div class="flex itesm-center gap-2">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">2</b>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                        <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                                    <div class="flex itesm-center gap-2">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">3</b>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                        <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                                    <div class="flex items-center gap-2">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">4</b>
                                                        <img src="./dist/images/profile/arrows-slim-right.png" class="w-4" alt="">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">5</b>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                        <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                                    <div class="flex items-center gap-2">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">6</b>
                                                        <img src="./dist/images/profile/arrows-slim-right.png" class="w-4" alt="">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">8</b>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                        <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                                    <div class="flex items-center gap-2">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">9</b>
                                                        <img src="./dist/images/profile/arrows-slim-right.png" class="w-4" alt="">
                                                        <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">10</b>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                        <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:block hidden w-2/5 pt-4">
                                <div class="overflow-y-auto h-80 p-3 bg-back3 rounded noscrollbar">
                                    <div class="sticky top-0 bg-back3 pb-2">
                                        <h5 class="mb-1 text-lg font-bold">Prize pool</h5>
                                        <p class="flex items-center justify-between px-2 py-1 rounded bg-content text-xs font-bold"><span>Rank</span><span>Prize</span></p>
                                    </div>
                                    <div class="">
                                        <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                            <div class="flex itesm-center gap-2">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">1</b>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                            <div class="flex itesm-center gap-2">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">2</b>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                            <div class="flex itesm-center gap-2">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">3</b>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                            <div class="flex items-center gap-2">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">4</b>
                                                <img src="./dist/images/profile/arrows-slim-right.png" class="w-4" alt="">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">5</b>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                            <div class="flex items-center gap-2">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">6</b>
                                                <img src="./dist/images/profile/arrows-slim-right.png" class="w-4" alt="">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">8</b>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between px-2 py-1 mb-1.5 bg-white rounded">
                                            <div class="flex items-center gap-2">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">9</b>
                                                <img src="./dist/images/profile/arrows-slim-right.png" class="w-4" alt="">
                                                <b class="flex items-center justify-center w-6 h-6 bg-pending bg-opacity-20 text-black text-xs text-opacity-50 rounded-full text-center">10</b>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <img src="./dist/images/profile/bonus.png" class="w-8" alt="">
                                                <b class="px-2 font-bold bg-pending rounded-xl">€800 | Cash</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- levels -->
                <div id="profile-tab-5" class="tab-pane leading-relaxed p-4" role="tabpanel" aria-labelledby="profile-5-tab">
                    <div class="pb-1 mb-3 text-2xl border-b-2 border-white border-opacity-10 font-medium">
                        Levels
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-10 mt-5 text-center ">
                        <button class="level_item active p-5" onclick="modalOpen('level_active-modal')">
                            <img src="./dist/images/profile/Level_1.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Rookie</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_2.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Joker</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_3.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Spinner</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_4.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Ace</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_5.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Gambit</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_6.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Pioneer</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_7.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Master</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_8.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Elite</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_9.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Royal</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_10.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Tycoon</p>
                        </button>
                        <button class="level_item p-5" onclick="modalOpen('level-modal')">
                            <img src="./dist/images/profile/Level_11.png" class="w-24 mx-auto mb-2" alt="">
                            <p class="font-bold">Legend</p>
                        </button>
                    </div>
                </div>
                <!-- spin the wheel -->
                <div id="profile-tab-6" class="tab-pane leading-relaxed p-0 h-full" role="tabpanel" aria-labelledby="profile-6-tab">
                    <div class="spin_list p-4 ">
                        <div class="pb-1 mb-3 text-2xl border-b-2 border-white border-opacity-10 font-medium">
                            Spin The Wheel
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="overflow-hidden relative h-52 hover-shadow rounded-xl cursor-pointer" onclick="profileSpinDetail()">
                                <img src="./dist/images/profile/spin_bg.png" class="absolute left-0 top-0 w-full h-full object-cover" alt="">
                                <div class="spin-overlay"></div>
                                <div class="relative z-10 flex flex-col justify-between h-full">
                                    <div class="py-2 px-4 text-right"><span class="px-2 py-0.5 text-xs bg-[#26a65b] rounded-xl">0 SPINS</span></div>
                                    <div class="py-2 px-4"><b class="text-lg">Rookie</b></div>
                                </div>
                            </div>
                            <div class="overflow-hidden relative h-52 hover-shadow rounded-xl cursor-pointer" onclick="profileSpinDetail()">
                                <img src="./dist/images/profile/spin_bg.png" class="absolute left-0 top-0 w-full h-full object-cover" alt="">
                                <div class="spin-overlay"></div>
                                <div class="relative z-10 flex flex-col justify-between h-full">
                                    <div class="py-2 px-4 text-right"><span class="px-2 py-0.5 text-xs bg-[#26a65b] rounded-xl">0 SPINS</span></div>
                                    <div class="py-2 px-4"><b class="text-lg">Rookie</b></div>
                                </div>
                            </div>
                            <div class="overflow-hidden relative h-52 hover-shadow rounded-xl cursor-pointer" onclick="profileSpinDetail()">
                                <img src="./dist/images/profile/spin_bg.png" class="absolute left-0 top-0 w-full h-full object-cover" alt="">
                                <div class="spin-overlay"></div>
                                <div class="relative z-10 flex flex-col justify-between h-full">
                                    <div class="py-2 px-4 text-right"><span class="px-2 py-0.5 text-xs bg-[#26a65b] rounded-xl">0 SPINS</span></div>
                                    <div class="py-2 px-4"><b class="text-lg">Rookie</b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative spin_detail hidden h-full p-4">
                        <button class="absolute left-0 top-0 flex items-center gap-2" onclick="profileSpinList()">
                            <svg viewBox="0 0 8 13" class="svg-icon w-7 rotate-90"><use xlink:href="./dist/images/icon-defs.svg#arrow_down"></use></svg>
                            <b class="text-lg">Back to games</b>
                        </button>
                        <div class="flex justify-center mt-4">
                            <div class="wheel_area">
                                <div class="wheel_ring"></div>
                                <div class="wheel_holder">
                                    <div class="wheel_content">
                                        <div class="wheel_bg"></div>
                                        <div class="wheel-sector" style="transform: rotate(60deg);"><div class="wheel-sector-content"><div class="wheel-sector-name"><div class="sector-text " style="font-size: 15px;">20 Points</div></div></div></div>
                                        <div class="wheel-sector" style="transform: rotate(0deg);"><div class="wheel-sector-content"><div class="wheel-sector-name"><div class="sector-text " style="font-size: 15px;">5 Free Spins</div></div></div></div>
                                        <div class="wheel-sector" style="transform: rotate(-60deg);"><div class="wheel-sector-content"><div class="wheel-sector-name"><div class="sector-text " style="font-size: 15px;">10 Free Spins</div></div></div></div>
                                        <div class="wheel-sector" style="transform: rotate(-120deg);"><div class="wheel-sector-content"><div class="wheel-sector-name"><div class="sector-text " style="font-size: 15px;">20 Points</div></div></div></div>
                                        <div class="wheel-sector" style="transform: rotate(-180deg);"><div class="wheel-sector-content"><div class="wheel-sector-name"><div class="sector-text " style="font-size: 15px;">5 Free Spins</div></div></div></div>
                                        <div class="wheel-sector" style="transform: rotate(-240deg);"><div class="wheel-sector-content"><div class="wheel-sector-name"><div class="sector-text " style="font-size: 15px;">20 Free Spins</div></div></div></div>
                                    </div>
                                    <button class="spin_btn"></button>
                                    <div class="spin_pointer"></div>
                                    <div class="wheel_light">
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon static"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 31s linear 4s infinite normal none running lightRotate, 3s linear 4s infinite normal none running lightOpacity, 4s linear 4s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 31s linear 3s infinite normal none running lightRotate, 6s linear 3s infinite normal none running lightOpacity, 3s linear 3s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 37s linear 1s infinite normal none running lightRotate, 3s linear 1s infinite normal none running lightOpacity, 3s linear 1s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 34s linear 2s infinite normal none running lightRotate, 5s linear 2s infinite normal none running lightOpacity, 4s linear 2s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 35s linear 4s infinite normal none running lightRotate, 5s linear 4s infinite normal none running lightOpacity, 3s linear 4s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 35s linear 4s infinite normal none running lightRotate, 6s linear 4s infinite normal none running lightOpacity, 4s linear 4s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 38s linear 3s infinite normal none running lightRotate, 3s linear 3s infinite normal none running lightOpacity, 3s linear 3s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 30s linear 2s infinite normal none running lightRotate, 5s linear 2s infinite normal none running lightOpacity, 4s linear 2s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 31s linear 3s infinite normal none running lightRotate, 3s linear 3s infinite normal none running lightOpacity, 4s linear 3s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicSmall" style="animation: 32s linear 2s infinite normal none running lightRotate, 4s linear 2s infinite normal none running lightOpacity, 3s linear 2s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 37s linear 3s infinite normal none running lightRotate, 6s linear 3s infinite normal none running lightOpacity, 4s linear 3s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 40s linear 2s infinite normal none running lightRotate, 3s linear 2s infinite normal none running lightOpacity, 3s linear 2s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 38s linear 2s infinite normal none running lightRotate, 4s linear 2s infinite normal none running lightOpacity, 3s linear 2s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 38s linear 3s infinite normal none running lightRotate, 5s linear 3s infinite normal none running lightOpacity, 4s linear 3s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 34s linear 3s infinite normal none running lightRotate, 5s linear 3s infinite normal none running lightOpacity, 4s linear 3s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 36s linear 3s infinite normal none running lightRotate, 6s linear 3s infinite normal none running lightOpacity, 4s linear 3s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 36s linear 1s infinite normal none running lightRotate, 6s linear 1s infinite normal none running lightOpacity, 3s linear 1s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 40s linear 2s infinite normal none running lightRotate, 6s linear 2s infinite normal none running lightOpacity, 4s linear 2s infinite normal none running lightZoom;"></div></div>
                                        <div class="light"><div class="light-icon dynamicBig" style="animation: 39s linear 3s infinite normal none running lightRotate, 4s linear 3s infinite normal none running lightOpacity, 4s linear 3s infinite normal none running lightZoom;"></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <h6 class="text-2xl font-semibold">Rookie</h6>
                            <p class="font-medium">0 spins available</p>
                        </div>
                    </div>
                </div>
                <!-- match x -->
                <div id="profile-tab-7" class="tab-pane leading-relaxed p-4" role="tabpanel" aria-labelledby="profile-7-tab">
                    <div class="py-20 text-center">
                        <img src="./dist/images/profile/empty_wheel.png" class="w-28 mx-auto emptydance" alt="">
                        <p class="mt-10 text-base font-semibold">There is nothing here, yet...</p>
                    </div>
                </div>
                <!-- bonuses -->
                <div id="profile-tab-8" class="tab-pane leading-relaxed p-4" role="tabpanel" aria-labelledby="profile-8-tab">
                    <div class="pb-1 mb-3 text-2xl border-b-2 border-white border-opacity-10 font-medium">
                        Bonuses
                    </div>
                    <div class="py-20 text-center">
                        <img src="./dist/images/profile/empty.png" class="w-28 mx-auto emptydance" alt="">
                        <p class="mt-10 text-base font-semibold">You don't have redeemed bonuses at the moment</p>
                    </div>
                </div>
                <!-- inbox -->
                <div id="profile-tab-9" class="tab-pane leading-relaxed p-0 h-full" role="tabpanel" aria-labelledby="profile-9-tab">
                    <div class="flex flex-col h-full">
                        <div class="shrink-0 bg-inbox">
                            <ul class="nav nav-link-tabs white_type" role="tablist">
                                <li id="inbox-5-tab" class="nav-item" role="presentation"> 
                                    <button class="nav-link h-full active" data-tw-toggle="pill" data-tw-target="#inbox-tab-5" type="button" role="tab" aria-controls="inbox-tab-5" aria-selected="true"> All </button> 
                                </li>
                                <li id="inbox-6-tab" class="nav-item" role="presentation"> 
                                    <button class="nav-link h-full" data-tw-toggle="pill" data-tw-target="#inbox-tab-6" type="button" role="tab" aria-controls="inbox-tab-6" aria-selected="false"> Favorite </button> 
                                </li>
                            </ul>
                        </div>
                        <div class="flex-1 overflow-y-auto">
                            <div class="tab-content h-full">
                                <div id="inbox-tab-5" class="tab-pane leading-relaxed flex h-full active" role="tabpanel" aria-labelledby="inbox-5-tab">
                                    <div class="overflow-y-auto scrollbar w-full md:w-1/3 h-full border-r-2 border-white border-opacity-30">
                                        <button class="flex items-center gap-2 w-full p-3 bg-white bg-opacity-5">
                                            <img class="w-14" src="./dist/images/profile/inbox_img.avif" alt="">
                                            <div class="font-medium">
                                                <div class="flex items-start justify-between">
                                                    <p class="leading-tight text-left font-semibold">Game of the Week Missions!</p>
                                                    <p class="shrink-0 opacity-70 text-xs ">6 days ago</p>
                                                </div>
                                                <div class="w-full mt-2 truncate-2 leading-tight text-xs opacity-50 text-left">Earn up to 230 free spins and 75 super spins by playing Yeti Quest!</div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="relative overflow-y-auto hidden md:block scrollbar w-2/3 h-full bg-white bg-opacity-5">
                                        <div class="z-10 sticky top-0 flex items-center gap-2 w-full px-3 py-5 bg-[#333]">
                                            <img class="w-14" src="./dist/images/profile/inbox_img.avif" alt="">
                                            <div class="flex-1 font-medium">
                                                <div class="flex items-start justify-between">
                                                    <p class="leading-tight text-left font-semibold">Game of the Week Missions!</p>
                                                    <p class="shrink-0 opacity-50 text-xs ">6 days ago</p>
                                                </div>
                                                <div class="w-full mt-2 truncate-2 leading-tight text-xs opacity-70 text-left">Earn up to 230 free spins and 75 super spins by playing Yeti Quest!</div>
                                                <div class="flex items-center justify-end gap-3">
                                                    <button><img class="w-5" src="./dist/images/profile/delete-btn.png" alt=""></button>
                                                    <button><img class="w-5 invert" src="./dist/images/profile/inbox_favor.png" alt=""></button>
                                                    <button><img class="w-5" src="./dist/images/profile/inbox_favor_active.png" alt=""></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 opacity-70">Earn up to 230 free spins and 75 super spins by playing Yeti Quest!</div>
                                        <button class="z-10 sticky left-3 bottom-3 btn btn-pending">SEE MISSIONS</button>
                                    </div>
                                </div>
                                <div id="inbox-tab-6" class="tab-pane leading-relaxed flex h-full" role="tabpanel" aria-labelledby="inbox-6-tab">
                                    <div class="overflow-y-auto scrollbar w-full md:w-1/3 h-full border-r-2 border-white border-opacity-30">
                                        <button class="flex items-center gap-2 w-full p-3 bg-white bg-opacity-5">
                                            <img class="w-14" src="./dist/images/profile/inbox_img.avif" alt="">
                                            <div class="font-medium">
                                                <div class="flex items-start justify-between">
                                                    <p class="leading-tight text-left font-semibold">Game of the Week Missions!</p>
                                                    <p class="shrink-0 opacity-70 text-xs ">6 days ago</p>
                                                </div>
                                                <div class="w-full mt-2 truncate-2 leading-tight text-xs opacity-50 text-left">Earn up to 230 free spins and 75 super spins by playing Yeti Quest!</div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="relative overflow-y-auto hidden md:block scrollbar w-2/3 h-full bg-white bg-opacity-5">
                                        <div class="z-10 sticky top-0 flex items-center gap-2 w-full px-3 py-5 bg-[#333]">
                                            <img class="w-14" src="./dist/images/profile/inbox_img.avif" alt="">
                                            <div class="flex-1 font-medium">
                                                <div class="flex items-start justify-between">
                                                    <p class="leading-tight text-left font-semibold">Game of the Week Missions!</p>
                                                    <p class="shrink-0 opacity-50 text-xs ">6 days ago</p>
                                                </div>
                                                <div class="w-full mt-2 truncate-2 leading-tight text-xs opacity-70 text-left">Earn up to 230 free spins and 75 super spins by playing Yeti Quest!</div>
                                                <div class="flex items-center justify-end gap-3">
                                                    <button><img class="w-5" src="./dist/images/profile/delete-btn.png" alt=""></button>
                                                    <button><img class="w-5" src="./dist/images/profile/inbox_favor_active.png" alt=""></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 opacity-70">Earn up to 230 free spins and 75 super spins by playing Yeti Quest!</div>
                                        <button class="z-10 sticky left-3 bottom-3 btn btn-pending">SEE MISSIONS</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between shrink-0 h-12 px-3 bg-inbox">
                            <div class="form-check form-switch type02"> 
                                <input id="inbox-check-switch" class="form-check-input" type="checkbox"> 
                                <label class="form-check-label font-bold" for="inbox-check-switch">Show unread</label> 
                            </div>
                            <button class="flex items-center gap-1 font-bold"><img src="./dist/images/profile/mark-all-read.png" class="w-5 invert" alt="">Mark all as Read</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src='https://design01.codeidea.io/link_script.js'></script>
<script src="./dist/js/app.js"></script>
<script src="./dist/js/jquery-1.12.4.js"></script>
<script src="./dist/js/jquery-ui.js"></script>
<script src="./dist/js/swiper-bundle.min.js"></script>
<script src="./dist/js/custom.js"></script>


</body>

</html>