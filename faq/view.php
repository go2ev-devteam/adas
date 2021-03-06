<?php
$page_title = '상세 보기';
include_once('../_init.php');
include_once($GP -> INC.'doc.head.php');
if(isset($_GET['idx']) && !empty($_GET['idx']))
{
	$idx = trim($_GET['idx']);
	$page = trim($_GET['page']);
	$cate = trim($_GET['cate']);
}
?>
<body>
	<div class='root'>
		<?php 
		include_once($GP -> INC.'accessibility.php');
		include_once($GP -> INC.'head.php');
		?>
		<!--↑↑ Header ↑↑-->
		<!--↓↓ Body & Content ↓↓-->
		<div class='body faq view' id='body'>
			<div class='contents' id='contents'>
				<h2>FAQ</h2>
				<div class='content-head'>
					<div class='gutter'>
						<h3>자주 찾는 질문 TOP 20</h3>
						<span class='h3-comment'>제품사용에 필요한 설치메뉴얼, PC뷰어, 어플리케이션 등을 다운받을 수 있습니다.<br />동영상 재생 관련 문제가 생겼을 시에는 FAQ를 확인하여 주세요. </span>
						<?php
						include_once($GP -> INC.'dbconn.php');

						$qry = "SELECT * FROM $cate WHERE `idx`='$idx'";
						$result = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
						if(mysqli_num_rows($result)>=1)
						{
							$row = mysqli_fetch_assoc($result);
							$tit = $row[$cate.'_tit'];
							$content = $row[$cate.'_content'];
							$date = $row[$cate.'_date'];
							$read_cnt = $row['read_cnt'];
						}
						?>
					</div>
				</div>
				<div class='content-row first-row'>
					<div class='gutter'>
						<div class='row row-head'>
							<h4><span class='row-idx'><?php echo $idx; ?></span><?php echo $tit; ?></h4>
						</div>
						<div class='row row-head-info row-last'>
							<span><strong>작성자</strong>관리자</span>
							<span><strong>등록일</strong><?php echo $date; ?></span>
							<span class='tar'><strong>조회수</strong><?php echo $read_cnt; ?></span>
						</div>
					</div>
				</div>
				<div class='content-row'>
					<div class='gutter'>
						<div class='row-content'>
							<?php
								echo $content;
								mysqli_close($dbc);
							?>
						</div>
						<a href='<?php echo $GP -> WEBROOT."faq/faq.php?page=$page";?>' class='btn btn-go-list'>목록</a>
					</div>
				</div>
			</div>
		</div>
		<!--↑↑ Body ↑↑-->
		<?php include_once($GP -> INC.'foot.php'); ?>
		<!--↑↑ Foot ↑↑-->
	</div>
</body>
</html>