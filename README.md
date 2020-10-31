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

After including header.php, only the `<body>` needs to be defined. Notice how the `<div>` with the `container` class is nested inside the body as described in #1.

Check out `tasks.php` to see how it works.

```html
<body>
  <div class="container">
    <!-- stuff goes here -->
  </div>
</body>
```

3. For subcomponents that need database access, you can include `conn.php`.

Check out `tasks_add.php` to see how it works.

```php
include('conn.php');
```
