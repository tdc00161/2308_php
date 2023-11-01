function makeImg(data) {
	data.forEach( item => {
		// 아티클관련 요소 생성
		const ARTICLE = document.createElement('article');
		const ARTICLE_ID = document.createElement('div');
		const ARTICLE_img = document.createElement('img');

		// 아클 관련 요소의 속성 및 컨텐츠 셋팅
		ARTICLE_ID.className = 'articleId';
		ARTICLE_ID.innerHTML = item.id;
		ARTICLE_IMG.setAttribute('src', item.download_url);

		// 아티클 관련 요소 구조 셋팅
		ARTICLE.appendChild(ARTICLE_ID);
		ARTICLE.appendChild(ARTICLE_IMG);
		
		const SECTION_CONTENTS = document.querySelector('.sectionContents');
		SECTION_CONTENTS.appendChild(ARTICLE);
	});
}

// 지우기버튼
const BTN_REMOVE = document.querySelector('#btnRemove');
BTN_REMOVE.addEventListener('click', );

function my_remove() {
	const SECTION_CONTENTS = document.querySelector('.sectionContents');
	SECTION_CONTENTS.innerHTML = '';
}



