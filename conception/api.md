# Documentation de l'API

| Endpoint | Méthode HTTP | Donnée(s) à transmettre | Description |
|--|--|--|--|
| `/categories` | GET | - | Récupération des données de toutes les catégories |
| `/categories` | POST | name, status | Création d'une catégorie |
| `/categories/[id]` | GET | - | Récupération des données de la catégorie dont l'id est fourni |
| `/categories/[id]` | PUT | name, status | Mise à jour complète d'une catégorie |
| `/categories/[id]` | PATCH | name et/ou status | Mise à jour partielle d'une catégorie |
| `/categories/[id]` | DELETE | - | Suppression d'une catégorie |
| `/tasks` | GET | - | Récupération des données de toutes les tâches |
| `/tasks` | POST | title, categoryId, completion, status | Ajout d'une tâche |
| `/tasks/[id]` | GET | - | Récupération des données de la tâche dont l'id est fourni |
| `/tasks/[id]` | PUT | title, categoryId, completion, status | Mise à jour complète d'une tâche |
| `/tasks/[id]` | PATCH | title et/ou categoryId et/ou completion et/ou status | Mise à jour partielle d'une tâche |
| `/tasks/[id]` | DELETE | - | Suppression d'une tâche |
