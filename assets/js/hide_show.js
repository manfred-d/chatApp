// const form = document.querySelector("form");
const passfield = document.querySelector(".form input[type='password']");
const togglebtn = document.querySelector(".form .name-details .field i");

togglebtn.addEventListener('click', (e) =>{
    e.preventDefault();

    if(passfield.type == "password"){
        passfield.type = "text";
    }else{
        passfield.type = "password";
    }
})