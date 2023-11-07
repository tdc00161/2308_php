<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="/view/css/common.css">
	<title><?php echo $this->titleBoardName ?></title>
</head>
<body class="vh-100">
	<?php require_once("view/inc/header.php"); ?>

	<div class="text-center mt-3 mb-5">
		<h1><?php echo $this->titleBoardName ?></h1>
		<svg xmlns="http://www.w3.org/2000/svg"
			 width="50"
			 height="50"
			 fill="currentColor"
			 class="bi bi-plus-circle-fill"
			 viewBox="0 0 16 16"
			 data-bs-toggle="modal" data-bs-target="#modalInsert">
			 <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
		</svg>

	</div>

	<!-- 모달 이벤트
	<div id="modal" class="displayNone">
		<div id="modalW"></div>
		<button id="btnModalClose">닫기</button>
	</div> -->
	<main>
		<?php
			foreach($this->arrBoardInfo as $item) {
		?>
			<div class="card">
				<img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : "" ?>" class="card-img-top" alt="이미지 없음">
				<div class="card-body">
					<h5 class="card-title"><?php echo $item["b_title"] ?></h5>
					<p class="card-text"><?php echo mb_substr($item["b_content"], 0, 10)."..." ?></p>
					<!-- <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> -->
					<!-- return false 는 처리 여기서 종료하겠다는 의미 -->
					<button
						class="btn btn_primary"
						onclick="openDetail(<?php echo $item['id'] ?>); return false;" 
					>상세
					</button>
				</div>
    	  	</div>
		<?php		
			}
		?>
	</main>

	<!-- Button trigger modal -->
	<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Launch demo modal
  	</button> -->

	<!-- 상세 modal -->
	<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="b_title" >개발자입니다.</h5>
			  <button type="button" onclick="closeDetailModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			  <p>작성일 : <span id="created_at"></span></p>
			  <p>수정일 : <span id="updated_at"></span></p>
			  <p id="b_content"> 안녕하세요 개발자입니다. 살려주세요 </p>
			  <img id="b_img" src="" class="card-img-top" alt="">
			</div>
			<div class="modal-footer">
			  <button type="button" onclick="closeDetailModal(); return false;" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
			</div>
		  </div>
		</div>
	  </div>

	  <!-- 작성 modal -->
	<div class="modal" id="modalInsert" tabindex="-1">
		<div class="modal-dialog">
		  <div class="modal-content">
			<form action="/board/add" method="post" enctype="multipart/form-data">
				<input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
				<div class="modal-header">
					<input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요.">
				</div>
				<div class="modal-body">
				<textarea class="form-control" name="b_content" cols="30" rows="10" placeholder="내용을 입력하세요."></textarea>
				<br><br>
				<input type="file" name="b_img" accept="image/*">
				<!-- accept="image/*" 는 이미지 파일내에 모든 확장자를 다 허용하겠다는 의미 -->
				</div>
				<div class="modal-footer">
				<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
				</div>
			</form>
		  </div>
		</div>
	  </div>

	<footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>