const fileInput = document.getElementById('fileInput');
const selectedFileText = document.getElementById('selectedFileText');

fileInput.addEventListener('change', ()=>{
	if (fileInput.files.length > 0) {
		selectedFileText.textContent = `${fileInput.files[0].name}`;
		selectedFileText.classList.remove('hidden');
	} else{
		selectedFileText.classList.add('hidden');
	}
});