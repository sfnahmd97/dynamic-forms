# Dynamic Forms

1. Clone the repository: git clone https://github.com/sfnahmd97/dynamic-forms.git
2. Run the command "cp .env.example .env"
3. Set up your environment variables database and mail configuration in .env file
4. Delete composer.lock file
5. Run the command "composer install"
6. Run the command "php artisan key:generate"
7. Run the command "php artisan migrate:fresh --seed"
8. Run the command "php artisan serve"
9. Run the command "npm install & npm run dev"
10. Pleasechange MailId in App/Jobs/sendFormCreatedEMail
11. Run the command "php artisan queue:work"
12. admin credential Email: "admin@admin.com",Password:"password"

