const searchInput = document.getElementById("searchInput");
const subjectFilter = document.getElementById("subjectFilter");

const cards = document.querySelectorAll(".note-card");
const count = document.getElementById("count");

function filterNotes() {

    let visible = 0;

    cards.forEach(card => {

        const title = card.querySelector("h2").textContent.toLowerCase();

        const subject = card.dataset.subject;

        const search = searchInput.value.toLowerCase();

        const selected = subjectFilter.value;

        const searchMatch = title.includes(search);

        const subjectMatch =
            selected === "all" || subject === selected;

        if(searchMatch && subjectMatch){

            card.style.display="flex";
            visible++;

        }else{

            card.style.display="none";

        }

    });

    count.innerText = visible;

}

searchInput.addEventListener("keyup",filterNotes);

subjectFilter.addEventListener("change",filterNotes);




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