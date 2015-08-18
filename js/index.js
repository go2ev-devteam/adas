$(document).ready(function()
{
	var $gnb = $('#gnb');
	var isTest = true;
	if(isTest)
	{
		var $menuBg = $('#menu_bg').addClass('active');
		var $dep2Group = $('.dep2-group').removeClass('sr-only');
		return;
	}
	else
	{
		var $menuBg = $('#menu_bg')
		var $dep2Group = $('.dep2-group')
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