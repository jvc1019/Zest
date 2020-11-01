# CMSC128

This will be the repository for CMSC 128 - Section 3.
Files included would be for the prototype system we will
create in the scrum process through series of sprints.

FIRST PROTOTYPE CONSULTATION SHOULD BE DONE BEFORE NOVEMBER 10, 2020.

Next sprint deadline is November 10, 2020.

First sprint has passed on October 22, 2020.
The first sprint included the mockup designs for our project.
It also included the relational model of the database.

## Quick Start Guide

### A. Prerequisites

1. To clone the repository on your machine (on Windows, using WSL)
   i. Make sure XAMPP is running Apache and MySQL
   ii. Navigate to `xampp\htdocs`
   iii. On the navigation bar, type `wsl`
   iv. Run the following command:

```
git clone https://github.com/jvc1019/CMSC128.git
```

2. Open `phpMyAdmin`: http://localhost/phpmyadmin/server_databases.php
   i. Create a new database named `database` with `utf8mb4_general_ci` as encoding
   ii. Import `database.sql` from `db/database.sql`. It will generate dummy entries which should not be deleted.

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

### C. Using GitHub (on Windows, using WSL)

1.  It is recommended to use Visual Studio Code as your text editor as it offers an easy way of resolving merge conflicts.

2.  Navigate inside the repository location (`xampp\htdocs\CMSC128`). On the navigation bar, type `wsl`
    i. To get the latest version of the repository (needs an internet connection): `git pull`
    ii. To add files for staging: `git add file_path`
    iii. To commit the changes: `git commit -m message` Note: You can commit even when offline. Do not commit after every little change.
    iv. Committing your changes only affects your working tree. To push the changes to the remote repository (needs an internet connection): `git push`. But remember to `git pull` before `git push` to lessen the changes of "merge conflicts" 🙈.
