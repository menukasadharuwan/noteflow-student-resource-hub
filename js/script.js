const nav_menu_icon = document.getElementById("menu-icon");
const navbar_links = document.getElementById("navbar-links");

nav_menu_icon.addEventListener("click",()=>{
    
    if(navbar_links.style.display == "block"){
        navbar_links.style.display = "none";
        nav_menu_icon.src = "../images/icons/menu.svg";
    }else{
        navbar_links.style.display = "block";
        nav_menu_icon.src = "../images/icons/Cansal.svg";
        nav_menu_icon.style.width = "35px"
        
    }
})


//goto home page when click logo
const logo_button = document.getElementById("logo");

logo_button.addEventListener("click",()=>{
    window.location.href = "/noteflow-student-resource-hub/index.php"
})