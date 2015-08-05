<!DOCTYPE html>
<html lang='ko'>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='Author' content='한양정보통신'>
<meta name='Description' content='Adas One'>
<meta name='Keywords' content='블랙박스, AdasOne, 한양정보통신'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' href='css/basic.css'>
<link rel='stylesheet' href='css/a1-wfonts.css'>
<link rel='stylesheet' href='css/common.css'>
<link rel='stylesheet' href='css/main.css'>

<script src='js/jquery-1.9.1-min.js'></script>
<script src='js/respond.min.js'></script>
<script id="TypeEngine" type='text/javascript' src="js/hy-1.1.js?client_c=4937128194"></script>
<title>ADAS ONE 메인</title>
</head>
<body>
	<div class='root'>
		<div id='accessibility'>
			<dl>
				<dt>바로가기 메뉴</dt>
				<dd>브라우저에 따라 Alt+accessKey번호, 또는
				Alt + Shift + accessKey번호, 또는
				Shift + Esc + accessKey번호 선택 및 Enter(Return) 키를 입력하시면 해당부분으로 이동합니다.</dd>
				<dd>
					<a href='#menu_box' accesskey='1'>메인메뉴 바로가기</a>
					<a href='#contents' accesskey='2'>본문 바로가기</a>
					<a href='#foot' accesskey='3'>푸터바로가기</a>
				</dd>
			</dl>
		</div>
		<div class='head'>
			<div class='row head-top'>
				<div class='gutter'>
					<h1><a href='\'>ADAS ONE</a></h1>
					<ul class='select-lang'>
						<li><a href='index.php'>언어 선택 - 한국어 </a></li>
						<li><a href='index.en.php' class='lang-en'>Select Language - English </a></li>
					</ul>
					<div class='menu-box' id='menu_box'>
						<div class='menu-bg' id='menu-bg'></div>
						<?php include('inc/menus.php');?>
					</div>
				</div>
			</div>
			<div class='row slider'>
				<div class='gutter'>
					<div class='slide-addit'>
						<div class='ctrl-box'>
							<button type='button' class='btn slide-ctrl-prev'>이전 슬라이드</button>
							<button type='button' class='btn slide-ctrl-play'>슬라이드 재생</button>
							<button type='button' class='btn slide-ctrl-next'>다음 슬라이드</button>
						</div>
						<div class='text-box'>
							<dl>
								<dt>WEB SITE RENEWAL</dt>
								<dd><a href='#'>한양정보통신의 신규사업, ADAS ONE의 홈페이지가 오픈하였습니다. <strong>2015 CES  INNOVATION AWARDS</strong>를 수상한 <strong>SM-100</strong>의 혁신적인 기능을 직접 경험해 보세요.</a>
								<a href='#' class='go-link'>Go</a>
								</dd>
							</dl>
						</div>
					</div>
					<ul>
						<li>
							<img src='img/main/bg_top_fs8.png' alt='Web Site Renewal'>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--↑↑ Header ↑↑-->
		<!--↓↓ Body & Content ↓↓-->
		<div class='body main' id='body'>
			<div class='gutter'>
				<div class='contents' id='contents'>
				</div>
			</div>
		</div>
		<!--↑↑ Body & Content ↑↑-->

		<div class='foot' id='foot'>
			<div class='foot-top'>
				<div class='gutter'>

				</div>
			</div>
			<div class='foot-body'>
				<div class='gutter'>
					<div class='menu-box'>
						<?php include('inc/foot.menus.php'); ?>
					</div>
				</div>
			</div>
			<div class='foot-tail'>
				<div class='gutter'>
				</div>
			</div>
		</div>
		<!--↑↑ Foot ↑↑-->
	</div>
</body>
</html>