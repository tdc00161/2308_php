-- user insert

INSERT INTO user(u_id, u_pw, u_name)
VALUES('admin', 'MTIzNDU2Nzg=' , '관리자')
,('user1', 'MTIzNDU2Nzg=' , '유저1');

-- board TABLE insert
INSERT INTO board(u_pk, b_type, b_title, b_content)
VALUES('1', '0', '관리자가 쓴 제목1', '관리자가 쓴 내용1')
,('1', '0', '관리자가 쓴 제목2', '관리자가 쓴 내용2')
,('2', '1', '유저1이 쓴 제목1', '유저1이 쓴 내용1')
;

INSERT INTO boardname(b_type, b_name)
VALUES('0', '자유게시판')
,('1', '자유게시판')
;

commit;