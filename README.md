steps to run application:

1. php -S localhost:port -t public

2. command to create DB:

	- php bin/console doctrine:database:create


1. clear cache command

	php bin/console cache:clear --env=dev

2. create enitity
	
	php bin/console make:entity

3. Generate migration

	php bin/console make:migration

5. Execute migrations 

	php bin/console doctrine:migrations:migrate
