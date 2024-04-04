# Running PHP Project Locally

This guide will help you set up and run a PHP project on your local server using XAMPP. 

## Prerequisites

Before you begin, make sure you have the following installed on your system:

- [XAMPP](https://www.apachefriends.org/index.html): A local server solution that includes Apache, MySQL, and PHP.
- [Git](https://git-scm.com/): Version control system to clone the project repository.

## Steps

1. **Install XAMPP**: Download and install XAMPP from the official website according to your operating system.

2. **Clone the Repository**: Clone the project repository to your local machine using the following command:

    ```bash
    git clone https://github.com/your-username/your-repo.git
    ```

3. **Move the Repository to htdocs**: Navigate to the XAMPP installation directory and move the cloned repository to the `htdocs` folder. This folder is where XAMPP serves files.

4. **Import the Database**: You can either import the provided `test1.sql` database or create your own. To import the provided database, follow these steps:
   
   - Open phpMyAdmin by visiting `http://localhost/phpmyadmin`.
   - Create a new database named `test1`.
   - Click on the newly created database and select the "Import" tab.
   - Choose the `test1.sql` file from your project directory and click "Go" to import.

5. **Create Tables**: If you're creating your own database, execute the following SQL queries to create the necessary tables:

    ```sql
    CREATE TABLE formdata (
        id INT AUTO_INCREMENT PRIMARY KEY,
        date DATE NOT NULL,
        card_no VARCHAR(20) NOT NULL,
        observer_name VARCHAR(100) NOT NULL,
        department VARCHAR(100) NOT NULL,
        location VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        observation_type VARCHAR(20) NOT NULL,
        image VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

6. **Connect Database to Project**: Modify the `conn.php` file in your project directory to include your database credentials:

    ```php
    $servername = "localhost"; // Server name
    $username = "root"; // Database username
    $password = ""; // Database password
    $dbname = "test1"; // Database name
    ```

7. **Run the Project**: Start the Apache and MySQL services from the XAMPP Control Panel. Then, open your web browser and navigate to `http://localhost/your-project-folder` to view your PHP project.

8. **QR Code Functionality**: To make the QR code functionality work, you need to make the form URL publicly available. You can achieve this by deploying your project to a server that is accessible over the internet.
## Modify Form URL in form.php

In the `form.php` page of your PHP project, you may need to modify the form URL. Locate the `$formUrl` variable in the `form.php` file and set it to the desired URL.

For example, if you want to set the form URL to `http://localhost/project1/form.php`, you can modify the `$formUrl` variable as follows:

```php
$formUrl = "http://localhost/project1/form.php";
## Additional Notes

- Make sure XAMPP's Apache and MySQL services are running before accessing your project.
- For security reasons, it's recommended to change the default database username and password in your `conn.php` file.
- Ensure proper error handling and validation in your PHP code to prevent security vulnerabilities.

With these steps, you should be able to set up and run your PHP project locally on your machine using XAMPP. If you encounter any issues, refer to the documentation of XAMPP or the specific components (Apache, MySQL, PHP) for troubleshooting.
