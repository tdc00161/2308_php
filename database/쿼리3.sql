-- 1. 짝궁의 인적사항을 사원테이블에 삽입해주세요.

INSERT INTO employees
		(emp_no
		, birth_date
		, first_name
		, last_name
		, gender
		, hire_date
		)

VALUE (
		500002
		, 20020329
		, 'Gwan-ho'
		, 'Kim'
		, 'M'
		,	20230927
		); 


-- 2. 1번에서 삽입한 짝궁의 월급을 삽입해주세요.

INSERT INTO salaries
		(emp_no
		, salary
		, from_date
		, to_date
		)

VALUE (
		500002
		, 5000000
		, 20230927
		, 99990101
		);

-- 3. 이름이 'Sachin'인 사람의 셩별을 'F', 생일을 1970-01-01로 변경해주세요.

INSERT



-- 4. 짝궁의 모든 정보를 삭제해 주세요.

DELETE FROM employees
WHERE emp_no = 500002;

