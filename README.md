## Brif7 : projet en equipe 2 

# Introduction

Bank of Morocco souhaite améliorer son système bancaire afin de renforcer la sécurité, la flexibilité et les fonctionnalités offertes aux utilisateurs. Le projet vise à introduire des fonctionnalités avancées, telles que la gestion des rôles et des permissions, l'utilisation d'AJAX, la recherche améliorée, le soft delete, l'optimisation des requêtes SQL, la mise en œuvre de GROUP BY, ORDER BY, jointures, Cascade delete, filtrage, l'utilisation d'un framework CSS, l'intégration de DataTable, et en bonus, la mise en place de fonctionnalités de mailing telles que la récupération de mot de passe, le glisser-déposer, les vues de base de données, les procédures stockées et les déclencheurs.

## Objectifs du Projet

### Gestion des Rôles et Permissions

- Ajout d'une table `permissions` dans la base de données.
- Un rôle peut avoir une ou plusieurs permissions.
- Une permission peut être attribuée à un ou plusieurs rôles.
- Utilisation d'un formulaire d'ajout d'utilisateur permettant d'attribuer plusieurs rôles et permissions à un utilisateur.

### Ajout Multiple

- Intégration de la fonctionnalité d'ajout multiple dans les formulaires pour les utilisateurs, les rôles et les permissions. Par exemple, lors de l'ajout d'un utilisateur, le formulaire doit permettre d'attribuer plusieurs rôles à l'utilisateur en question.

### Utilisation d'AJAX

- Intégration d'AJAX dans l'ensemble du projet pour des mises à jour asynchrones et une expérience utilisateur améliorée.

### Fonctionnalités de Recherche

- Mise en place de fonctionnalités de recherche pour les comptes, les utilisateurs, etc.

### Soft Delete

- Implémentation de la fonctionnalité de soft delete pour marquer les enregistrements comme supprimés sans les effacer réellement de la base de données.

### Requêtes SQL Avancées

- Utilisation des options GROUP BY, ORDER BY, jointures pour optimiser les requêtes SQL et améliorer les performances.

### Cascade Delete

- Mise en œuvre de la cascade delete pour gérer automatiquement la suppression des enregistrements liés lorsqu'un enregistrement principal est supprimé.

### Filtrage

- Intégration de fonctionnalités de filtrage pour faciliter la navigation et l'accès aux données.

### Pagination

- Les données doivent être paginées.

### Cryptage des Mots de Passe

- Les mots de passe ne doivent pas être stockés en clair dans la base de données.

### Utilisation d'un Framework CSS

- Adoption d'un framework CSS moderne pour améliorer l'aspect visuel et la convivialité du système bancaire.

### Intégration de DataTable

- Utilisation de DataTable pour une gestion avancée et interactive des tableaux de données.

### Conception

- Diagramme de classes
- Diagramme de séquence
- Diagramme de cas d'utilisation
- Diagramme de cas de transition

### Fonctionnalités Bonus

- **Mailing :** Intégration de fonctionnalités de mailing telles que la récupération de mot de passe.
- **Drag and Drop :** Mise en place d'une fonctionnalité de glisser-déposer pour améliorer l'expérience utilisateur.
- **DB Vue :** Ajout de vues de base de données pour une meilleure visualisation et gestion.
- **Procédures Stockées et Triggers :** Implémentation de procédures stockées et de déclencheurs pour automatiser certaines tâches.

## Technologies Requises

- Utilisation d'une technologie de base de données relationnelle (par exemple, MySQL, PostgreSQL).
- Utilisation d'AJAX pour des mises à jour asynchrones.
- Utilisation d'un framework CSS moderne (par exemple, Bootstrap, Tailwind CSS).
- GIT collaboratif, avec workflows.
- JIRA, AZUREDEVOPS, ou autre outil de gestion de projet.
- Utilisation de DataTable pour la gestion des tableaux.

## Calendrier de Projet

Le projet devrait être complété dans un délai de [insérer la durée prévue] à compter de la date de début du développement.
