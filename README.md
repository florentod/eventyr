# Eventyr

Une expérience unique et renversante.

## Envirennement de développement

### Pré-requis

	* PHP 7.4
	* Composer
	* Symfony CLI
	* symfony/webpack-encore-bundle
	* npm

	Vous pouver vérifier les pré-requis avec le commande suivante (de la CLI Symfony) :

```bash
	symfony check:requirements
```

```bash
symfony server:start
```

### Génération de fake DateBase via $facker

```bash
# composer require --dev orm-fixtures
# composer require fakerphp/faker --dev
symfony console doctrine:fixtures:load
```