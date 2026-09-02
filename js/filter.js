const searchInput =
    document.getElementById("searchInput");

const subjectFilter =
    document.getElementById("subjectFilter");

const fileTypeFilter =
    document.getElementById("fileTypeFilter");

const sortFilter =
    document.getElementById("sortFilter");

const topSort =
    document.getElementById("topSort");

const applyFilters =
    document.getElementById("applyFilters");

const notesContainer =
    document.getElementById("notesContainer");

const count =
    document.getElementById("count");

const noResults =
    document.getElementById("noResults");

const pagination =
    document.getElementById("pagination");


const NOTES_PER_PAGE = 4;

let currentPage = 1;


const cards =
    Array.from(
        document.querySelectorAll(".note-card")
    );


// Get filtered cards

function getFilteredCards() {

    const search =
        searchInput.value
            .trim()
            .toLowerCase();


    const selectedSubject =
        subjectFilter.value;


    const selectedType =
        fileTypeFilter.value;


    let filtered =
        cards.filter(function (card) {


            const title =
                card.dataset.title || "";


            const subject =
                card.dataset.subject || "";


            const type =
                card.dataset.type || "";


            const searchMatch =
                title.includes(search);


            const subjectMatch =
                selectedSubject === "all" ||
                subject === selectedSubject;


            const typeMatch =
                selectedType === "all" ||
                type === selectedType;


            return (
                searchMatch &&
                subjectMatch &&
                typeMatch
            );

        });


    // Sort notes

    const sortValue =
        sortFilter.value;


    filtered.sort(function (a, b) {


        const dateA =
            Number(
                a.dataset.date
            );


        const dateB =
            Number(
                b.dataset.date
            );


        if (
            sortValue === "oldest"
        ) {

            return dateA - dateB;

        }


        return dateB - dateA;

    });


    return filtered;

}


// Display notes

function displayNotes() {


    const filtered =
        getFilteredCards();


    // Hide all cards

    cards.forEach(function (card) {

        card.style.display = "none";

    });


    // No results

    if (
        filtered.length === 0
    ) {

        noResults.style.display =
            "block";


        count.innerText =
            "0";


        pagination.innerHTML =
            "";


        return;

    }


    noResults.style.display =
        "none";


    // Calculate pages

    const totalPages =
        Math.ceil(
            filtered.length /
            NOTES_PER_PAGE
        );


    // Check current page

    if (
        currentPage < 1
    ) {

        currentPage = 1;

    }


    if (
        currentPage > totalPages
    ) {

        currentPage =
            totalPages;

    }


    // Calculate start

    const start =
        (currentPage - 1) *
        NOTES_PER_PAGE;


    // Calculate end

    const end =
        start +
        NOTES_PER_PAGE;


    // Get page cards

    const pageCards =
        filtered.slice(
            start,
            end
        );


    // Show page cards

    pageCards.forEach(function (card) {


        card.style.display =
            "flex";


        notesContainer.appendChild(
            card
        );

    });


    // Show number of cards

    count.innerText =
        pageCards.length;


    // Create pagination

    createPagination(
        totalPages
    );

}


// Create pagination

function createPagination(
    totalPages
) {


    pagination.innerHTML =
        "";


    if (
        totalPages <= 1
    ) {

        return;

    }


    // Previous button

    const previous =
        document.createElement(
            "button"
        );


    previous.innerHTML =
        "&lt;";


    previous.classList.add(
        "page-btn"
    );


    previous.disabled =
        currentPage === 1;


    previous.addEventListener(
        "click",
        function () {


            if (
                currentPage > 1
            ) {


                currentPage--;


                displayNotes();


                scrollToNotes();

            }

        }
    );


    pagination.appendChild(
        previous
    );


    // Page numbers

    for (
        let i = 1;
        i <= totalPages;
        i++
    ) {


        const button =
            document.createElement(
                "button"
            );


        button.innerText =
            i;


        button.classList.add(
            "page-btn"
        );


        if (
            i === currentPage
        ) {

            button.classList.add(
                "active"
            );

        }


        button.addEventListener(
            "click",
            function () {


                currentPage =
                    i;


                displayNotes();


                scrollToNotes();

            }
        );


        pagination.appendChild(
            button
        );

    }


    // Next button

    const next =
        document.createElement(
            "button"
        );


    next.innerHTML =
        "&gt;";


    next.classList.add(
        "page-btn"
    );


    next.disabled =
        currentPage === totalPages;


    next.addEventListener(
        "click",
        function () {


            if (
                currentPage <
                totalPages
            ) {


                currentPage++;


                displayNotes();


                scrollToNotes();

            }

        }
    );


    pagination.appendChild(
        next
    );

}


// Scroll to notes

function scrollToNotes() {


    const content =
        document.querySelector(
            ".content"
        );


    if (content) {


        content.scrollIntoView({

            behavior: "smooth",

            block: "start"

        });

    }

}


// Search

searchInput.addEventListener(
    "input",
    function () {


        currentPage = 1;


        displayNotes();

    }
);


// Subject

subjectFilter.addEventListener(
    "change",
    function () {


        currentPage = 1;


        displayNotes();

    }
);


// File type

fileTypeFilter.addEventListener(
    "change",
    function () {


        currentPage = 1;


        displayNotes();

    }
);


// Sort

sortFilter.addEventListener(
    "change",
    function () {


        topSort.value =
            sortFilter.value;


        currentPage = 1;


        displayNotes();

    }
);


// Top sort

topSort.addEventListener(
    "change",
    function () {


        sortFilter.value =
            topSort.value;


        currentPage = 1;


        displayNotes();

    }
);


// Apply filters

applyFilters.addEventListener(
    "click",
    function () {


        currentPage = 1;


        displayNotes();

    }
);


// Initial load

displayNotes();