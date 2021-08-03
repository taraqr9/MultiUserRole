Use this command



#=== Multiple Roles API ===

Allow users to have multiple using `REST API with Sanctum`.

##== Description ==

This plugin allows you to give multiple roles for a user -.
`Admin`
`Blogwriter`
`User`

Admin Role : 
    1. Create Project
    2. Single Project View
    3. All Project List
    4. Delete Project
    
BlogWriter Role :
    1. Create Project
    2. Single Project View
    3. All Project List
    
User Role :
    1. All Project List

== Installation ==
```bash
git clone https://github.com/taraqr9/MultiUserRole.git
cd multiuserrole
composer update
php artisan migrate
php artisan db:seed
```




