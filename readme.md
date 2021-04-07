# Money balance app

#### Create project

composer create-project symfony/skeleton projectName

#### Packages 

⋅⋅⋅composer require symfony/orm-pack⋅⋅
⋅⋅⋅composer require symfony/maker-bundle --dev⋅⋅

#### Entities & Migration

php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate