# PHP Learning Management System (LMS)

A feature-rich Learning Management System built with **PHP**, **HTML**, **CSS**, **JavaScript**, and **Bootstrap**, designed to facilitate seamless interaction between admins, teachers, students, and academic officers. This project was my introduction to web development, and while it functions effectively, some design improvements (e.g., using the Singleton pattern for database connections) can be incorporated in the future.

---

## 🎯 **Features**

### **1. Admin Features**
- Add and manage teacher and academic officer accounts.
- Oversee system settings and configurations.

### **2. Teacher Features**
- Upload assignments and notes for their classes.
- Review and grade assignments submitted by students.
- Release marks to the academic officer for approval.

### **3. Student Features**
- Enroll in available classes.
- Access and download class notes.
- Submit assignments through the system.
- View marks once approved by the academic officer.

### **4. Academic Officer Features**
- Manage and finalize marks submitted by teachers.
- Ensure the integrity of grade releases.

---

## 🔧 **Technologies Used**
- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Email Gateway**: For registration.

---

## 🏗️ **Project Limitations**
- This project was my initial venture into web development. While it performs its intended functions, there is room for improvement:
- The database connection does not use the **Singleton pattern**, which may lead to unnecessary resource consumption or connection issues in larger-scale implementations.

---

## 🚀 **Getting Started**
- Follow the steps below to set up and run the project:

**1. Clone the Repository**
- git clone [https://github.com/SandeepaLakruwan/PHP_LearningManagementSystem_MySQL.git)
- cd Online_LMS
- Set Up the Database
- Import the database backup:
-    Locate the lms.sql file in the root folder.
-    Import it into your MySQL server using tools like phpMyAdmin or the MySQL CLI.
- In the Online_LMS/process_createAcc.php file update your email and app password for send email.
- Run the Project
-    Place the project folder in your web server directory (e.g., htdocs for XAMPP or www for WAMP).
-    Start your web server (Apache and MySQL).
-    Open the project in your browser:
-       http://localhost/Online_LMS/

##  🤝 Contributions

- Contributions, issues, and feature requests are welcome!

## 📧 Contact

- If you have any questions or feedback, please reach out via sandeepalakruwan@gmail.com 

## 📜 License

- This project is licensed under the MIT License.

- **Enjoy exploring the PHP Learning Management System! 🎉**
