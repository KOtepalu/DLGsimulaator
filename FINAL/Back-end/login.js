function KeyPress(e) {
    var kur = window.event? event : e
    if (kur.keyCode == 76 && kur.shiftKey && kur.ctrlKey){
        var password = prompt("Enter in the password")
        if (password=="1234") {
            window.location.href = "kuraator.php";
        } else {
            return
        }
    }
}

document.onkeydown = KeyPress;
