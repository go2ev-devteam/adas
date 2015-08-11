$(document).ready(function()
{
	var $gnb = $('#gnb');
	// var $dep2Group = $gnb.find('.dep2-group');
	var $body = $('#body');
	$body.addClass('.dep2-active');
	$gnb.on('mouseenter', 'a', function()
	{
		$body.addClass('dep2-active');
		var $this = $(this);
	})
	.on('mouseleave', function()
	{
		console.log('on111');
	});

	$body.on('mouseenter', function()
	{
		console.log('on Body');
	})
});