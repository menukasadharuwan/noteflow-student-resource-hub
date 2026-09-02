const logoutButton =
    document.getElementById("logout-btn");


if (logoutButton) {

    logoutButton.addEventListener(
        "click",
        function (event) {

            const confirmLogout =
                confirm(
                    "Are you sure you want to logout?"
                );


            if (!confirmLogout) {

                event.preventDefault();

            }

        }
    );

}


// Delete note confirmation

const deleteForms =
    document.querySelectorAll(
        ".delete-note-form"
    );


deleteForms.forEach(function (form) {

    form.addEventListener(
        "submit",
        function (event) {

            const confirmDelete =
                confirm(
                    "Are you sure you want to delete this PDF?"
                );


            if (!confirmDelete) {

                event.preventDefault();

            }

        }
    );

});


// Navbar javascript

const nav_menu_icon =
    document.getElementById("menu-icon");

const navbar_links =
    document.getElementById("navbar-links");


if (
    nav_menu_icon &&
    navbar_links
) {

    nav_menu_icon.addEventListener(
        "click",
        () => {

            if (
                navbar_links.style.display ===
                "block"
            ) {

                navbar_links.style.display =
                    "none";

                nav_menu_icon.src =
                    "../images/icons/menu.svg";

            } else {

                navbar_links.style.display =
                    "block";

                nav_menu_icon.src =
                    "../images/icons/Cansal.svg";

                nav_menu_icon.style.width =
                    "35px";

            }

        }
    );

}