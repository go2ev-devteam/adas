$(document).ready(function()
{
	var $gnb = $('#gnb');
	var isMobile = false;
	var isOpenDep1 = false;
	var isOpenDep2 = false;
	var $win = $(window);
	var $menu_box = $('#menu_box');
	var $select_lang = $('#select_lang');
	var $foot_menu_box = $('#foot_menu_box');
	var $btn_book = $('#btn_book');
	var $menuBg = $('#menu_bg');
	var $dep2Group = $gnb.find('.dep2-group');
	var $footDep2s = $foot_menu_box.find('.dep2-group');
	var $dep1s = $gnb.find('.dep1');
	var $dep2s = $gnb.find('.dep2');
	var $menu_box_tit = $('#menu_box_tit');

	$gnb.on('mouseenter', function()
	{
		if(isMobile) return;

		$menuBg.addClass('active');
		visible(true, [$dep2Group, $menu_box_tit])

	})
	$menu_box.on('mouseleave', function()
	{
		// return;
		if(isMobile) return;

		$menuBg.removeClass('active');
		visible(false,[$dep2Group, $menu_box_tit])
	});

	$btn_book.on('click', function()
	{
		if(!isOpenDep1)
		{
			$menu_box.removeClass('sr-only');
		}
		else
		{
			$menu_box.addClass('sr-only');
		}
		isOpenDep1 = !isOpenDep1;
	});
	$dep1s.on('click', function()
	{
		var $this = $(this);
		if(isMobile)
		{
			if($this.attr('isOpen')!='0')
			{
				window.location.href=$(this).attr('href');
				return;
			}
		}
		else
		{
			window.location.href=$this.attr('href');
		}

		if(isMobile && isOpenDep1)
		{
			$dep2Group.addClass('sr-only')
			$dep1s.attr('isOpen', '0');
			$dep1s.find('span').removeClass('deco-minus').addClass('deco-plus');

			$this.attr('isOpen', '1').next('.dep2-group').removeClass('sr-only');
			$this.find('span').removeClass('deco-plus').addClass('deco-minus');
		}
	})
	$dep2s.on('click', function()
	{
		window.location.href = $(this).attr('href');
	})
	// var prevW = $win.width();
	// $(window).resize(function()
	// {
	// 	if(prevW!=$win.width())
	// 	{
	// 		init();
	// 	}
	// 	prevW = $win.width();
	// });

	
	function visible(isShow, arr)
	{
		var len = arr.length;
		var i = 0;
		if(isShow)
		{
			for(i=0;i<len;++i)
			{
				arr[i].removeClass('sr-only');
			}
		}
		else
		{
			for(i=0;i<len;++i)
			{
				arr[i].addClass('sr-only');
			}
		}
	}
	var W_1280 = 1280;
	var W_992 = 992;
	var W_640 = 640;
	var W_320 = 320;

	function setPosition()
	{
		var w = $win.width();
		console.log(w);
		if(w >= W_1280)
		{
			visible(true, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text')]);
			visible(false, [$btn_book]);
			isMobile = false;
		}
		else if(w < W_1280 && w >= W_992)
		{
			visible(true, [$menu_box, $select_lang, $foot_menu_box]);
			visible(false, [$btn_book, $('.extra-text')]);
			isMobile = false;
		}
		else if(w < W_992 && w >= W_640)
		{
			visible(false, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text')]);
			visible(true, [$btn_book]);
			isMobile = true;
		}

		else if(w < W_640 && w >= W_320)
		{
			visible(false, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text')]);
			visible(true, [$btn_book]);
			isMobile = true;
		}
	}
	$win.resize(function()
	{
		isOpenDep1 = false;
		setPosition();
	});

	setPosition();
});