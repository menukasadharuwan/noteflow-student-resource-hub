const nav_menu_icon =
    document.getElementById("menu-icon");

const navbar_links =
    document.getElementById("navbar-links");


if (nav_menu_icon && navbar_links) {

    nav_menu_icon.addEventListener("click", () => {

        if (
            navbar_links.style.display === "block"
        ) {

            navbar_links.style.display = "none";

            nav_menu_icon.src =
                "/noteflow-student-resource-hub/images/icons/menu.svg";

        } else {

            navbar_links.style.display = "block";

            nav_menu_icon.src =
                "/noteflow-student-resource-hub/images/icons/Cansal.svg";

            nav_menu_icon.style.width =
                "35px";

        }

    });

}


// Go to home page when click logo

const logo_button =
    document.getElementById("logo");


if (logo_button) {

    logo_button.addEventListener("click", () => {

        window.location.href =
            "/noteflow-student-resource-hub/index.php";

    });

}


// Home page search

const homeSearchForm =
    document.getElementById("homeSearchForm");

const homeSearchInput =
    document.getElementById("homeSearchInput");


if (
    homeSearchForm &&
    homeSearchInput
) {

    homeSearchForm.addEventListener(
        "submit",
        function (event) {

            event.preventDefault();


            const search =
                homeSearchInput.value.trim();


            if (search === "") {

                window.location.href =
                    "includes/filter.php";

                return;

            }


            window.location.href =
                "includes/filter.php?search=" +
                encodeURIComponent(search);

        }
    );

}