#!/bin/bash
#
# This script is used to generate POT files from the Raccoon theme sources.

command -v xgettext >/dev/null 2>&1 || { 
	echo >&2 "The required utility - xgettext - is not installed, aborting."
	exit 1 
}

# Edit below values to fit your needs

DOMAIN=Raccoon
THEME=raccoon-twig
MU_PLUGINS_SITE=raccoon-site

THEME_ROOT=../../public/core/themes/$THEME
MU_PLUGINS_ROOT=../../public/core/mu-plugins/$MU_PLUGINS_SITE

THEME_TRANSLATIONS_DIR=app/translations
MU_PLUGINS_TRANSLATIONS_DIR=translations

THEME_POT_FILE=$THEME_TRANSLATIONS_DIR/$DOMAIN.pot
MU_PLUGINS_POT_FILE=$MU_PLUGINS_TRANSLATIONS_DIR/$DOMAIN.pot

TMP_PHP_LIST=/tmp/php_files.txt
TMP_TWIG_LIST=/tmp/twig_files.txt
TMP_BLADE_LIST=/tmp/blade_files.txt

XGETTEXT_OPTIONS='--from-code=UTF-8 --force-po --sort-by-file -k__ -k_e -k_n:1,2 -k_x:1,2c -k_ex:1,2c -k_nx:4c,12 -kesc_attr__ -kesc_attr_e -kesc_attr_x:1,2c -kesc_html__ -kesc_html_e -kesc_html_x:1,2c -k_n_noop:1,2 -k_nx_noop:3c,1,2, -k__ngettext_noop:1,2'

# Make sure we're in the right working directory when calling this script.
cd "$(dirname "$0")" || exit 1

cd $THEME_ROOT || exit 1

find ./app ./page-templates -type f -iname "*.php" -not -iname "*.blade.php" > $TMP_PHP_LIST
find ./ -maxdepth 1 -type f -iname "*.php" -not -iname "*.blade.php" >> $TMP_PHP_LIST
find ./app ./page-templates -type f -iname "*.twig" > $TMP_TWIG_LIST
find ./ -maxdepth 1 -type f -iname "*.twig" >> $TMP_TWIG_LIST
find ./app ./page-templates -type f -iname "*.blade.php" > $TMP_BLADE_LIST
find ./ -maxdepth 1 -type f -iname "*.blade.php" >> $TMP_BLADE_LIST

if [ -e $THEME_POT_FILE ]; then
	echo "pot file already exists, merging"
	xgettext --files-from=$TMP_PHP_LIST $XGETTEXT_OPTIONS --omit-header --join-existing --output=$THEME_POT_FILE
else
	echo "no pot file, creating new one, remember to fix header"
	xgettext --files-from=$TMP_PHP_LIST $XGETTEXT_OPTIONS --output=$THEME_POT_FILE
fi
xgettext --language=Python --files-from=$TMP_TWIG_LIST $XGETTEXT_OPTIONS --omit-header --join-existing --output=$THEME_POT_FILE
xgettext --language=Python --files-from=$TMP_BLADE_LIST $XGETTEXT_OPTIONS --omit-header --join-existing --output=$THEME_POT_FILE

# Do almost the same thing for mu-plugins

cd - >/dev/null 2>&1 || exit 1
cd $MU_PLUGINS_ROOT || exit 1

find . -type f -iname "*.php" > $TMP_PHP_LIST

if [ -e $MU_PLUGINS_POT_FILE ]; then
	echo "pot file already exists, merging"
	xgettext --files-from=$TMP_PHP_LIST $XGETTEXT_OPTIONS --omit-header --join-existing --output=$MU_PLUGINS_POT_FILE
else
	echo "no pot file, creating new one, remember to fix header"
	xgettext --files-from=$TMP_PHP_LIST $XGETTEXT_OPTIONS --output=$MU_PLUGINS_POT_FILE
fi

exit 0