const nav_menu_icon = document.getElementById("menu-icon");
const navbar_links = document.getElementById("navbar-links");

nav_menu_icon.addEventListener("click", () => {
  if (navbar_links.style.display == "block") {
    navbar_links.style.display = "none";
    nav_menu_icon.src = "../images/icons/menu.svg";
  } else {
    navbar_links.style.display = "block";
    nav_menu_icon.src = "../images/icons/Cansal.svg";
    nav_menu_icon.style.width = "35px";
  }
});

//goto home page when click logo
const logo_button = document.getElementById("logo");

logo_button.addEventListener("click", () => {
  window.location.href = "../index.html";
});

//upload options

const file_upload_div = document.getElementById("dropArea");
const file_upload = document.getElementById("fileInput");
const title = document.getElementById("title");

file_upload_div.addEventListener("click", () => {
  file_upload.click();
});

file_upload.addEventListener("change", () => {
  const file = file_upload.files[0];
  if (!file) return;
  title.value = file.name;

  file_upload_div.innerHTML = `<img src="${URL.createObjectURL(file)}"
   style="width:95px; height:100%; object-fit:cover;"> `;

});

