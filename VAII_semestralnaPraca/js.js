function checkName() {
    var name = document.getElementById('user');
    var message = document.getElementById('confirmMsg');
    var goodColor = "ForestGreen";
    var badColor = "red";
    if(name.value.length <=5)
    {
        name.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = 'Prihlasovacie meno musí obsahovať aspoň 6 znakov!';
    }
    else
    {
        name.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = 'OK';
    }
}
function checkPass() {
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('passwordCheck');
    var message = document.getElementById('confirmMessage');
    var goodColor = "ForestGreen";
    var badColor = "red";
    if (pass1.value.length <= 5) {
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = 'Heslo musí obsahovať aspoň 6 znakov!';
    } else {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = 'Heslo je dostatočne dlhé';

        if (pass1.value == pass2.value) {
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = 'Heslá sa zhodujú!';
        } else {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = 'Heslá sa nezhodujú!';
        }
    }
}