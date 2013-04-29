serve:
	php -S localhost:8000 -t static/ index.php

install:
	bin/composer.phar install

update:
	bin/composer.phar update
