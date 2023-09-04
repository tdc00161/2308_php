-- 
-- SELECT [컬 럼 명 ] FROM [테 이 블 명];
-- SELECT * FROM employees ;

-- SELECT * FROM dept_emp;
-- 
-- SELECT first_name, last_name FROM employees;

SELECT emp_no, title FROM titles;

-- SELECT [컬 럼 명 ] FROM [테 이 블 명] WHERE [쿼리 조건 ];

SELECT * FROM employees WHERE emp_no <= 10009;

SELECT * FROM employees WHERE first_name = 'Mary';
SELECT * FROM employees WHERE birth_date >= 19600101;

-- and 연 산 자(둘 다 만족)
SELECT *
FROM employees
WHERE first_name = 'Mary'
  AND last_name = 'Piazza';
  
-- or 연 산 자(둘 중 하나만 만족)

-- BETWEEN 연 산 자(~와 ~사이에 값 만족/속도가 느려서 현업에서는 사용을 잘 안함)

SELECT *
FROM employees
WHERE emp_no = 10005
   or emp_no = 10010;
   
-- IN 연 산 자(1번, 2번) 1번 만족값, 2번 만족값 불러옴/속도가 느려서 현업에서는 사용을 잘 안함)

-- LIKE('%') 연산자 (일부 철자만으로 만족값을 조회가능/일부 철자 외에 검색원하는 곳 위치에 % 붙이기)

SELECT *
FROM employees
WHERE first_name LIKE('%Ge');

SELECT *
FROM titles
WHERE title LIKE('%staff%');

-- _ 연산자 ( 언더바가 들어간 갯수만큼 앞에 철자가 조회됨)

-- order by 값 로 정렬하여 조회(ASC: 오름차순 DESC: 내림차순)
-- 오름차순 정렬을 여러값에 하고 싶을때 order by( 1차 정렬값, 2차 정렬값 '''등)

SELECT *
FROM employees
ORDER BY birth_date DESC;

SELECT *
FROM employees
ORDER BY last_name DESC, first_name, birth_date ASC;

-- DISTINCT 연산자 (중복값을 제외하고 조회. SELECT 뒤에 값설정)
SELECT DISTINCT emp_no
FROM salaries;

-- 값 추가하는 연산자
-- INSERT INTO salaries VALUES (10001, 60117, 19860627, 19870626);
-- COMMIT;



-- 5. 집계함수(함수란? 미리 서식이 만들어져있고 그걸 사용하는 것)

SELECT SUM(salary)-- (SUM : 합, MAX : 최대, MIN : 최소, AVG : 평균)
FROM salaries;

SELECT *
FROM salaries
WHERE to_date >= 20230901;

-- COUNT 함수 : 계수하는 값
SELECT COUNT(emp_no) FROM employees;

SELECT COUNT(*)
FROM employees
WHERE first_name = 'Mary';

-- 그룹으로 묶어서 조회 : GROUP BY 컬럼명 [HAVING 집계함수조건]

SELECT title, COUNT(title)
FROM titles
GROUP BY title;

-- 원래 나오는 값을 가정의 명칭으로 변경하고 싶을때 'AS' 연산자 사용 - COUNT 뒤에 사용


-- CONCAT() : 문자열을 합쳐 주는 함수
SELECT CONCAT(first_name, ' ', last_name) AS FULL_NAME
FROM employees;



SELECT emp_no, birth_date, CONCAT(first_name, ' ', last_name) AS FULL_NAME
FROM employees
WHERE gender = 'F'
ORDER BY FULL_NAME ASC;

-- LIMIT 연산자 출력 개수를 제한하여  보여주는 값
-- LIMIT n : n개 만큼 출력
-- LIMIT n OFFSET n : n번째 부터 n개까지의 갯수를 보여주는 값

SELECT *
FROM salaries
WHERE TO_date >= 20230901
ORDER BY salary DESC
LIMIT 5;


SELECT *
FROM dept_manager;



SELECT emp_no, CONCAT(first_name, ' ',last_name) AS FULL_NAME
FROM employees
WHERE emp_no=(
SELECT emp_no
FROM salaries
WHERE to_date >= 20230901
ORDER BY salary DESC LIMIT 1);



-- <서브쿼리>
-- SELECT
-- FROM
-- WHERE 값 = (
-- SELECT
-- FROM
-- 찾고싶은 값관련 코드);
-- 
-- IN - 복수이상 값 조회시, ALL = AND, ANY = OR 값과 동일


SELECT emp_no, birth_date
FROM employees
WHERE emp_no IN (
SELECT emp_no
FROM titles
WHERE to_date >= 20230901
  and title = 'Senior Engineer');


-- 다중열 서브쿼리
SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
	SELECT dept_no, emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);

-- SELECT *
-- FROM dept_manager
-- WHERE to_date >= NOW(); -- NOW() : 지금 날짜를 알려주는 함수


-- SELECT 절에 사용하는 서브 쿼리
-- 사원의 현재 급여, 현재 급여를 받기시작한 일자, 풀네임을 출력해주세요.

SELECT
   sal.salary
   , sal.from_date
   , (
   	SELECT CONCAT(first_name, ' ', emp.last_name) AS full_name
   	FROM employees AS emp
   	WHERE sal.emp_no = emp.emp_no
   ) AS full_name
FROM salaries AS sal
WHERE sal.to_date >= NOW();

-- FROM 절에 오는 서브쿼리
SELECT emp.*
FROM (
SELECT *
FROM employees
WHERE gender = 'M'
) AS emp;




-- 


-- 1.
SELECT *
FROM titles;

-- 2.
SELECT emp_no
FROM salaries
WHERE salary <=60000;

-- 3.
SELECT emp_no
FROM salaries
WHERE salary >=60000
  AND salary <=70000;

-- 4.
SELECT *
FROM employees
WHERE emp_no = 10001
   OR emp_no = 10005;
   
-- 5.
SELECT emp_no, title
FROM titles
WHERE title
LIKE('%Engineer%');

-- 6.
SELECT *
FROM employees
ORDER BY first_name ASC;

-- 7.
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no;

-- 8.
SELECT emp_no, AVG(salary)
FROM salaries
WHERE s
  (SELECT salary
	  FROM salaries
	 WHERE salary >=30000
  	   AND salary <=50000)
GROUP BY Salary;

-- group by 절 HVING 을 할경우 그룹바이에 대한 조건만 설정됨
-- 그룹바이에 WHERE 절을 사용할 수 없음
-- 쿼리 실행 우선 순위 -> WHERE -> GROUP BY -> HAVING 순임

-- 9.
SELECT emp_no, last_name, first_name, gender
FROM employees
(SELECT AVG(salary)
FROM salaries
GROUP BY salary)
WHERE salary>=70000;

-- 10.
SELECT emp_no, first_name
FROM employees
WHERE emp_no IN (
SELECT emp_no
FROM titles
WHERE title = 'Senior Engineer'
  AND to_date >= 20230904);
  
  
  
  
--   INSERT 문
-- INSERT INTO 테이블 명[(속성1, 속성2)]  // []의미는 생략이 가능하다
-- VALUES (속성값1, 속성값2)

-- 50000 신규회원
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,NOW()
	,'Meerkat'
	,'Green'
	,'M'
	,NOW()
);

SELECT *
FROM employees
WHERE emp_no >= 500000;

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,500000
	,NOW()
	,99990101
);

SELECT *
FROM salaries
WHERE emp_no >= 500000;

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d005'
	,NOW()
	,99990101
);

SELECT *
FROM dept_emp
WHERE emp_no >= 500000;




INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)

VALUES (
	500000
	,'staff'
	,20230904
	,99990101
);

SELECT *
FROM titles
WHERE emp_no >= 500000;





-- UPDATE 문
-- UPDATE 테이블명
-- SET (컬럼1 = 값1, 컬럼 2 = 값 2)
-- WHERE 조건
-- ** 추가설명 :  조건을 적지 않을 경우 모든 레코드가 수정됩니다.
-- 					실수를 방지하기위해 WHERE절을 먼저 작성하고 SET절을 작성하는 것

SHOW VARIABLES LIKE 'autocommit%';


UPDATE titles
SET title = 'CEO'
WHERE emp_no = 500000;


SELECT * FROM titles WHERE emp_no = 500000;



-- 테이블이 다르기에 값을 각각 설정해서 변경해줘야 함.
UPDATE titles, salaries
SET title = 'staff', salary = 25000
WHERE emp_no = 500000;

-- DELETE의 기본구조 (삭제)
-- DELETE FROM 테이블명
-- WHERE 조건
-- ** 추가설명 : 조건을 적지않을 경우 모든 레코드가 삭제됩니다.
-- 			실수를 방지하기위해 WHERE절이 먼저 작성하고 DELETE FROM 절을 작성
			
INSERT INTO departments (
	dept_no
	,dept_name
)

VALUES (
	'd010'
	,'new'
);

SELECT * FROM departments WHERE dept_no = 'd010';



DELETE FROM departments
WHERE dept_no = 'd010';

SELECT * FROM departments WHERE dept_no = 'd010';




DELETE FROM employees
WHERE emp_no >=500001;


SELECT * FROM employees WHERE emp_no >= 500001;



-- 1. 데이터 타입 변환 함수
-- ** 둘 다 같은 기능을 합니다. **
-- CAST( 값 AS 데이터형식)
-- CONVERT( 값, 데이터형식 )
SELECT CAST(1234 AS CHAR(4));
SELECT CONVERT(1234, CHAR(4));

-- 2. 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT IF(0 = 1, '참', '거짓');

SELECT emp_no, IF(e.gender = 'M', '남자', '여자') AS gender
FROM employees e;

--  IFNULL(수식1, 수식2) : 수식1이 NULL이면 수식2를 출력하고,
-- 									수식1이 NULL이 아니면 수식 1를 반환

SELECT IFNULL('11', '수식2');

SELECT emp_no
	,title
	,IFNULL(to_date, DATE(NOW())) AS to_date
FROM titles
ORDER BY emp_no DESC;

-- NULLIF(수식1,수식2) : 수식1과 2가 같으면 NULL을 반환하고,
-- 							다르면 수식 1을 반환합니다.
							
SELECT NULLIF(1,1);
SELECT NULLIF(1,2);

