function ShowLogin() {
    var blanket = document.createElement("div");
    blanket.id = "blanket"
    document.body.appendChild(blanket);
    document.getElementById("loginBox").style.display = "block";
    document.getElementById("loginBox").style.opacity = "1";
    document.getElementById("loginBox").style.zIndex = "200";
    blanket.addEventListener("click", function() {HideLogin()}, false);
}

function HideLogin() {
    document.getElementById("loginBox").style.display = "hidden";
    document.getElementById("loginBox").style.opacity = "0";
    setTimeout(function(){document.getElementById("loginBox").style.zIndex = "-200";},250);
    document.body.removeChild(blanket);
}

function RegisterStudent(){
    window.location = "http://localhost:8888/299B/Pages/RegisterAsStudent.php";
}
function RegisterUni(){
    window.location = "http://localhost:8888/299B/Pages/RegisterAsUni.php";
}
function Register(){
    window.location = "http://localhost:8888/299B/Pages/RegisterAsStudent.php";
}