
<?php
require_once "auth/session.php";


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Note flow</title>
  </head>
  <body>

  <!-- Nav bar -->
    <?php
  require_once "includes/navbar.php";
  ?>


    <!--Hero section-->
    <div class="hero">
      <div class="hero-main">
        <div class="hero-right">
          <img src="images/heroimage.jpg" alt="hero image" id="heroimg" />
        </div>
        <div class="hero-left">
          <h1 id="learn-text">
            Welcome to
          </h1>
          <h1 id="student-text">Student <span style="color:#0152DD;">Resource</span> Hub</h1>
          <p>
            Find high-quality notes, study materials and <br />
            resources shared by students, for students.
          </p>

          <div class="search-bar">
            <input type="text" placeholder="Search notes,subject.." />
            <img src="images/icons/Search.svg" alt="" id="search-icon" />
          </div>
          <div class="hero-buttons">
            <a href="includes/filter.php"><button class="btn note-btn">Explore Notes</button></a>
            <a href="includes/upload.php"><button class="btn browse-btn">Upload Notes</button></a>
          </div>
        </div>
        
      </div>
    </div>


    <!--Categories section-->
    <div class="ctg">
      <div class="ctg-title"><h3>BROWSE CATEGORIES</h3></div>
      <div class="ctg-cards">

        <div class="ctg-card">
          <div class="card-img"><img src="images/card-icons/code-svgrepo-com.svg" alt=""></div>
          <h3>Programming <br> Notes</h3>
        </div>
        <div class="ctg-card">
          <div class="card-img"><img src="images/card-icons/calculator-svgrepo-com.svg" alt=""></div>
          <h3>Mathematics <br> Notes</h3>
        </div>
        <div class="ctg-card">
          <div class="card-img"><img src="images/card-icons/briefcase-alt-1-svgrepo-com.svg" alt=""></div>
          <h3>Business <br> Notes</h3>
        </div>
        <div class="ctg-card">
          <div class="card-img"><img src="images/card-icons/flask-svgrepo-com.svg" alt=""></div>
          <h3>Science <br> Notes</h3>
        </div>
        <div class="ctg-card">
          <div class="card-img"><img src="images/card-icons/book-open-svgrepo-com.svg" alt=""></div>
          <h3>Language <br> Notes</h3>
        </div>

      </div>
      
      </div>
    </div>



    <!--Recently notes-->
    <section class="recent-notes">

    <div class="recent-header">
        <h2>RECENTLY ADDED NOTES</h2>
        <a href="#">View All →</a>
    </div>

    <div class="recent-cards">

        <div class="note-card">
            <div class="note-img">
                <img src="images/pdf.png" alt="">
            </div>

            <div class="note-content">
                <h3>Data Structures in C++</h3>
                <p>By Alex Kumar</p>

                <div class="note-footer">
                    <span class="pdf">PDF</span>
                    <span>• 2 days ago</span>

                    <button><img src="images/download.svg" alt="download"></button>
                </div>
            </div>
        </div>

        <div class="note-card">
            <div class="note-img">
                <img src="images/pdf.png" alt="">
            </div>

            <div class="note-content">
                <h3>Calculus - Important Formulas</h3>
                <p>By Priya Singh</p>

                <div class="note-footer">
                    <span class="pdf">PDF</span>
                    <span>• 3 days ago</span>

                    <button><img src="images/download.svg" alt="download"></button>
                </div>
            </div>
        </div>

        <div class="note-card">
            <div class="note-img">
                <img src="images/pdf.png" alt="">
            </div>

            <div class="note-content">
                <h3>Marketing Management Notes</h3>
                <p>By Rohan Mehta</p>

                <div class="note-footer">
                    <span class="pdf">PDF</span>
                    <span>• 5 days ago</span>

                    <button><img src="images/download.svg" alt="download"></button>
                </div>
            </div>
        </div>

    </div>

</section>


<?php
require_once "includes/footer.php";
?>

<!-- javascript connect-->
    <script src="js/script.js"></script>
    
  </body>
</html>
