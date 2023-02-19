const form = document.querySelector(".login form"),
  continueBtn = form.querySelector(".button button"),
  errorTxt = form.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest(); //xml object
  xhr.open("POST", "../php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
          let data = xhr.response;
          // console.log(data);
        if (data == "success") {
          location.href = "user.php";
        } else {
          errorTxt.style.display = "block";
          errorTxt.textContent = data; //errorTxt.innerHTML = data;
        }
      }
    }
  };
  // send data through ajax to php
  let formData = new FormData(form);
  xhr.send(formData);
};
