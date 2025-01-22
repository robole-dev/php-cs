.ONESHELL:
all:

DIST_DIR = dist

#
# Rector
#
fix-rector: FORCE
	cd $(DIST_DIR)
	vendor/bin/rector process src

fix-rector--dry: FORCE
	cd $(DIST_DIR)
	vendor/bin/rector process src --dry-run

fix-rector-list-rules: FORCE
	cd $(DIST_DIR)
	vendor/bin/rector list-rules

fix-rector-cc: FORCE
	cd $(DIST_DIR)
	vendor/bin/rector --clear-cache --dry-run src

#
# PHP-CS-Fixer
#
fix-php-cs-fixer: FORCE
	cd $(DIST_DIR)
	vendor/bin/php-cs-fixer fix src

fix-php-cs-fixer--dry: FORCE
	cd $(DIST_DIR)
	vendor/bin/php-cs-fixer fix src --dry-run --verbose

#
# TWIGCS
#
fix-twig-cs-fixer: FORCE
	cd $(DIST_DIR)
	vendor/bin/twig-cs-fixer lint --config .twig-cs-fixer.dist.php

fix-twig-cs-fixer--dry: FORCE
	#cd $(DIST_DIR)
	vendor/bin/twig-cs-fixer lint --fix --config .twig-cs-fixer.dist.php

#
# Checks
#
#check-phpcs: FORCE
#	cd $(DIST_DIR)
#	vendor/bin/rector process src

#
# Update
#
update: FORCE
	cd $(DIST_DIR)
	composer update

.PHONY: FORCE
FORCE:
