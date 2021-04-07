# Money balance app

#### Create Project
```
composer create-project symfony/skeleton projectName
```

#### Packages 
```
composer require symfony/orm-pack
composer require symfony/maker-bundle --dev
```

#### Entities & Migration
```
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

#### Start Server
```
php -S localhost:8000 -t public/
```

#### API Overview
```
http://localhost:8000/api
```