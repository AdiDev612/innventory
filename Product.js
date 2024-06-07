$(document).ready(function(){
    var i = 1;
    $('#add').click(function(){
    i++;
    $('.scrollbox-inner').append('<div class="box2"> <img id="imageToChange" src="img/add-button.png"> <input type="file" id="fileInput" style="display: none;">');
    });
   });

   const img = document.getElementById('imageToChange');
const fileInput = document.getElementById('fileInput');

img.addEventListener('click', () => {
  fileInput.click();
});

fileInput.addEventListener('change', () => {
  const file = fileInput.files[0];
  const reader = new FileReader();

  reader.onload = (event) => {
    img.src = event.target.result;
  };

  reader.readAsDataURL(file);
});
    
    