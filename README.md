
# TASK MANAGEMENT REST API


# Instructions:

### 1. Clone the Repository
-> Clone the repository from https://github.com/Crawford30/laravel.api.taskmanagement.git into the .htdocs folder of your Server.

### 2. Install Server Software
-> Make sure you have XAMPP or WAMP installed for Windows, MAMP or XAMPP for Mac, or LAMP for Linux.

### 3. Install Composer Dependencies
-> Run composer install in the project directory via the command line to install composer first.

### 4. Move PAI Application to Root
-> The "API Application" folder should be placed in the root directory (inside .htdocs for XAMPP or WAMP).

### 5. Create Database
-> Create a database of your choice (e.g., projectCodeDB).

### 6. Copy Environment File
-> Copy .env.example to .env. by running **_cp .env.example .env_**

### 7. Update Database Configuration
-> Open .env and update the database name to the one you created.

### 8. Navigate to Project Directory
-> Open a terminal or command prompt and navigate to the project directory.

### 9. Ensure Server is Running
-> Make sure the server is running (XAMPP, WAMP, or any server environment you are using).

### 10. Generate Application Key
-> Run _php artisan key:generate_ to generate the application key.

### 11. Create Database Tables
-> Run _php artisan migrate_ to create the necessary database tables.

### 12. Seed Database (Very Important Step)
-> Run _php artisan db:seed_ to seed the databases.

### 13. Clear Configuration (if necessary)
-> _php artisan config:clear_ <br>
-> _php artisan config:cache_

### 14. Start Development Server
-> Run _php artisan serve_ to start the development server.

### 15. Copy Base URL
-> Copy the URL provided by the development server and use it as the base URL in the .env (afte copying .env.example from the front app) located in **Project Root Folder**). For my case it was VITE_API_URL=http://127.0.0.1:8000

### 16. User Account

-> I created a seeded account with these login credentials;<br>
**Email** : projectcode@gmail.com <br>
**Password** : projectcode <br>






