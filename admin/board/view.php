<?php
$page_title = '상세 보기';
include_once('../_init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<div class='root-in'>
			<div class='cols'>
				<?php include_once($GP -> INC.'gnb.php');

				foreach ($_GET as $key => $value) 
				{
					if(isset($_GET[$key]) && !empty($_GET[$key]))
					{
						$$key = $value;
					}
				}

				include_once($GP -> INC.'dbconn.php');
				$qry = "SELECT * FROM $cate WHERE `idx`='$idx'";
				$result = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
				if(mysqli_num_rows($result)>=1)
				{
					$row = mysqli_fetch_assoc($result);
					$tit = $row[$cate.'_tit'];
					$content = $row[$cate.'_content'];
					$date = $row[$cate.'_date'];
				}
				?>
				<div class='col-2 view' id='body'>
					<?php include_once($GP -> INC.'content.head.php'); ?>
					<div class='content-row-group'>
						<div class='content-row'>
							<h3><?php echo $tit; ?></h3>
							<div class='date-box'>
								<span>등록일 <?php echo $date;?></span>
							</div>
						</div>
						<div class='content-row'>
							<div>
								<?php
								echo $content;
								?>
							</div>
						</div>
					</div>
					<div class='content-foot'>
						<button id='btn_remove' id='btn_remove' class='btn btn-remove'>삭 제</button>
						<a href='<?php echo "edit.php?idx=$idx&cate=$cate&page=$page";?>' class='btn btn-edit'>수정하기</a>
						<a href='<?php echo "board.php?cate=$cate&page=$page";?>' class='btn btn-go-list'>목록으로</a>
					</div>
					<!-- 삭제 팝업 관련 -->
					<div class='pop-overlay' id='pop_overlay' style='display: none;'></div>
					<div class='confirm-pop' id='confirm_pop' style='display: none;'>
						<span>정말 삭제하시겠습니까?</span>
						<button id='btn_remove_yes' class='btn btn-confirm'>확 인 </button><button id='btn_remove_no' class='btn btn-confirm'>취 소</button>
					</div>
					<!-- 삭제 팝업 관련끝 -->
					<script type="text/javascript">
					$(document).ready(function()
					{
						$('#btn_remove').click(function()
						{
							var $pop_overlay = $('#pop_overlay').show();
							var $confirm_pop = $('#confirm_pop').show();
							var $body = $('body').addClass('stop-scroll');

							$('#btn_remove_yes').click(function()
							{
								$confirm_pop.hide();
								$pop_overlay.hide();
								$body.removeClass('stop-scroll');

								var datas = 
								{
									page : <?php echo $page; ?>,
									cate : '<?php echo $cate; ?>',
									idxs : <?php echo $idx; ?>
								}

								$.post('remove.post.php', datas, function(result)
								{
									var url = "<?php echo $GP -> WEBROOT.'board/board.php?cate='.$cate.'&page='.$page; ?>";
									 window.location.href= url;
								}).fail(function()
								{
									alert('Ajax Failed');
								})
							});

							$('#btn_remove_no').click(function()
							{
								$confirm_pop.hide();
								$pop_overlay.hide();
								$body.removeClass('stop-scroll');
							});
						});
					});
					</script>
				</div>
			</div>
		</div>
	</div>
</body>
</html>