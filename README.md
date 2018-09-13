
# ASSUMPTIONS

	Since no technological requirements were specified, I was free to use any stack.
	In the ERD, Address being a number instead of a string was a typo.
	Customer cannot exploit the monthly increment to a savings account by depositing money right before the increment and withdrawing it right after the increment and repeat.

# TECH STACK

	This assignment is done with LAMP stack using PHP Laravel framework. Editor used was Sublime Text 3.


# GETTING STARTED

	Have linux installed.  		//L
	Have apache2 installed.		//A
	Have mysql installed.		//M
	Have php7.0 installed.		//P

	Create an empty database.
	Open .env file in the root folder (file might be hidden by default).
	In the .env file change database config to match yours.

	default config:
	DB_DATABASE=arbisoft
	DB_USERNAME=root
	DB_PASSWORD=root

	Run command 'php artisan migrate' from the terminal.
	Run command 'php artisan serve'.
	The app is now running on localhost:8000.

	for scheduled monthly profit calculation and credit
		from linux terminal
		crontab -e
		add the following line and save
		* * * * * php /path-to-project/artisan schedule:run >> /dev/null 2>&1

		in my case
		* * * * * php /home/Ammar/Desktop/Arbisoft/artisan schedule:run >> /dev/null 2>&1

# CODE

	Migrations located in Arbisoft/database/migrations/

		The 'php artisan migrate' command runs the migrations which create database table from schema.
		All tables, their attributes and relationships for the database are created in the migrations.

	Models located in Arbisoft/app/

		Customer
		Account
		Transaction

		The attributes representing columns in the database table as well as the relationships are defined in models.

	Routes located in Arbisoft/routes/web.php

		routes direct requests to controller methods.

	Controllers located in Arbisoft/app/http/controllers

		PagesController -> displays views and handles GET requests.
		BankingSystemController -> handles POST requests and contains most of the app logic.

	Views located in Arbisoft/resources/views

		Views use Laravel's blade template and bootstrap that Laravel provides out of the box by including app.js file.
		HTML5 input forms with required checks.

	Form Validation

		backend validation, using Laravel's validator and Laravel's errors.
		some custom validation in controllers and error displayed through session flash.

	Scheduled Tasks

		cronjob
		new artisan command called MonthlyProfit, located in Arbisoft/app/console/commands
		MonthlyProfit contains scheduled task logic of calculating and crediting profit to all savings account.
		Kernel.php located in Arbisoft/app/console/ -> does the scheduled calls of MonthlyProfit
		In Kernel.php use 'everyMinute' in place of 'monthly' or run 'php artisan account:monthlyprofit' from the command line to test working.
