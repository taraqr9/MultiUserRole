# === Multiple Roles API ===

Allow users to have multiple role using `REST API with Sanctum`.

## == Description ==

This allows you to give multiple roles for a user ->
`Admin`
`Blogwriter`
`User`

## Admin Role : 
    * Create Project
    * Single Project View
    * All Project List
    * Delete Project
    
## BlogWriter Role :
    * Create Project
    * Single Project View
    * All Project List
    
## User Role :
    * All Project List

== Installation ==
```bash
git clone https://github.com/taraqr9/MultiUserRole.git
cd multiuserrole
cp .env.example .env
composer install
php artisan migrate:refresh --seed
```
Then test it with postman api tester.

## Tech Stack
* Laravel 
* Laratrust ( User Role)
* Sanctum ( Login token)



