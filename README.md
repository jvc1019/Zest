# CMSC128

This will be the repository for CMSC 128 - Section 3. Files included would be for the prototype system we will create in the scrum process through series of sprints.

## Zoom Meeting Details:

- Link: https://up-edu.zoom.us/j/89346774676
- Meeting ID: 893 4677 4676
- Passcode: Cmsc128-3

## Sprints

Next sprint deadline is November 12, 2020.

### 1. First sprint (October 22, 2020)

- The first sprint included the mockup designs for our project.
- It also included the relational model of the database.

## Consultations

- November 4, 2020 (Wireframe Consultation)

## Members:

### 1. FRONT END (User Interface)

- Carpio, Eman
- Faeldonea, Ken
- Jinon, Robien
- Visto, Ronald

### 2. BACK END (Database)

- Castaneda, Jayvee (Reminders)
- Garcia, Mico (Subjects)
- Jomoc, Gracielou (Notebook)
- Luciano, Kirl (Notebook)
- Molina, Janley (Tasks)
- Rabe, Jett Adriel (Subjects)
- Zamudio, Kent (Customization)

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
   2. Import `database.sql` from `db/database.sql`. **It will generate dummy entries which should not be deleted.**

### B. Quality-of-Life (QoL) Guide

1. All major components (tasks, notebook, subjects) should be wrapped in a `div` with the class `container`. That way, it will be easier to apply color schemes and stylesheets.

```html
<div class="container">
  <!-- stuff goes here -->
</div>
```

#### For the UI people

- Stylesheets will affect the basic colors of the the elements inside the `container` class. For example, under a theme called **"Blue Marine"** located in `src/css`:

  ```css
  html {
    scroll-behavior: smooth;
  }

  body {
    background-image: url("../resources/somethingBlue.jpg"); /* theme image also applies to the tasks, subjects, and notes" */
    background-size: cover;
    background-repeat: no-repeat;
  }

  .navbar {
    background-color: blue;
  }

  .container .list-group-item {
    /* affects Bootstrap lists */
    background-color: lightblue; /* something lighter than the bg color of the navbar*/
  }

  .container .card-item {
    /* affects Bootstrap cards */
    background-color: lightblue; /* something lighter than the bg color of the navbar*/
  }
  ```

- While a CSS called **"Green Sapphire"** may look like this:

  ```css
  html {
    scroll-behavior: smooth;
  }

  body {
    background-image: url("../resources/somethingGreen.jpg"); /* theme image also applies to the tasks, subjects, and notes" */
    background-size: cover;
    background-repeat: no-repeat;
  }

  .navbar {
    background-color: green;
  }

  .container .list-group-item {
    /* affects Bootstrap lists */
    background-color: lightgreen; /* something lighter than the bg color of the navbar */
  }

  .container .card-item {
    /* affects Bootstrap cards */
    background-color: lightgreen; /* something lighter than the bg color of the navbar*/
  }
  ```

- As much as possible, **follow the Bootstrap 4 convention and its built-in classes for layouting elements** to avoid huge amounts of CSS and JS files for every page, and to make the UI **more consistent**. If you need a **box**, you probably need a **Bootstrap Card**.

2. Most components (navbar, tasks, notebook, subjects) should include the `header.php` file at the top. The `header.php` file contains the `<head>`, with the necessary CSS and JS files for cleaner and consistent code.

```php
<?php include('header.php'); ?>
```

- After including `header.php`, **only the `<body>`, or additionally, the `<footer>` needs to be defined**. Notice how the `<div>` with the `container` class is nested inside the body as described in #1. Check out `tasks.php` to see how it works.

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

4. To implement notifications, you may use `notification.php`. Check out `notification.php` to see how to use it, and around lines 114-135 on `tasks.php` to see a sample implementation.

```php
// I want my notif to appear here
<?php include('notification.php') ?>
```

5. There are some useful functions provided by **jQuery** to shorten your Javascript code, such as
   1. Selectors by class and id
      1. `$("#id_of_element")` -> selects an element by ID, shorter than the `document.getElementById("id_of_element")` command.
      2. `$(".class_of_element")` -> selects element(s) by class
   2. `$("#id_of_element").click(function)` -> Calls a function when the element is clicked.
   3. `$("#id_of_element").val()` -> a setter and a getter, when a string argument is inside `val()`, the element's value tag is set to the string. If there is no argument, then the value of the element is retrieved.
   4. `$("#id_of_element").text()` a setter and getter, when an argument is specified, it replaces the text inside the element. Useful for buttons that change text when clicked, for instance
   ```javascript
   $("#my_Button").click(function (e) {
     $(this).text("My text is changed");
   });
   ```

### C. Using GitHub (on Windows, using WSL)

1.  It is recommended to use Visual Studio Code as your text editor as it offers an easy way of resolving merge conflicts. If there's a merge conflict, open the affected file in Visual Studio Code and options such as **"accept current change"** and **"accept incoming change"** will be shown.

2.  Navigate inside the repository location (`xampp\htdocs\CMSC128`). On the navigation bar, type `wsl`
    1. To get the latest version of the repository (needs an internet connection): `git pull`
    2. **Switch to a separate branch if you're planning to alter another team member's code**, then ask that team member's permission or create a `pull request` before merging/pushing your changes. **Do not commit your changes to `main` immediately unless you're only altering your own code**.
    3. To add files for staging: `git add file_path`
    4. To commit the changes: `git commit -m message` Note: You can commit even when offline. **Do not commit after every little change.**
    5. Committing your changes only affects your working tree. To push the changes to the remote repository (needs an internet connection): `git push`. But remember to `git pull` or `git fetch` (safer than `git pull`) before `git push` to lessen the chances of "merge conflicts" 🙈. **Must read: [Difference of `git fetch` and `git pull`](https://www.git-tower.com/learn/git/faq/difference-between-git-fetch-git-pull/)**
