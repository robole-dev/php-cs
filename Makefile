.ONESHELL:
all:

DIST_DIR = dist
DIST_ROBOLE_PHP_CS_DIR = tools/robole-php-cs

#
# Setup
#
setup-robole-php-cs: FORCE
	cd $(DIST_DIR)/$(DIST_ROBOLE_PHP_CS_DIR)
	composer install

#
# Rector
#
fix-rector: FORCE
	cd $(DIST_DIR)
	$(DIST_ROBOLE_PHP_CS_DIR)/vendor/bin/rector process src

fix-rector--dry: FORCE
	cd $(DIST_DIR)
	$(DIST_ROBOLE_PHP_CS_DIR)/vendor/bin/rector process src --dry-run

fix-rector-list-rules: FORCE
	cd $(DIST_DIR)
	$(DIST_ROBOLE_PHP_CS_DIR)/vendor/bin/rector list-rules

fix-rector-cc: FORCE
	#cd $(DIST_DIR)
	#$(ROBOLE_PHP_CS_DIR)/vendor/bin/rector --clear-cache --dry-run src

#
# PHP-CS-Fixer
#
fix-php-cs-fixer: FORCE
	cd $(DIST_DIR)
	$(DIST_ROBOLE_PHP_CS_DIR)/vendor/bin/php-cs-fixer fix src

fix-php-cs-fixer--dry: FORCE
	cd $(DIST_DIR)
	$(DIST_ROBOLE_PHP_CS_DIR)/vendor/bin/php-cs-fixer fix src --dry-run --verbose

#
# Checks
#
#check-phpcs: FORCE
#	cd $(DIST_DIR)
#	$(ROBOLE_PHP_CS_DIR)/vendor/bin/rector process src

.PHONY: FORCE
FORCE:
