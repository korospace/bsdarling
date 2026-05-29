<p align="center">
    <h1 align="center">
        Website Banksampah Darling
    </h1>
</p>

## Requirements

- php 7.3 or higher
- [composer 2.3.4](https://getcomposer.org/)
- mysql

## Setup

<ol>
    <li> Clone <b>or</b> Download as ZIP
    <li> Change Directory to root project </li>
    <li> Create database <b>db_bst</b> </li>
    <li> run:</li>
</ol>

```
composer install

php spark migrate

php spark db:seed AppSeed

php spark serve -port 8888
```
