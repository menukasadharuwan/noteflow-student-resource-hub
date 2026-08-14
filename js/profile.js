const logoutButton = document.getElementById("logout-btn");

logoutButton.addEventListener("click", function (event) {

    const confirmLogout = confirm(
        "Are you sure you want to logout?"
    );

    if (!confirmLogout) {
        event.preventDefault();
    }

});

//nav bar javascript

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