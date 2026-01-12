# Guide d’utilisation du menu dynamique pour le thème Student Survey

Ce guide explique comment activer et afficher le menu dynamique selon le rôle utilisateur (Admin, Instructor, Student) dans le thème WordPress `student-survey-child`.

## 1. Prérequis
- Être sur la branche contenant la fonctionnalité (`role-definition-and-register-reviewed` ou `develop`).
- Avoir bien cloné/pull le dossier `wp-content/themes/student-survey-child` et ses sous-dossiers (`inc/`).
- Activer le thème `student-survey-child` dans l’admin WordPress.

## 2. Fonctionnement du menu dynamique
- Le menu s’adapte automatiquement au rôle de l’utilisateur connecté :
  - **Admin** : accès dashboard admin, gestion utilisateurs, etc.
  - **Instructor** : accès dashboard enseignant, gestion surveys/classes.
  - **Student** : accès dashboard étudiant, feedback, etc.
- Les visiteurs non connectés voient les liens Login et Register.
- L’inscription crée automatiquement un compte avec le rôle `student`.

## 3. Affichage du menu dynamique

### Méthode recommandée (Full Site Editing)
1. **Ouvrir l’éditeur de site WordPress (Apparence > Éditeur)**
2. **Ajouter un bloc Shortcode** dans la zone d’en-tête (header) ou à l’endroit souhaité.
3. **Entrer le shortcode suivant :**
   ```
   [dynamic_main_menu]
   ```
4. **Enregistrer les modifications.**

Le menu dynamique s’affichera automatiquement et s’adaptera au rôle de l’utilisateur.

### Méthode alternative (dans un template PHP)
Si vous utilisez un template PHP classique, vous pouvez afficher le menu avec :
```php
if (function_exists('do_shortcode')) {
    echo do_shortcode('[dynamic_main_menu]');
}
```

## 4. Personnalisation
- Le menu est stylé via le fichier `style.css` du thème enfant.
- Les liens et intitulés sont personnalisables dans `inc/dynamic-menu.php`.
- Les rôles et redirections sont gérés dans `inc/roles.php` et `inc/auth-redirect.php`.

## 5. Dépannage
- Si le menu n’apparaît pas : vérifiez que le shortcode `[dynamic_main_menu]` est bien inséré dans l’éditeur de site ou le template.
- Si les rôles ne sont pas reconnus : vérifiez que les fichiers du dossier `inc/` sont bien présents et inclus dans `functions.php`.
- Videz le cache navigateur et WordPress si besoin.

## 6. Pour aller plus loin
- Vous pouvez adapter les liens, les intitulés ou les restrictions selon vos besoins d’équipe.
- Pour toute question, contactez le mainteneur du thème ou consultez la documentation WordPress sur les shortcodes et les rôles utilisateurs.

---
