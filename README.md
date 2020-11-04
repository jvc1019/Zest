# CMSC128

This will be the repository for CMSC 128 - Section 3.
Files included would be for the prototype system we will
create in the scrum process through series of sprints.

Prototype Consultations
- November 4, 2020 (Wireframe Consultation)

Next sprint deadline is November 12, 2020.

First sprint has passed on October 22, 2020.
The first sprint included the mockup designs for our project.
It also included the relational model of the database.

Members:
- Carpio, Eman
- Castaneda, Jayvee
- Faeldonea, Ken
- Garcia, Mico
- Jinon, Robien
- Jomoc, Gracielou
- Luciano, Kirl
- Molina, Janley
- Rabe, Jett Adriel
- Visto, Ronald
- Zamudio, Kent

## Quick Start Guide

### A. Prerequisites

1. To clone the repository on your machine (on Windows, using WSL)
   1. Make sure XAMPP is running Apache and MySQL
   2. Navigate to `xampp\htdocs`
   3. On the navigation bar, type `wsl`
   4. Run the following command:

```
git clone https://github.com/jvc1019/CMSC128.git
```

2. Open `phpMyAdmin`: http://localhost/phpmyadmin/server_databases.php
   1. Create a new database named `database` with `utf8mb4_general_ci` as encoding
   2. Import `database.sql` from `db/database.sql`. It will generate dummy entries which should not be deleted.

### B. Quality-of-Life (QoL) Guide

1. All major components should be wrapped in a div with a class `container`. That way, it will be easier to apply color schemes and stylesheets.

```html
<div class="container">
  <!-- stuff goes here -->
</div>
```

2. All major components should include the `header.php` file at the top. The `header.php` file contains the `<head>`, with the necessary CSS and JS files for cleaner and consistent code.

```php
<?php include('header.php'); ?>
```

After including header.php, only the `<body>` needs to be defined. Notice how the `<div>` with the `container` class is nested inside the body as described in #1. Check out `tasks.php` to see how it works.

```html
<body>
  <div class="container">
    <!-- stuff goes here -->
  </div>
</body>
```

3. For subcomponents that need database access, you can include `conn.php`. Check out `tasks_add.php` to see how it works.

```php
include('conn.php');
```

4. To implement notifications, you may use `notification.php`. Check out `notification.php` to see how to use it.

```php
// I want my notif to appear here
<?php include('notification.php') ?>
```

### C. Using GitHub (on Windows, using WSL)

1.  It is recommended to use Visual Studio Code as your text editor as it offers an easy way of resolving merge conflicts. (**Optional**) Instructions on how to integrate WSL with Visual Studio Code: https://code.visualstudio.com/docs/remote/wsl

2.  Navigate inside the repository location (`xampp\htdocs\CMSC128`). On the navigation bar, type `wsl`
    1. To get the latest version of the repository (needs an internet connection): `git pull`
    2. Switch to a separate branch if you're planning to alter another team member's code, then initiate a `pull request`. Do not commit your changes to `main` unless **you're only altering your own code**.
    3. To add files for staging: `git add file_path`
    4. To commit the changes: `git commit -m message` Note: You can commit even when offline. **Do not commit after every little change.**
    5. Committing your changes only affects your working tree. To push the changes to the remote repository (needs an internet connection): `git push`. But remember to `git pull` or `git fetch` (safer than `git pull`) before `git push` to lessen the chances of "merge conflicts" 🙈. Difference of `git fetch` and `git pull`: https://www.git-tower.com/learn/git/faq/difference-between-git-fetch-git-pull/
