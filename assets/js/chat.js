const form = document.querySelector(".chat-area .typing-area"),
  chatField = form.querySelector(".input-field"),
  sendBtn = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault();

}

chatBox.onmouseenter = () => {
  chatBox.classList.add('active');
}
chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); //xml object
    xhr.open("POST", "../php/insert_chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          chatField.value = ""; //once messages are send, leave it blank
          if (!chatBox.classList.contains('active')) { //if chatbox is not active/not on hover
            scrollToBottom();
          }          
        }
      }
    };
    // send data through ajax
    let formData = new FormData(form);
    xhr.send(formData);
}

// get chats
setInterval(() => {
    let xhr = new XMLHttpRequest(); //xml object
    xhr.open("POST", "../php/get_chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
            let data = xhr.response;
          chatBox.innerHTML = data;
          if (!chatBox.classList.contains("active")) {
            //if chatbox is not active/not on hover
            scrollToBottom();
          }
        }
      }
    };
    // send data through ajax
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);

// scroll chats to the last
function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}