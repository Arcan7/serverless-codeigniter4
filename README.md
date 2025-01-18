# Serverless CodeIgniter 4 Framework pour Vercel

## Qu'est-ce que Serverless CodeIgniter?

Cette version de CodeIgniter 4 est spécialement adaptée pour fonctionner de manière serverless sur la plateforme Vercel. Elle conserve tous les avantages du framework CodeIgniter - léger, rapide, flexible et sécurisé - tout en permettant un déploiement sans serveur.

## Configuration Serverless

Cette version a été modifiée pour fonctionner de manière optimale dans un environnement serverless. Les principales modifications incluent :

- Adaptation pour le runtime PHP de Vercel
- Configuration optimisée pour les fonctions serverless
- Gestion des routes compatible avec Vercel
- Structure de projet adaptée au déploiement serverless

## Prérequis Techniques

PHP version 8.3 est recommandée pour cette version serverless, avec les extensions suivantes :

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Extensions PHP requises :
- json (activé par défaut)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) pour MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) pour HTTP\CURLRequest

## Déploiement sur Vercel

1. Clonez ce repository
2. Configurez votre projet dans Vercel
3. Assurez-vous que votre `vercel.json` est correctement configuré
4. Déployez avec la commande `vercel deploy`

## Structure du Projet

La structure du projet a été optimisée pour Vercel :
- `/api` - Contient les fonctions serverless
- `/public` - Fichiers statiques
- `/app` - Code de l'application CodeIgniter

## Important

Cette version serverless nécessite une approche différente de la version traditionnelle de CodeIgniter :
- Les sessions doivent être gérées via des services externes
- Le stockage de fichiers doit utiliser des solutions cloud
- La mise en cache doit être configurée pour des services compatibles serverless

## Contribution

Les contributions sont les bienvenues ! Veuillez :
1. Fork le repository
2. Créer une branche pour votre fonctionnalité
3. Soumettre une Pull Request

## Support

Pour le support :
- Utilisez les Issues GitHub pour les bugs
- Consultez la [documentation de CodeIgniter](https://codeigniter.com/user_guide/)
- Référez-vous à la [documentation Vercel](https://vercel.com/docs) pour les questions spécifiques au déploiement
