num1 = Math.floor((Math.random() * 5) + 1);
num2 = Math.floor((Math.random() * 5) + 1);
document.getElementById('captcha').innerHTML = num1 + ' + ' + num2 + ' = ';
document.getElementsByName('captcha-solution')[0].value = num1 + num2;