const searchInput = document.getElementById("searchInput");
const subjectFilter = document.getElementById("subjectFilter");
const fileTypeFilter = document.getElementById("fileTypeFilter");
const sortFilter = document.getElementById("sortFilter");
const topSort = document.getElementById("topSort");
const applyFilters = document.getElementById("applyFilters");
const notesContainer = document.getElementById("notesContainer");
const count = document.getElementById("count");
const noResults = document.getElementById("noResults");
const pagination = document.getElementById("pagination");


const NOTES_PER_PAGE = 5;
let currentPage = 1;


// GET ALL CARDS


let cards = Array.from(document.querySelectorAll(".note-card"));


// FILTER FUNCTION


function getFilteredCards() {
  const search = searchInput.value.trim().toLowerCase();
  const selectedSubject = subjectFilter.value;
  const selectedType = fileTypeFilter.value;

  let filtered = cards.filter(function (card) {
    const title = card.dataset.title || "";
    const subject = card.dataset.subject || "";
    const type = card.dataset.type || "";

    // Search

    const searchMatch = title.includes(search);

    // Subject

    const subjectMatch =
      selectedSubject === "all" || subject === selectedSubject;

    // File type

    const typeMatch = selectedType === "all" || type === selectedType;

    return searchMatch && subjectMatch && typeMatch;
  });

  // SORT


  const sortValue = sortFilter.value;

  filtered.sort(function (a, b) {
    const dateA = Number(a.dataset.date);

    const dateB = Number(b.dataset.date);

    if (sortValue === "oldest") {
      return dateA - dateB;
    }

    return dateB - dateA;
  });

  return filtered;
}


// DISPLAY NOTES


function displayNotes() {
  const filtered = getFilteredCards();

  // Update count

  count.innerText = filtered.length;

  // Hide all

  cards.forEach(function (card) {
    card.style.display = "none";
  });


  // NO RESULTS


  if (filtered.length === 0) {
    noResults.style.display = "block";

    pagination.innerHTML = "";

    return;
  }

  noResults.style.display = "none";


  // PAGINATION


  const totalPages = Math.ceil(filtered.length / NOTES_PER_PAGE);

  // Make sure page is valid

  if (currentPage > totalPages) {
    currentPage = totalPages;
  }

  const start = (currentPage - 1) * NOTES_PER_PAGE;

  const end = start + NOTES_PER_PAGE;

  const pageCards = filtered.slice(start, end);


  // SHOW CURRENT PAGE


  pageCards.forEach(function (card) {
    card.style.display = "flex";

    notesContainer.appendChild(card);
  });


  // CREATE PAGINATION


  createPagination(totalPages);
}


// PAGINATION


function createPagination(totalPages) {
  pagination.innerHTML = "";

  if (totalPages <= 1) {
    return;
  }

  // Previous

  const previous = document.createElement("button");
  previous.innerHTML = "&lt;";
  previous.disabled = currentPage === 1;
  previous.addEventListener("click", function () {
    if (currentPage > 1) {
      currentPage--;

      displayNotes();

      scrollToNotes();
    }
  });

  pagination.appendChild(previous);

  // Page numbers

  for (let i = 1; i <= totalPages; i++) {
    const button = document.createElement("button");

    button.innerText = i;

    if (i === currentPage) {
      button.classList.add("active");
    }

    button.addEventListener("click", function () {
      currentPage = i;

      displayNotes();

      scrollToNotes();
    });

    pagination.appendChild(button);
  }

  // Next

  const next = document.createElement("button");

  next.innerHTML = "&gt;";

  next.disabled = currentPage === totalPages;

  next.addEventListener("click", function () {
    if (currentPage < totalPages) {
      currentPage++;

      displayNotes();

      scrollToNotes();
    }
  });

  pagination.appendChild(next);
}


// SCROLL TO NOTES


function scrollToNotes() {
  const content = document.querySelector(".content");

  if (content) {
    content.scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  }
}


// SEARCH


searchInput.addEventListener("input", function () {
  currentPage = 1;

  displayNotes();
});


// SUBJECT


subjectFilter.addEventListener("change", function () {
  currentPage = 1;

  displayNotes();
});


// FILE TYPE


fileTypeFilter.addEventListener("change", function () {
  currentPage = 1;

  displayNotes();
});


// SORT


sortFilter.addEventListener("change", function () {
  topSort.value = sortFilter.value;

  currentPage = 1;

  displayNotes();
});


// TOP SORT


topSort.addEventListener("change", function () {
  sortFilter.value = topSort.value;

  currentPage = 1;

  displayNotes();
});


// APPLY BUTTON


applyFilters.addEventListener("click", function () {
  currentPage = 1;

  displayNotes();
});


// INITIAL LOAD


displayNotes();
