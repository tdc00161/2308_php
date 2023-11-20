// AJAX

function getItem() {
    fetch('http://localhost:8000/api/item')
    .then(a => a.json())
    // response.json() 을 보기쉽게 나열해주는 함수
    .then(b => {
        let content = b.data[0].content;
        let cp = document.createElement('p');
        cp.innerHTML = content;
        document.body.appendChild(cp);
    })
    .catch(error => console.log(error));
}

// 게시글 작성
function addItem() {
    fetch('http://localhost:8000/api/item', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ "data" : {
            "content" : "안녕하세요. 배고파요."
        }})
        // 보내줄 데이터를 바디에 담다줘야한다
        // JSON.stringify : 객체를 제이슨 형태로 변경해줌
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(err => console.log(error))
}

// 게시글 수정
function updateItem() {
    fetch('http://localhost:8000/api/item/4', {
        method: 'PUT',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ "data" : {
            "completed" : "1"
        }})

    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(err => console.log(error))
}

// 게시글 삭제
function destroyItem() {
    fetch('http://localhost:8000/api/item/1', {
        method: 'DELETE',
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(err => console.log(error))
}