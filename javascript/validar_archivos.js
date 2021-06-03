function fileValidation(){

    var fileInput = document.getElementById('archivo');

    var filePath = fileInput.value;

    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;

    if(!allowedExtensions.exec(filePath)){

        alert('Error: elige estos tipos de archivos .jpeg/.jpg/.png/.gif');

        fileInput.value = '';

        return false;
    }
}


