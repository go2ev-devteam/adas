$(document).ready(function()
{
	var $gnb = $('#gnb');
	var isTest = true;
	if(isTest)
	{
		// var $menuBg = $('#menu_bg').addClass('active');
		// var $dep2Group = $gnb.find('.dep2-group').removeClass('sr-only');
	}
	else
	{
		// var $menuBg = $('#menu_bg')
		// var $dep2Group = $gnb.find('.dep2-group');
	}

	$gnb.on('mouseenter', function()
	{
		if(isTest) return;

		$menuBg.addClass('active');
		$dep2Group.removeClass('sr-only');
	}).on('mouseleave', function()
	{
		if(isTest) return;

		$menuBg.removeClass('active');
		$dep2Group.addClass('sr-only');
	});
	// var prevW = $win.width();
	// $(window).resize(function()
	// {
	// 	if(prevW!=$win.width())
	// 	{
	// 		init();
	// 	}
	// 	prevW = $win.width();
	// });

	var $win = $(window);
	var $menu_box = $('#menu_box');
	var $select_lang = $('#select_lang');
	var $foot_menu_box = $('#foot_menu_box');
	var $btn_book = $('#btn_book');
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
				console.log(i)
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
			visible(true, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text') ]);
			visible(false, [$btn_book]);
		}
		else if(w < W_1054 && w > W_998)
		{
			visible(true, [$menu_box, $select_lang, $foot_menu_box, ]);
			visible(false, [$btn_book, $('.extra-text')]);
		}
		else if(w < W_998 && w > W_640)
		{
			visible(false, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text') ]);
			visible(true, [$btn_book]);
		}

		else if(w < W_640 && w > W_320)
		{
			visible(false, [$menu_box, $select_lang, $foot_menu_box, $('.extra-text')]);
			visible(true, [$btn_book]);
		}
	}
	$win.resize(function()
	{
		setPosition();
		console.log('on');
	});

	


	setPosition();
});