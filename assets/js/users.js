const searchBar = document.querySelector(".users .search input"),
  searchBtn = document.querySelector(".users .search button"),
  chatList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle('active');
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

// search bar
searchBar.addEventListener('keyup', (e) => {
    e.preventDefault();
    let searchTerm = searchBar.value;
    // set active when searching
    if (searchTerm != "") {
        searchBar.classList.add('active');
    } else {
        searchBar.classList.remove('active');
    }
    // start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/search.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatList.innerHTML = data;
            }
        }
    };
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
});

setInterval(() => {
    // start ajax
    let xhr = new XMLHttpRequest;
    xhr.open("GET", "../php/users.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchBar.classList.contains('active')) { // if searchbar is not active
                   chatList.innerHTML = data;  //show all chats
                } else {
                     
                }
            }
            
        }
    }
    xhr.send()
}, 500); // run every 500ms