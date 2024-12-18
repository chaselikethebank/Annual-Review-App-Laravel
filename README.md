# Step 1: Install Dependencies
Run the following command in your terminal to install the required dependencies:
```Bash
composer install
```
This may take a few minutes to complete.
# Step 2: Set Environment Variables
Create a new file named .env in the root directory of your project. You can copy the contents of the .env.example file as a starting point.
Update the following environment variables to match your setup:
``` Makefile

DB_CONNECTION=sqlite
DB_DATABASE=/path/to/your/database.sqlite
APP_KEY=
DB_DATABASE=<print from cli pwd>/database.sqlite
APP_DEBUG=true
APP_ENV=local

```
Replace the your_database_name, your_database_username, and your_database_password placeholders with your actual database credentials.
# Step 3: Generate Application Key and Database path
Run the following command to generate a new application key:
```Bash
php artisan key:generate
```
This will update the APP_KEY environment variable in your .env file.

# Step 4: get the absolute path for your sqlite3 db
```
pwd
```
add the pwd string to the .env DB_DATABASE

# Step 5: Run Migrations
Run the following command to execute the database migrations:
```Bash
php artisan migrate
```
This will create the necessary database, assign the file path according to your .env path and create tables in your database 

# Step 6: Start the Development Server
Run the following command to start the Laravel development server:
```Bash
php artisan serve
```

This will start the server on http://localhost:8000.
That's it! You should now be able to access the Annual Review App Laravel application in your web browser.

# Step 6: Start VITE server
Run the following command to start the Laravel development server:
```Bash
npm i
npm run dev
```

This will start the server to hot module your style
