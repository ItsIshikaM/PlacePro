function sendMessage() {
    var userInput = document.getElementById("user-input").value;
    var chatBox = document.getElementById("chat-box");

    chatBox.innerHTML += "<p><strong>You:</strong> " + userInput + "</p>";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chat.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            chatBox.innerHTML += "<p><strong>Bot:</strong> " + xhr.responseText + "</p>";
        }
    };
    xhr.send("message=" + userInput);

    document.getElementById("user-input").value = "";
}
