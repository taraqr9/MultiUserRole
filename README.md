# === Multiple Roles API ===

Allow users to have multiple role using `REST API with Sanctum`.

## == Description ==

This plugin allows you to give multiple roles for a user ->
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
composer update
php artisan migrate
php artisan db:seed
```
Then test it with postman api tester.





