
const fileUploadDiv = document.getElementById("dropArea");
const fileUpload = document.getElementById("fileInput");

const browseBtn = document.getElementById("browseBtn");
const fileName = document.getElementById("fileName");

const titleInput = document.getElementById("title");
const descriptionInput = document.getElementById("description");

const subjectSelect = document.getElementById("subject");
const newSubjectInput = document.getElementById("newSubject");

const tagsInput = document.getElementById("tags");

const uploadBtn = document.getElementById("uploadBtn");
const cancelBtn = document.getElementById("cancelBtn");

const MAX_FILE_SIZE = 20 * 1024 * 1024;

console.log("upload.js loaded");


// SHOW AND HIDE NEW SUBJECT


if (subjectSelect && newSubjectInput) {
  subjectSelect.addEventListener("change", function () {
    if (subjectSelect.value === "add_new") {
      newSubjectInput.style.display = "block";
      newSubjectInput.focus();
    } else {
      newSubjectInput.style.display = "none";
      newSubjectInput.value = "";
    }
  });
}


// OPEN FILE BROWSER


if (browseBtn && fileUpload) {
  browseBtn.addEventListener("click", function (event) {
    event.stopPropagation();

    fileUpload.click();
  });
}


// CLICK UPLOAD AREA


if (fileUploadDiv && fileUpload) {
  fileUploadDiv.addEventListener("click", function (event) {
    if (event.target.closest("#browseBtn")) {
      return;
    }

    fileUpload.click();
  });
}


// DISPLAY SELECTED FILE


function displayFile(file) {
  if (!fileName || !file) {
    return;
  }

  fileName.innerHTML = `
        <div class="selected-file">
            <i class="bi bi-file-earmark-pdf"></i>
            ${escapeHtml(file.name)}
        </div>
    `;
}


// ESCAPE HTML


function escapeHtml(text) {
  const div = document.createElement("div");
  div.textContent = text;
  return div.innerHTML;
}


// HANDLE FILE


function handleFile(file) {
  if (!file) {
    return false;
  }

  // Check PDF

  const isPDF =
    file.type === "application/pdf" || file.name.toLowerCase().endsWith(".pdf");

  if (!isPDF) {
    alert("Only PDF files are allowed.");

    fileUpload.value = "";

    if (fileName) {
      fileName.innerHTML = "";
    }

    return false;
  }

  // Check size

  if (file.size > MAX_FILE_SIZE) {
    alert("File size must be less than 20MB.");

    fileUpload.value = "";

    if (fileName) {
      fileName.innerHTML = "";
    }

    return false;
  }

  // Automatically create title from file name

  const fileTitle = file.name.replace(/\.pdf$/i, "");

  if (titleInput && titleInput.value.trim() === "") {
    titleInput.value = fileTitle;
  }

  // Display file

  displayFile(file);

  return true;
}


// SELECT PDF FILE


if (fileUpload) {
  fileUpload.addEventListener("change", function () {
    const file = fileUpload.files[0];

    handleFile(file);
  });
}


// DRAG OVER


if (fileUploadDiv) {
  fileUploadDiv.addEventListener("dragover", function (event) {
    event.preventDefault();

    fileUploadDiv.classList.add("drag-over");
  });

  fileUploadDiv.addEventListener("dragleave", function () {
    fileUploadDiv.classList.remove("drag-over");
  });

  
  // DROP FILE
  

  fileUploadDiv.addEventListener("drop", function (event) {
    event.preventDefault();

    fileUploadDiv.classList.remove("drag-over");

    const files = event.dataTransfer.files;

    if (!files || files.length === 0) {
      return;
    }

    const file = files[0];

    if (!handleFile(file)) {
      return;
    }

    // Put dropped file into input

    try {
      const dataTransfer = new DataTransfer();

      dataTransfer.items.add(file);

      fileUpload.files = dataTransfer.files;
    } catch (error) {
      console.error("Could not set dropped file:", error);
    }
  });
}


// UPLOAD NOTE


if (uploadBtn) {
  uploadBtn.addEventListener("click", async function () {
    
    // Get values
    

    const file = fileUpload.files[0];
    const title = titleInput.value.trim();
    let subject = subjectSelect.value;
    const description = descriptionInput ? descriptionInput.value.trim() : "";
    const tags = tagsInput ? tagsInput.value.trim() : "";

    // New subject
    

    if (subject === "add_new") {
      subject = newSubjectInput.value.trim();
    }

    
    // Validate title
    

    if (title === "") {
      alert("Please enter a title.");
      titleInput.focus();

      return;
    }

    
    // Validate subject
    

    if (subject === "") {
      alert("Please select or enter a subject.");
      subjectSelect.focus();

      return;
    }

    
    // Validate file
    

    if (!file) {
      alert("Please select a PDF file.");
      return;
    }

    
    // Validate PDF
    

    const isPDF =
      file.type === "application/pdf" ||
      file.name.toLowerCase().endsWith(".pdf");

    if (!isPDF) {
      alert("Only PDF files are allowed.");

      return;
    }

    
    // Validate size
    

    if (file.size > MAX_FILE_SIZE) {
      alert("File size must be less than 20MB.");

      return;
    }

    
    // CREATE FORM DATA
    

    const formData = new FormData();
    formData.append("title", title);
    formData.append("subject", subject);
    formData.append("description", description);
    formData.append("tags", tags);
    formData.append("noteFile", file);

    
    // DISABLE BUTTON
    

    uploadBtn.disabled = true;

    uploadBtn.innerHTML = `
            <i class="bi bi-arrow-repeat"></i>
            Uploading...
        `;

    // SEND TO PHP
 

    try {
      const response = await fetch("uploadlogic.php", {
        method: "POST",
        body: formData,
      });

      const text = await response.text();
      console.log("RAW PHP RESPONSE:");
      console.log(text);

      
      // Convert JSON
      

      let result;

      try {
        result = JSON.parse(text);
      } catch (jsonError) {
        console.error("PHP returned invalid JSON:");
        console.error(text);
        alert("Server error. Check Console for details.");

        return;
      }

      console.log("Server response:", result);

      
      // SUCCESS
      

      if (result.success) {
        alert(result.message);

        
        // Add new subject to dropdown
        

        if (subjectSelect.value === "add_new") {
          const option = document.createElement("option");
          option.value = subject;
          option.textContent = subject;

          // Insert before Add New Subject

          const addNewOption = subjectSelect.querySelector(
            'option[value="add_new"]',
          );

          if (addNewOption) {
            subjectSelect.insertBefore(option, addNewOption);
          } else {
            subjectSelect.appendChild(option);
          }
        }

        
        // Select subject
        

        subjectSelect.value = subject;

        
        // Clear title
        

        titleInput.value = "";

        
        // Clear description
        

        if (descriptionInput) {
          descriptionInput.value = "";
        }

        
        // Clear tags
        

        if (tagsInput) {
          tagsInput.value = "";
        }

        
        // Clear file
        

        fileUpload.value = "";

        
        // Clear file name
        

        if (fileName) {
          fileName.innerHTML = "";
        }

        
        // Hide new subject
        

        if (newSubjectInput) {
          newSubjectInput.value = "";

          newSubjectInput.style.display = "none";
        }

        console.log("PDF ID:", result.pdf_id);

        console.log("File:", result.file_path);
      } else {
        alert(result.message || "Upload failed.");
      }
    } catch (error) {
      console.error("Upload error:", error);

      alert("Upload failed. Check the browser console.");
    } finally {

      // RESET BUTTON


      uploadBtn.disabled = false;

      uploadBtn.innerHTML = `
                <i class="bi bi-cloud-arrow-up"></i>
                Upload Note
            `;
    }
  });
}


// CANCEL BUTTON


if (cancelBtn) {
  cancelBtn.addEventListener("click", function () {
    // Clear title

    if (titleInput) {
      titleInput.value = "";
    }

    // Clear description

    if (descriptionInput) {
      descriptionInput.value = "";
    }

    // Clear tags

    if (tagsInput) {
      tagsInput.value = "";
    }

    // Clear file

    if (fileUpload) {
      fileUpload.value = "";
    }

    // Clear file name

    if (fileName) {
      fileName.innerHTML = "";
    }

    // Reset subject

    if (subjectSelect) {
      subjectSelect.value = "";
    }

    // Hide new subject

    if (newSubjectInput) {
      newSubjectInput.value = "";

      newSubjectInput.style.display = "none";
    }
  });
}
