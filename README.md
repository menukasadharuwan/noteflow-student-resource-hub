# 📚 NoteFlow - Student Resource Hub

NoteFlow is a web-based Student Resource Hub designed to help students easily
upload, find, filter, and download educational notes and study materials.

The system provides a simple and user-friendly platform where students can
share academic resources and access useful study materials in one place.

---

## 📖 About the Project

NoteFlow was developed as an ICT1209 Web Technologies Mini Project.

The main purpose of this project is to create a centralized platform for
students to manage and share educational notes.

Students can create an account, upload notes, search for resources, filter
notes by subject, download PDF files, manage their profiles, and contact the
website administrators.

---

## ✨ Features

### 🏠 Home Page

- Modern and responsive landing page
- Search notes
- Explore notes
- Upload notes
- Browse notes by category
- Recently added notes

### 👤 User Authentication

- User registration
- User login
- Secure password hashing
- Session-based authentication
- User logout
- Profile management

### 📚 Notes Management

- Upload study notes
- Add note title
- Select subject
- Add description
- Add tags
- Store uploaded files
- View available notes
- Download notes

### 🔍 Search and Filtering

- Search for notes
- Filter notes by subject
- Browse different academic categories
- Find recently added notes

### 📞 Contact System

- Contact form
- User name
- Email address
- Subject
- Message
- Messages stored in MySQL database

### 📱 Responsive Design

The website is designed to work on:

- 💻 Desktop
- 💻 Laptop
- 📱 Mobile
- 📟 Tablet

---

## 📂 Project Structure

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
│
└── README.md