const input1 = document.getElementById('input1');
const input2 = document.getElementById('input2');
const input3 = document.getElementById('input3');
const input4 = document.getElementById('input4');

const div1 = document.getElementById('label1');
const div2 = document.getElementById('label2');
const div3 = document.getElementById('label3');
const div4 = document.getElementById('label4');

const form2 = document.getElementById('form2');
const form1 = document.getElementById('form1');


function createFolder() {
    alert("Function test")
}

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
    var passwordInput = document.getElementById('input2');
    var showPasswordIcon = document.getElementById('showPassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showPasswordIcon.src = 'img/eyeShow.png';
    } else {
        passwordInput.type = 'password';
        showPasswordIcon.src = 'img/eyeClose.png';
    }
}






input1.addEventListener('focus', () => {
    div1.style.color = '#0072d9';
    div1.style.marginTop = 0;
    div1.style.borderColor = '#0072d9';
});

input1.addEventListener('blur', () => {
    if (input1.value === '') {
        div1.style.marginTop = '26px';
    }
    div1.style.color = '#797575';
    div1.style.borderColor = '#0072d9';
});

input2.addEventListener('focus', () => {

    div2.style.color = '#0072d9';
    div2.style.marginTop = 0;

});
input2.addEventListener('blur', () => {
    if (input2.value === '') {
        div2.style.marginTop = '26px';
    }
    div2.style.color = '#797575';
    div2.style.borderColor = '#0072d9';

});
input3.addEventListener('focus', () => {

    div3.style.color = '#0072d9';
    div3.style.marginTop = 0;

});
input3.addEventListener('blur', () => {
    if (input3.value === '') {
        div3.style.marginTop = '26px';
    }
    div3.style.color = '#797575';
    div3.style.borderColor = '#0072d9';

});

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
