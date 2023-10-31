

const MY_URL = "https://picsum.photos/v2/list?page=2&limit=10"
const MY_IMG = document.querySelector('#btn-open');
MY_IMG.addEventListener('click', my_img);

function my_img () {
	const INPUT_URL = document.querySelector('#text');

	fetch(INPUT_URL.value.trim())
	.then( reponse => reponse.json())
	.then( data => makeImg(data))
	.catch( error => console.log(error));

	function makeImg(data) {
		data.forEach( item => {
			const MAIN = document.querySelector('#main')
			const DIV = document.createElement('div');
			const P = document.createElement('p');
			const IMG = document.createElement('img');

			P.textContent = item.id;


			IMG.setAttribute( 'src', item.download_url);
			IMG.style.width = '200px';
			IMG.style.height = '200px';

			MAIN.appendChild(DIV);
			DIV.appendChild(P);
			DIV.appendChild(IMG);
		});
	}
}