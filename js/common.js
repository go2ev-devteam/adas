$(document).ready(function()
{
	var $gnb = $('#gnb');
	var isMobile = false;
	var isMenuOpen = false;
	var $win = $(window);
	var $menu_box = $('#menu_box');
	var $select_lang = $('#select_lang');
	var $foot_menu_box = $('#foot_menu_box');
	var $btn_book = $('#btn_book');
	var $menuBg = $('#menu_bg')
	var $dep2Group = $('.dep2-group');
	var $dep1s = $gnb.find('.dep1');

	return;

	$gnb.on('mouseenter', function()
	{
		if(isMobile) return;

		$menuBg.addClass('active');
		$dep2Group.removeClass('sr-only');
	}).on('mouseleave', function()
	{
		if(isMobile) return;

		$menuBg.removeClass('active');
		$dep2Group.addClass('sr-only');
	});

	$btn_book.on('click', function()
	{
		if(!isMenuOpen)
		{
			$menu_box.removeClass('sr-only');
		}
		else
		{
			$menu_box.addClass('sr-only');
		}
		isMenuOpen = !isMenuOpen;
	});
	$dep1s.on('click', function()
	{
		if(isMobile && !isMenuOpen)
		{
			// $dep2Group.addClass('sr-only')
			// $(this).find('.dep2-group').removeClass('sr-only')
		}
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
	var W_1054 = 1054;
	var W_998 = 998;
	var W_640 = 640;
	var W_320 = 320;

	function setPosition()
	{
		var w = $win.width();
		if(w > W_1054)
		{
			visible(true, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text'), $dep2Group ]);
			visible(false, [$btn_book]);
			isMobile = false;
		}
		else if(w < W_1054 && w > W_998)
		{
			console.log('1054')
			visible(true, [$menu_box, $select_lang, $foot_menu_box, $dep2Group]);
			visible(false, [$btn_book, $('.extra-text')]);
			isMobile = false;
		}
		else if(w < W_998 && w > W_640)
		{
			console.log('w_640')
			visible(false, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text'), $dep2Group]);
			visible(true, [$btn_book]);
			isMobile = true;
		}

		else if(w < W_640 && w > W_320)
		{
			visible(false, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text'), $dep2Group]);
			visible(true, [$btn_book]);
			isMobile = true;
		}
	}
	$win.resize(function()
	{
		isMenuOpen = false;
		// setPosition();
	});

	setPosition();
});