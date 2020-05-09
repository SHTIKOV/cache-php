.PHONY:
analyze: 
	vendor/bin/phpstan analyse src/autoload.php

.PHONY: tests
tests:
	phpunit ./tests