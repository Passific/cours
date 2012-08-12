Gestionnaire de cours en ligne
========================

Bienvenue sur l'application Symfony2 de gestion des cours en ligne.

Ce document contient des informations sur comment télécharger, installer, et démarrer
avec ce gestionnaire. Pout plus d'information veuillez contacter [Passific][1].

1) Téléchargement
----------------------------------

Voici comment procéder pour installer le Gestionnaire de cours en ligne.

### Télécharger l'archive des fichiers

Téléchargez l'[archive][2] et décompressez-la quelque part
dans votre dossier web à la racine du répertoire de votre serveur.


2) Vérification
-------------------------------------

Avant de pouvoir commencer à l'utiliser, vérifiez que votre système local est correctement
configuré pour Symfony.

Exécutez le script `check.php` depuis la ligne de commande:

    php app/check.php

Accédez au script `config.php` depuis un navigateur:

    http://localhost/cours/app/web/config.php

Si vous avez des avertissements ou des recommandations, corrigez-les avant de passer à la suite.

Attention, Symfony doit pouvoir écrire dans les dossiers `app/cache` et `app/logs`, pour cela exécutez la commande :

    chmod 777 app/cache
    chmod 777 app/logs

3) Installation
--------------------------------

Veuillez éditer le fichier `app/config/parameters.yml` afin de configurer votre base de données.

Si vous ne l'avez pas déjà, fait il faut créer la base de données, pour cela exécutez la commande:

    php app/console doctrine:database:create

Ensuite, il faut générer les tables à l'intérieur de cette base de données. Exécutez donc la commande suivante :

    php app/console doctrine:schema:update --force


4) Démarrer
-------------------------------

Félicitations ! Vous êtes maintenant prêt pour utiliser le Gestionnaire de cours en ligne.

Vous pouvez dès à présent mettre des cours en ligne en utilisant le formulaire de mise en ligne de document :

    http://localhost/ajouter


What's inside?
---------------

Gestionnaire de cours en ligne est basé sur le framework [Symfony][3].

---------------

The Symfony Standard Edition is configured with the following defaults:

  * Twig is the only configured template engine;

  * Doctrine ORM/DBAL is configured;

  * Swiftmailer is configured;

  * Annotations for everything are enabled.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * [**JMSSecurityExtraBundle**][13] - Allows security to be added via
    annotations

  * [**JMSDiExtraBundle**][14] - Adds more powerful dependency injection
    features

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][15] (in dev/test env) - Adds code generation
    capabilities

Enjoy!

[1]:  https://github.com/Passific/
[2]:  https://github.com/Passific/cours
[3]:  http://symfony.com/
[6]:  http://symfony.com/doc/2.1/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.1/book/doctrine.html
[8]:  http://symfony.com/doc/2.1/book/templating.html
[9]:  http://symfony.com/doc/2.1/book/security.html
[10]: http://symfony.com/doc/2.1/cookbook/email.html
[11]: http://symfony.com/doc/2.1/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.1/cookbook/assetic/asset_management.html
[13]: http://jmsyst.com/bundles/JMSSecurityExtraBundle/master
[14]: http://jmsyst.com/bundles/JMSDiExtraBundle/master
[15]: http://symfony.com/doc/2.1/bundles/SensioGeneratorBundle/index.html
