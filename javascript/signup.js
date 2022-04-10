// console.log("hello there");
const form = document.querySelector(".signup form"),
  continueBtn = form.querySelector(".button input"),
  errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  // Ajax call
  let xhr = new XMLHttpRequest(); // creating XML object

  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // console.log("first");
        let data = xhr.response;
        console.log(data);
        if (data == "Success") {
          location.href = "users.php";
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
        }
      }
    }
  };
  // we have to send the form data through ajax  to php
  let formData = new FormData(form); // creating new formData object
  xhr.send(formData); // sending the form data to php
};
