## Hr packages for Laravel - MongoDb
### Dependency
    "require": {
	    "php": "^8.1",
	    "laravel/framework": "^10.10",
    },
### Installation process
-   Open the composer.json of laravel project and set
>     "minimum-stability": "dev",  
>     "prefer-stable": true
-  run `composer require xpeedstudio/hr "2.2.2"`
### Available Models
- Country
- Department
- Employee
- Job
- JobHistory
- Location
- Region
### Available Console Commend 
-   For Seed - `php artisan hr:seed`
### ER Diagram HR
![Javatpoint](https://raw.githubusercontent.com/AhnabShahin/hr/main/ERDiagramHR.png) 