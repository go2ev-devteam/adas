<?php
if(isset($_GET['cate']) && !empty($_GET['cate']))
{
	$cate = $_GET['cate'];
}
$page_title = '관리자 : '.$cate.' 글쓰기';
include_once('../init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<div class='root-in'>
			<div class='cols'>
				<?php include_once($GP -> INC.'gnb.php'); ?>
				<div class='col-2' id='body'>
					<div class='content-head'>
						<h2><?php if(isset($_GET['cate']) && !empty($_GET['cate'])) echo strtoupper($_GET['cate']) ;?> 글 등록하기</h2>
						<p>해당 관리자 페이지의 메인 관리자는 <span>adasone@hanyang.co.kr</span>입니다</p>
					</div>
					<div class='content-row'>
						<form name='nse' action='add.post.php' method='post' class='nse-form'>
							<label for='title'><input type='text' name='title' id='title' placeholder='제 목'></label>
							<textarea name='ir1' id='ir1' class='edit-post'></textarea>
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
							<label class='submit-lbl'><input type='submit' value='완료' name='submit' class='edit-submit' onclick='submitContents(this);'></label>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>