$(document).ready(function()
{
	var $gnb = $('#gnb');
	var isTest = false;
	if(isTest)
	{
		var $menuBg = $('#menu_bg').addClass('active');
<<<<<<< HEAD
		var $dep2Group = $('.dep2-group').removeClass('sr-only');
=======
<<<<<<< HEAD
		var $dep2Group = $('.dep2-group').removeClass('sr-only');
=======
		var $dep2Group = $gnb.find('.dep2-group').removeClass('sr-only');
>>>>>>> d5c005466fa0e36611de516a095ef3bea919e4eb
>>>>>>> 03f7c4cf0848e5e0545cfb8364df5aefc1dcf1f6
		return;
	}
	else
	{
		var $menuBg = $('#menu_bg')
<<<<<<< HEAD
		var $dep2Group = $('.dep2-group')
=======
<<<<<<< HEAD
		var $dep2Group = $('.dep2-group')
=======
		var $dep2Group = $gnb.find('.dep2-group');
>>>>>>> d5c005466fa0e36611de516a095ef3bea919e4eb
>>>>>>> 03f7c4cf0848e5e0545cfb8364df5aefc1dcf1f6
	}

	$gnb.on('mouseenter', function()
	{
		$menuBg.addClass('active');
		$dep2Group.removeClass('sr-only');
	}).on('mouseleave', function()
	{
		$menuBg.removeClass('active');
		$dep2Group.addClass('sr-only');
	});
});