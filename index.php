<?php
$page_title = 'ADASONE 메인';
include('./_init.php');
include($GP -> INC.'doc.head.php');
?>
<body>
	<div class='root'>
		<?php 
		include($GP -> INC.'accessibility.php');
		include($GP -> INC.'head.php');
		?>
		<!--↑↑ Header ↑↑-->
		<!--↓↓ Body & Content ↓↓-->
		<div class='body main' id='body'>
			<div class='contents' id='contents'>
				<div class='content-head slider'>
					<ul id='slides' class='slides'>
						<li class='slides-row slide-1'>
						</li>
						<li class='slides-row slide-2'>
						</li>
						<li class='slides-row slide-3'>
						</li>
					</ul>
					<div class='gutter'>
						<div class='slide-addit'>
							<div class='ctrl-box' id='ctrl_box'>
								<button type='button' class='btn slide-prev'>이전 슬라이드</button>
								<button type='button' class='btn slide-play'>슬라이드 재생</button>
								<button type='button' class='btn slide-next'>다음 슬라이드</button>
							</div>
							<div class='text-box'>
								<dl>
									<dt>CES 2015 <br />Innovation awards</dt>
									<dd class='extra-text'><a href='#'>당사의 SM-100 제품으로 참가한 2015년 1월 미국 라스베가스 CES 에서 <strong>2015 CES  INNOVATION AWARDS</strong>를 수상하였습니다.</a>
									<dd class='link-box'><a href='#' class='go-link'>Go</a></dd>
								</dl>
								<dl>
									<dt>IoT Technology</dt>
									<dd class='extra-text'><a href='#'>Another technology is IoT which is based on closely associated machine-to-machine (M2M) communication products in manufacturing and power, oil and gas utilities..</a>
									<dd class='link-box'><a href='#' class='go-link'>Go</a></dd>
								</dl>
								<dl>
									<dt>Car DVR Technology</dt>
									<dd class='extra-text'><a href='#'>Hanyang offers a Car DVR, a portable Car Digital Video Recorder with wide angle lens that captures high definition video and displays them on LCD.</a>
									<dd class='link-box'><a href='#' class='go-link'>Go</a></dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
				<div class='content-row feat'>
						<div class='gutter'>
							<span class='arr-down'></span>
							<dl class='feat-01'>
								<dt>Embedded Vision Technology</dt>
								<dd>Our company works on Embedded Vision. Basically, Embedded and Computer systems working together is referred to as embedded vision. These systems are detveloped for Consumer Electronics, Medical equipments, Automobile etc.
								</dd>
							</dl>
							<dl class='feat-02'>
								<dt>IoT Technology</dt>
								<dd>Another technology is IoT which is based on closely associated machine-to-machine (M2M) communication products in manufacturing and power, oil and gas utilities.</dd>
							</dl>
							<dl class='feat-03'>
								<dt>Car DVR Technology</dt>
								<dd>Hanyang offers a Car DVR, a portable Car Digital Video Recorder with wide angle lens that captures high definition video and displays them on LCD. It automatically records and saves </dd>
							</dl>
					</div>
				</div>
					<!--↓↓ Focus & NEWS, Download Content-row ↓↓-->
				<div class='content-row'>
					<div class='gutter'>
						<div class='focus-box conts-col-1'>
							<div class='focus-box-in'>
								<h4>Focus</h4>
								<ul>
									<li><a href='focus_01' class='current'>■</a></li>
									<li><a href='focus_02'>■</a></li>
									<li><a href='focus_03'>■</a></li>
								</ul>
								<h5 id='focus_01' class='current'>CES 2015 innovation awards_1</h5>
								<span class='focus-item current'>
									There's a hero If you look in side your heart You don't have to be afraid Of what you are There's an answer If you reach in to your soul And the sorrow that you know Will melt away And then a hero comes along With the trength to carry on And you cast your fears aside And you know you can survive So when you feel like hope is gone There's a hero If you look in side your heart You don't have to be ...
								</span>
								<h5 id='focus_02' class='sr-only'>CES 2015 innovation awards_2</h5>
								<span class='focus-item sr-only'>
									There's a hero If you look in side your heart You don't have to be afraid Of what you are There's an answer If you reach in to your soul And the sorrow that you know Will melt away And then a hero comes along With the trength to carry on And you cast your fears aside And you know you can survive So when you feel like hope is gone There's a hero If you look in side your heart You don't have to be ...
								</span>
								<h5 id='focus_03' class='sr-only'>CES 2015 innovation awards_3</h5>
								<span class='focus-item sr-only'>
									There's a hero If you look in side your heart You don't have to be afraid Of what you are There's an answer If you reach in to your soul And the sorrow that you know Will melt away And then a hero comes along With the trength to carry on And you cast your fears aside And you know you can survive So when you feel like hope is gone There's a hero If you look in side your heart You don't have to be ...
								</span>
							</div>
						</div>
						<div class='conts-col-2'>
							<div class='biz-box'>
								<div class='box-in'>
									<h5>Business</h5>
									<span class='email'><a href='mailto:adasone@hanyang.co.kr'>adasone@hanyang.co.kr</a></span>
									<span class='tel'>+82-2-2279-1400</span>
								</div>
							</div>
							<div class='download-box'>
								<div class='box-in'>
									<h5>Download<br /><span>Center</span></h5>
									<span>다운로드 센터</span>
									<a href='download/download.php'>다운로드 페이지 바로가기</a>
								</div>
							</div>
							<div class='notice-box'>
								<div class='box-in'>
									<h5 class='current'>NEWS</h5>
									<div>
										<ul>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 뉴스 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 뉴스 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 뉴스 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 뉴스 게시글입니다</a><span class='date'>2015.06.25</span></li>
										</ul>
										<a href='news/news.php' class='link-more'>뉴스 더보기</a>
									</div>
									<h5>EVENT</h5>
									<div class='sr-only'>
										<ul>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 Event 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 Event 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 Event 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 Event 게시글입니다</a><span class='date'>2015.06.25</span></li>
										</ul>
										<a href='news/news.php' class='link-more'>Event 더보기</a>
									</div>
									<h5>FAQ</h5>
									<div class='sr-only'>
										<ul>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 FAQ 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 FAQ 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 FAQ 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 FAQ 게시글입니다</a><span class='date'>2015.06.25</span></li>
										</ul>
										<a href='news/news.php' class='link-more'>FAQ 더보기</a>
									</div>
									<h5>Q&amp;A</h5>
									<div class='sr-only'>
										<ul>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 Q&amp;A 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 Q&amp;A 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 Q&amp;A 게시글입니다</a><span class='date'>2015.06.25</span></li>
											<li><a href='#'><span><strong>&middot;</strong></span>이 글은 Q&amp;A 게시글입니다</a><span class='date'>2015.06.25</span></li>
										</ul>
										<a href='news/news.php' class='link-more'>Q&amp;A 더보기</a>
									</div>
								</div>
							</div>
						</div>
						<!--↑↑ Focus & News, Business Content-row ↑↑-->
					</div>
					<!--↑↑ Gutter ↑↑-->
				</div>
				<!--↑↑ Contents ↑↑-->
			</div>
		</div>
		<!--↑↑ Body & Content ↑↑-->
		<!--↓↓ Foot ↓↓-->
		<?php include($GP -> INC.'foot.php'); ?>
		<!--↑↑ Foot ↑↑-->
	</div>
	<script type="text/javascript" src='js/gsap/TweenMax.min.js'></script>
	<script type="text/javascript" src='js/blurjs/jquery.foggy.min.js'></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
		var W_1024 = 1054;
		var W_998 = 998;
		var W_640 = 640;
		var W_320 = 320;

		var $win = $(window);
		var $slides = $('#slides');
		var $slides_addit = $('.slide-addit');
		var $slides_row = $('.slides-row');
		var slide_len = $slides_row.length;

		function init()
		{
			var w = $win.width();
			var h = $win.height();

			$slides_row.css('left', w+'px');
			$slides_row.eq(0).css('left',0);
			// if(w>=W_320 && w<W_1054)
			// {
			// 	var addit_h = $slides_addit.height();
			// 	var slide_h = $slides_row.height();
			// 	$slide_rows.height(addit_h + slide_h);
			// }
			// else
			// {
			// 	$slide_rows.removeAttr('style')
			// }
		}

			
		var $option_texts = $('.text-box').find('dl');

		var $btn_next = $('.slide-next');
		var $btn_prev = $('.slide-prev');
		var $btn_play = $('.slide-play');

		var cnt = 0;
		var $cur = $slides_row.eq(0);
		var $prev = $slides_row.eq(0);
		var $next = $slides_row.eq(1);
		var duration = 1.1;
		var inter;

		$btn_next.click(function()
		{
			clearInterval(inter);

			$prev = $slides_row.eq(cnt);
			var	$prev_text = $option_texts.eq(cnt)

			cnt++;
			cnt = (cnt>=slide_len)? 0 : cnt;
			$next = $slides_row.eq(cnt);
			var $next_text = $option_texts.eq(cnt);

			TweenMax.to($prev, duration, {left: '-100%', startAt:{left:0}, ease:Expo.easeInOut});
			TweenMax.to($next, duration, {left: '0', startAt:{left:'100%'}, ease:Expo.easeInOut});

			TweenMax.to($prev_text, duration, {opacity: 0});
			TweenMax.to($next_text, duration, {opacity: 1, startAt:{opacity: 0}});
		});

		$btn_prev.click(function()
		{
			clearInterval(inter);

			$prev = $slides_row.eq(cnt);
			var $prev_text = $option_texts.eq(cnt);

			cnt--;
			cnt = (cnt <= 0)? slide_len-1 : cnt;
			$next = $slides_row.eq(cnt);
			var $next_text = $option_texts.eq(cnt);

			TweenMax.to($prev, duration, {left: '100%', startAt:{left: 0}, ease:Expo.easeInOut});
			TweenMax.to($next, duration, {left: 0, startAt:{left:'-100%'}, ease:Expo.easeInOut});

			TweenMax.to($prev_text, duration, {opacity: 0});
			TweenMax.to($next_text, duration, {opacity: 1, startAt:{opacity: 0}});
		});


		$btn_play.on('click', function()
		{
			inter = setInterval(function()
			{
				return;
				$prev = $slides_row.eq(cnt);
				var	$prev_text = $option_texts.eq(cnt)

				cnt++;
				cnt = (cnt>=slide_len)? 0 : cnt;
				$next = $slides_row.eq(cnt);
				var $next_text = $option_texts.eq(cnt);

				TweenMax.to($prev, duration, {left: '-100%', startAt:{left:0}, ease:Expo.easeInOut});
				TweenMax.to($next, duration, {left: '0', startAt:{left:'100%'}, ease:Expo.easeInOut});

				TweenMax.to($prev_text, duration, {opacity: 0});
				TweenMax.to($next_text, duration, {opacity: 1, startAt:{opacity: 0}});
			}, 3000)
		}).trigger('click');



		
		$win.resize(function()
		{
			init();
		})
		init();
	});
	</script>
</body>
</html>