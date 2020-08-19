window.onload = function () {
	var imgArr = document.getElementsByClassName('my__img');

	var modalWindow = document.getElementById('my__modal');
	var modalImg = document.getElementById('img01');
	var caption =document.getElementById('caption');
	var span = document.getElementById('close');
	var modalBlock = document.getElementById('modal__block');

	for(i=0;i<imgArr.length;i++){
		var picture = imgArr[i];
		picture.onclick = function(){
			openImg(this);
		}
	}
	function openImg(pic){
		modalWindow.style.display='block';
		modalBlock.style.transform = 'translateY(0%)';
		modalImg.src = pic.src;
		modalImg.alt = pic.alt;
	  caption.innerHTML = modalImg.alt;
	}

	function close(){
		modalWindow.style.display ='none';
	}
	span.onclick = function(){
		modalBlock.style.transform = 'translateY(-500%)';
		setTimeout(	close, 500);
	}
}