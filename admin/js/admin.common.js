$(document).ready(function()
{
	var $col1 = $('.col-1');
	var $body = $('#body');
	var $dep2Grs = $('.dep2-group');

	$body.on('mouseenter', function()
	{
		$col1.removeClass('active');
		$dep2Grs.addClass('sr-only')
	});

	$('.dep1').on('mouseenter', function()
	{

		var $this = $(this);
		var $curDep2Gr = $this.next();
		if($curDep2Gr.length>0)
		{
			$col1.addClass('active');
			$dep2Grs.each(function()
			{
				var $this =$(this);
				if($this.is($curDep2Gr))
				{
					$this.removeClass('sr-only');
				}
				else
				{
					$this.addClass('sr-only');
				}
			})
		}
		else
		{
			$col1.removeClass('active');
			$dep2Grs.addClass('sr-only')
		}
	});
});