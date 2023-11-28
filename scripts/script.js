

const form2 = document.getElementById('form2');
const form1 = document.getElementById('form1');



function sendOtp() {
    if (input1.value === '' || input2.value === '')  {
        alert("Please Enter id and password");
    }
    else{
        form1.style.display = 'none';
        form2.style.display = 'block';
        input4.value = input1.value;
        input4.addEventListener('focus', () => {

            div4.style.color = '#0072d9';
            div4.style.marginTop = 0;
        
        });
        input4.addEventListener('blur', () => {
            if (input4.value === '') {
                div4.style.marginTop = '26px';
            }
            div4.style.color = '#797575';
            div4.style.borderColor = '#0072d9';
        
        });
    }
}

function backBtn() {
    form2.style.display = 'none';
    form1.style.display = 'block';
}


function validateOTP(input) {
    // Allow only numeric input
    input.value = input.value.replace(/[^0-9]/g, '');

    // Limit input to 6 digits
    if (input.value.length > 6) {
        input.value = input.value.slice(0, 6);
    }
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById('input9');
    var showPasswordIcon = document.getElementById('showPassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showPasswordIcon.src = 'img/eyeShow.png';
    } else {
        passwordInput.type = 'password';
        showPasswordIcon.src = 'img/eyeClose.png';
    }
}



function onInputFocus(objLabel) {
    objLabel.style.color = '#0072d9';
    objLabel.style.marginTop = 0;
    objLabel.style.borderColor = '#0072d9';
    
}

function onInputBlur(objLabel, obj) {
    if (obj.value === '') {
        objLabel.style.marginTop = '26px';
    }
    objLabel.style.color = '#797575';
    objLabel.style.borderColor = '#0072d9';
    
}

