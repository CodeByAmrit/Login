

function userOption(id) {
    console.log(id);

    if (document.getElementById(id).style.display === "none") {
        document.getElementById(id).style.display = "block";
    } else {
        document.getElementById(id).style.display = "none";
    }
}

function userOptionClose(id) {
    document.getElementById(id).style.display = "none";
}


function closeUpload(self) {
    document.getElementById(self).style.display = 'none';
}
function showUpload(self) {
    document.getElementById(self).style.display = 'flex';
}


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text/html", ev.target.id);
}

function drop(ev) {
    console.log("Dropped");
    ev.preventDefault();

    // Get the dropped files
    var files = ev.dataTransfer.files;

    // Check if any files were dropped
    if (files.length > 0) {
        var file = files[0];

        // Check if the dropped file is an image
        if (file.type.match('image.*')) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('FinalUpload').disabled = false;
                // Display the image preview
                document.getElementById('selectedImg').src = e.target.result;
                // Set the dropped image URL as the value of the input type="image"
                var imageInput = document.getElementById('img');
                imageInput.value = e.target.result;
            };

            // Read the dropped image file as a data URL
            reader.readAsDataURL(file);
        } else {
            console.log('Please drop a valid image file.');
        }
    }
}


function readURL(input) {
    if (input.files && input.files[0]) {
        document.getElementById('FinalUpload').disabled = false;
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById("selectedImg").src = e.target.result;
            // $('selectedImg').width(150).height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function submitForm() {

    // Get the form element by its ID
    var form = document.getElementById("form1");

    // Simulate form submission
    form.submit();
}

document.addEventListener('DOMContentLoaded', function () {

});

