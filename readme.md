# Money balance app

#### Create Project
```
composer create-project symfony/skeleton projectName
```

#### Packages 
```
composer require symfony/orm-pack
composer require symfony/maker-bundle --dev
composer require api
composer require lexik/jwt-authentication-bundle
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

#### API Platform
```
http://localhost:8000/api
```

#### Regex expression

###### Email validation
```
/^([a-zA-Z0-9]+(?:[.-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:[.-]?[a-zA-Z0-9]+)*\.[a-zA-Z]{2,7})$/
```
###### Bank account number validation
```
/BE\d{2}[ ]\d{4}[ ]\d{4}[ ]\d{4}|BE\d{14}/
```

#### Generate private and public key JWT
###### Private key
```
openssl genrsa -out config/jwt/private.pem -aes256 4096

Enter pass phrase for config/jwt/private.pem: ENTER GENERATED PASS PHRASE
```
###### Public key
```
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem

Enter pass phrase for config/jwt/private.pem: ENTER GENERATED PASS PHRASE

"writing RSA key"

```