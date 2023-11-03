model : D


4. DataBase
	1) user Table
		- pk, 아이디, 비밀번호, 이름, 가입일자, 수정일자, 탈퇴일자
	2) board(게시판) Table
		- pk, 유저pk, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
	3) boardname(게시판 기본 정보) Table
		- pk, 게시판타입, 게시판 이름, 