<a name="readme-top">

<br/>

<br />
<div align="center">
  <a href="https://github.com/SaiZai-bot/">
  <!-- TODO: If you want to add logo or banner you can add it here -->
  </a>
<!-- TODO: Change Title to the name of the title of your Project -->
  <h3 align="center">Meeting Calendar</h3>
</div>
<!-- TODO: Make a short description -->
<div align="center">
  This website will allow users to take note of meeting with short descriptions and a date.
</div>

<br />

<!-- TODO: Change the zyx-0314 into your github username  -->
<!-- TODO: Change the WD-Template-Project into the same name of your folder -->

![](https://visit-counter.vercel.app/counter.png?page=SaiZai-bot/AD-Task-Act-3)

[![wakatime](https://wakatime.com/badge/user/04412757-f1c1-4ba6-86ec-7b8428992c73/project/828a0f0d-70ed-4049-9336-126fb1b52739.svg)](https://wakatime.com/badge/user/04412757-f1c1-4ba6-86ec-7b8428992c73/project/828a0f0d-70ed-4049-9336-126fb1b52739)

---

<br />
<br />

<!-- TODO: If you want to add more layers for your readme -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
      <ol>
        <li>
          <a href="#key-components">Key Components</a>
        </li>
        <li>
          <a href="#technology">Technology</a>
        </li>
      </ol>
    </li>
    <li>
      <a href="#rule,-practices-and-principles">Rules, Practices and Principles</a>
    </li>
    <li>
      <a href="#resources">Resources</a>
    </li>
  </ol>
</details>

---

## Overview

<!-- TODO: To be changed -->
<!-- The following are just sample -->

This website will allow users to take note of meeting with short descriptions and a date.

### Key Components

<!-- TODO: List of Key Components -->
<!-- The following are just sample -->

- setting meeting 
- input and display that is connected to database

### Technology

<!-- TODO: List of Technology Used -->
#### Language
![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

#### Databases
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql&logoColor=white)

## Rules, Practices and Principles

<!-- Do not Change this -->

1. Always use `AD-` in the front of the Title of the Project for the Subject followed by your custom naming.
2. Do not rename `.php` files if they are pages; always use `index.php` as the filename.
3. Add `.component` to the `.php` files if they are components code; example: `footer.component.php`.
4. Add `.util` to the `.php` files if they are utility codes; example: `account.util.php`.
5. Place Files in their respective folders.
6. Different file naming Cases
   | Naming Case | Type of code         | Example                           |
   | ----------- | -------------------- | --------------------------------- |
   | Pascal      | Utility              | Accoun.util.php                   |
   | Camel       | Components and Pages | index.php or footer.component.php |
8. Renaming of Pages folder names are a must, and relates to what it is doing or data it holding.
9. Use proper label in your github commits: `feat`, `fix`, `refactor` and `docs`
10. File Structure to follow below.

```
AD-Task-3
└─ assets
|   └─ css
|   |   └─ style.css
└─ commponents
|   └─ templates
|      └─ footer.component.php
|      └─ header.component.php
|      └─ nav.component.php
└─ database
|   └─ meeting_users.model.sql
|   └─ meeting.model.sql
|   └─ task.model.sql
|   └─ user.model.sql
└─ handlers
|   └─ mongodbChecker.handler.php
|   └─ postgreChecker.handler.php
└─ pages
|  └─ viewMeet
|     └─ assets
|     |  └─ css
|     |  |  └─ style.css
|     └─ index.php
└─ utils
|   └─ db.utils.php
|   └─ dbResetPostgresql.utils.php
|   └─ envSetter.utils.php
|   └─ htmlEscape.utils.php
└─ vendor
└─ .env
└─ .gitignore
└─ bootstrap.php
└─ compose.yaml
└─ composer.json
└─ composer.lock
└─ index.php
└─ readme.md
└─ router.php
```
> The following should be renamed: name.css, name.js, name.jpeg/.jpg/.webp/.png, name.component.php(but not the part of the `component.php`), Name.utils.php(but not the part of the `utils.php`)

## Resources

<!-- TODO: Add References -->

| Title        | Purpose                                                                       | Link          |
| ------------ | ----------------------------------------------------------------------------- | ------------- |
| ChatGpt | AI assistance for debugging | chatgpt.com |
| W3School | PHP, CSS, and HTML syntax | w3School.com |

