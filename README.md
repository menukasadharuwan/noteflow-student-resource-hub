# 📚 NoteFlow - Student Resource Hub

**NoteFlow** is a web-based Student Resource Hub designed to help students easily **upload, find, search, filter, and download educational notes and study materials**.

The system provides a simple and user-friendly platform where students can share academic resources and access useful study materials in one centralized location.

---

## 🎓 Project Information

| Information        | Details                         |
| ------------------ | ------------------------------- |
| **Project Name**   | NoteFlow - Student Resource Hub |
| **Project Type**   | Web Application                 |
| **Frontend**       | HTML5, CSS3, JavaScript         |
| **Backend**        | PHP                             |
| **Database**       | MySQL                           |
| **Authentication** | PHP Sessions                    |
| **Repository**     | GitHub                          |

---

## 📖 About the Project

NoteFlow is a student-focused resource-sharing platform that provides a centralized location for managing and accessing educational materials.

Users can:

* Create an account
* Log in securely
* Manage their profile
* Upload educational notes
* Search for resources
* Filter notes by subject
* View available resources
* Download PDF notes
* Add descriptions and tags
* Contact the website administrators

The website is designed with a responsive interface so that users can access the system from different devices.

---

# ✨ Features

## 🏠 Home Page

The home page provides an introduction to NoteFlow and quick access to the main features.

### Features

* Modern landing page
* Responsive navigation bar
* Search functionality
* Explore notes
* Upload notes
* Browse categories
* Recently added resources

---

## 👤 User Authentication

NoteFlow includes a user authentication system.

### Features

* User registration
* User login
* User logout
* Session-based authentication
* Secure password hashing
* Profile management
* Edit user details

---

## 📚 Notes Management

Users can upload and access educational resources through the platform.

### Features

* Upload study notes
* Add note title
* Select subject/category
* Add description
* Add tags
* Store uploaded PDF files
* View available notes
* Download notes

---

## 🔍 Search & Filtering

The system makes it easier to find relevant study materials.

### Features

* Search notes
* Filter notes
* Filter by subject
* Browse academic categories
* View recently added resources

---

## 📞 Contact System

Students can contact the website administrators through the contact page.

The contact form includes:

* Name
* Email address
* Subject
* Message

Submitted contact messages are stored in the MySQL database.

---

## 👤 Profile Management

Registered users have access to their own profile.

Users can:

* View profile information
* Edit account details
* Manage their uploaded resources
* Access their account securely

---

# 📱 Responsive Design

NoteFlow is designed to provide a responsive experience across different screen sizes.

### Supported Devices

* 💻 Desktop
* 💻 Laptop
* 📱 Mobile
* 📟 Tablet

The interface uses responsive CSS techniques to adapt the navigation, content sections, forms, cards, and footer to different screen sizes.

---

# 🛠️ Technologies Used

## Frontend

* **HTML5**
* **CSS3**
* **JavaScript**
* **Bootstrap Icons**

## Backend

* **PHP**

## Database

* **MySQL**

## Development Tools

* **Visual Studio Code**
* **XAMPP**
* **phpMyAdmin**
* **Git**
* **GitHub**

---

# 📂 Project Structure

```text
NoteFlow/
│
├── auth/
│   ├── connect.php
│   ├── login.php
│   ├── logout.php
│   ├── session.php
│   └── signup.php
│
├── css/
│   ├── About.css
│   ├── Signup.css
│   ├── contact.css
│   ├── edit.css
│   ├── filter.css
│   ├── footer.css
│   ├── log in.css
│   ├── navbar.css
│   ├── profile.css
│   ├── style.css
│   └── upload.css
│
├── images/
│   ├── background.png
│   ├── heroimage.jpg
│   └── other website images
│
├── includes/
│   ├── About.php
│   ├── change_details.php
│   ├── contact.php
│   ├── edit.php
│   ├── filter.php
│   ├── footer.php
│   ├── navbar.php
│   ├── profile.php
│   ├── upload.php
│   └── uploadlogic.php
│
├── js/
│   ├── filter.js
│   ├── profile.js
│   ├── script.js
│   └── upload.js
│
├── index.php
├── noteflow.sql
├── .gitignore
└── README.md
```

---

# ⚙️ Installation & Setup

## 1. Requirements

Before running NoteFlow, install the following:

* XAMPP
* PHP
* MySQL
* phpMyAdmin
* Web Browser
* Git

---

## 2. Clone the Repository

Open your terminal or command prompt and run:

```bash
git clone https://github.com/menukasadharuwan/noteflow-student-resource-hub.git
```

Move the project into the XAMPP `htdocs` folder:

```text
C:\xampp\htdocs\
```

The final project location should look similar to:

```text
C:\xampp\htdocs\noteflow-student-resource-hub\
```

---

## 3. Start XAMPP

Open XAMPP Control Panel.

Start:

```text
Apache
MySQL
```

Both services should be running before opening the website.

---

## 4. Create the Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create a new database.

For example:

```text
noteflow
```

Then import:

```text
noteflow.sql
```

into the newly created database.

---

## 5. Configure Database Connection

Open:

```text
auth/connect.php
```

Configure the database connection according to your local MySQL settings.

Example:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "noteflow";
```

Make sure the database name matches the database you created in phpMyAdmin.

---

## 6. Run the Project

After starting Apache and MySQL, open:

```text
http://localhost/noteflow-student-resource-hub/
```

The NoteFlow home page should now be displayed.

---

# 🔐 Authentication

NoteFlow uses PHP sessions to manage authenticated users.

The authentication system follows this process:

```text
Registration
     ↓
Login
     ↓
Session Creation
     ↓
Access Protected Pages
     ↓
Logout
     ↓
Session Destroyed
```

Passwords are stored using password hashing rather than storing plain-text passwords.

---

# 🗄️ Database

The project uses **MySQL** for storing application data.

The database is provided in:

```text
noteflow.sql
```

The database handles information such as:

* User accounts
* Uploaded resources
* Resource information
* Contact messages
* User-related data

---

# 🔄 Main System Flow

```text
                ┌───────────────┐
                │     User      │
                └───────┬───────┘
                        │
                        ▼
              ┌──────────────────┐
              │  Register/Login  │
              └────────┬─────────┘
                       │
                       ▼
              ┌──────────────────┐
              │  User Dashboard  │
              └────────┬─────────┘
                       │
          ┌────────────┼────────────┐
          │            │            │
          ▼            ▼            ▼
      Search        Upload       Profile
       Notes         Notes       Management
          │            │
          ▼            ▼
       Filter       Store File
          │            │
          └──────┬─────┘
                 ▼
          Download Notes
```

---

# 📋 Main Pages

| Page         | Purpose                      |
| ------------ | ---------------------------- |
| Home         | Main landing page            |
| Login        | User authentication          |
| Signup       | Create a new account         |
| Notes        | Browse available resources   |
| Filter       | Search and filter notes      |
| Upload       | Upload educational resources |
| Profile      | Manage user information      |
| Edit Profile | Update account details       |
| About        | Information about NoteFlow   |
| Contact      | Contact administrators       |

---

# 🔒 Security

The project includes several basic security practices:

* Password hashing
* Session-based authentication
* Authentication checks for protected pages
* Database-based user management
* Input validation
* Restricted access to authenticated features

---

# 👨‍💻 Created By

### K.M. Sadharuwan

**ITT/2024/094**

### K.M.K.D Mudalige

**ITT/2024/70**

---

# ⭐ Support

If you find this project useful, consider giving the repository a ⭐ on GitHub.

**Repository:**

https://github.com/menukasadharuwan/noteflow-student-resource-hub
