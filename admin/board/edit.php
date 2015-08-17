<?php
if(isset($_GET['cate']) && !empty($_GET['cate']))
{
	$cate = $_GET['cate'];
}
$page_title = '관리자 : '.$cate.' 수정';
include_once('../_init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<div class='root-in'>
			<div class='cols'>
				<?php include_once($GP -> INC.'gnb.php'); ?>
				<div class='col-2' id='body'>
					<?php 
					include_once($GP -> INC.'content.head.php'); 
					include_once($GP -> INC.'dbconn.php');
					foreach ($_GET as $key => $value) 
					{
						if(isset($_GET[$key]) && !empty($_GET[$key]))
						{
							$$key = trim($value);
						}
					}
					$qry = "SELECT * FROM $cate WHERE `idx`='$idx'";
					$res = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
					if(mysqli_num_rows($res)==1)
					{
						$row = mysqli_fetch_assoc($res);
						$tit = $row[$cate.'_tit'];
						$content = $row[$cate.'_content'];
						$date = $row[$cate.'_date'];
					}
					?>
					<div class='content-row-group'>
						<div class='content-row'>
							<form name='nse' action='add.post.php' method='post' class='nse-form'>
								<label for='title'><input type='text' name='title' id='title' placeholder='제 목' value='<?php echo $tit; ?>'></label>
								<textarea name='ir1' id='ir1' class='edit-post'><?php echo $content; ?></textarea>
								<script type="text/javascript">
								var oEditors = [];
								nhn.husky.EZCreator.createInIFrame(
								{
									oAppRef: oEditors,
									elPlaceHolder: "ir1",
									sSkinURI: "./nse/SmartEditor2Skin.html",
									fCreator: "createSEditor2"
								});
								function submitContents(elClickedObj) 
								{
									oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []); // 에디터의 내용이 textarea에 적용됩니다.
									// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
									try 
									{
										elClickedObj.form.submit();
									}
									catch(e){};
								}
								</script> 
								<input type='hidden' name='cate' value='<?php echo $cate; ?>'>
								<input type='hidden' name='idx' value='<?php echo $idx; ?>'>
								<input type='hidden' name='date' value='<?php echo $date; ?>'>
								<input type='hidden' name='page' value='<?php echo $page; ?>'>
								<label class='submit-lbl'><input type='submit' value='완료' name='update-post' class='edit-submit' onclick='submitContents(this);'></label>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>