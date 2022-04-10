// const searchBar = document.querySelector(".users .search input"),
//   searchBtn = document.querySelector(".users .search button"),
//   usersList = document.querySelector(".users .users-list");

// searchBtn.onclick = () => {
//   searchBar.classList.toggle("show");
//   searchBar.classList.toggle("active");
//   searchBar.focus();
//   searchBtn.classList.toggle("active");
// };

// searchBar.onkeyup = () => {
//   let searchTerm = searchBar.value;

//   let xhr = new XMLHttpRequest();
//   xhr.open("POST", "php/search.php", true);
//   xhr.onload = () => {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//       if (xhr.status === 200) {
//         // console.log("first");
//         let data = xhr.response;
//         console.log(data);
//         // usersList.innerHTML = data;
//         // if (!searchBar.classList.contains("active")) {

//         // }
//         // if (data == "Success") {
//         //   location.href = "users.php";
//         // } else {
//         //   errorText.style.display = "block";
//         //   errorText.textContent = data;
//         // }
//       }
//     }
//   };
//   xhr.setrequestHeader("Content-Type", "application/x-www-form-urlencoded");
//   xhr.send("searchTerm=" + searchTerm);
// };

// // searchBar.onkeyup = () => {
// //   let searchTerm = searchBar.value; // get search input value
// //   if (searchTerm != "") {
// //     searchBar.classList.add("active");
// //   } else {
// //     searchBar.classList.remove("active");
// //   }
// //   let xhr = new XMLHttpRequest();
// //   xhr.open("POST", "php/search.php", true);
// //   xhr.onload = () => {
// //     if (xhr.readyState === XMLHttpRequest.DONE) {
// //       if (xhr.status === 200) {
// //         let data = xhr.response;
// //         usersList.innerHTML = data;
// //       }
// //     }
// //   };
// //   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// //   xhr.send("searchTerm=" + searchTerm); // sending user search term to php file with Ajax
// // };

// setInterval(() => {
//   let xhr = new XMLHttpRequest();
//   xhr.open("GET", "php/users.php", true);
//   xhr.onload = () => {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//       if (xhr.status === 200) {
//         // console.log("first");
//         let data = xhr.response;
//         // console.log(data);
//         usersList.innerHTML = data;
//         // if (!searchBar.classList.contains("active")) {

//         // }
//         // if (data == "Success") {
//         //   location.href = "users.php";
//         // } else {
//         //   errorText.style.display = "block";
//         //   errorText.textContent = data;
//         // }
//       }
//     }
//   };
//   xhr.send();
// }, 500);

const searchBar = document.querySelector(".users .search input"),
  searchIcon = document.querySelector(".users .search button"),
  usersList = document.querySelector(".users .users-list");

searchIcon.onclick = () => {
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if (searchBar.classList.contains("active")) {
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
};

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // console.log(data);

        if (!searchBar.classList.contains("active")) {
          // if active active not containsin search bar then add this
          usersList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500);
