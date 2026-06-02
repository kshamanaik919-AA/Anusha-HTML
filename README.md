# 🎓 Student Management System

A web-based Student Management System developed using **HTML, CSS, PHP, MySQL, and XAMPP**. This project helps schools manage student admissions, login, academic records, attendance, timetables, notifications, and teacher information through a simple and user-friendly interface.

---

## 📌 Project Overview

The Student Management System is designed to automate student-related activities in a school environment. Students can apply for admission online, receive a unique registration number, log in to their account, and view their academic details.

---

### 🏠 Home Page
- Modern responsive homepage
- Navigation bar with:
  - Home
  - Admission
  - Login
  - Contact

### 📝 Admission Module
- Online admission form
- Student photo upload
- Required document upload
- Automatic Registration Number generation
- Password generated using Date of Birth
- Data stored in MySQL database

### 🔐 Login Module
- Student login using Registration Number and Password
- Session-based authentication

### 👨‍🎓 Student Dashboard
After successful login, students can view:

- Personal Profile
- Registration Number
- Class Information
- Academic Performance
- Subject Marks
- Attendance Percentage
- Class Timetable
- School Notifications
- Class Teacher Details

### 📅 Timetable Module
- Separate timetable for classes 1–10
- Automatically displayed based on student class

### 📊 Marks Module
- Subject-wise marks display
- Academic performance tracking

### 📈 Attendance Module
- Present days
- Total working days
- Attendance percentage calculation

### 📢 Notifications Module
- Important announcements from school

### 👩‍🏫 Teacher Information
- Class teacher name
- Contact number
- Email address

### 📞 Contact Module
- Contact form for admission enquiries
- School contact information

---

## 🛠️ Technologies Used

### Frontend
- HTML5
- CSS3
- JavaScript

### Backend
- PHP

### Database
- MySQL

### Server
- XAMPP (Apache + MySQL)

---

## 🗄️ Database Tables

- students
- marks
- attendance
- timetable
- teachers
- notifications
- contacts

---

## 📂 Project Structure
StudentManagementSystem/
│
├── index.html

├── admission.html

├── login.html

├── contact.html

│
├── style.css

├── admission.css

├── login.css

├── contact.css

│
├── db.php

├── insert.php

├── login.php

├── dashboard.php

├── logout.php

├── contact_insert.php
│
├── uploads/
│
└── README.md
