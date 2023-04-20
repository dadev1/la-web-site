# About Ecommerces site (Laravel+Vuejs+Docker+Docker)

This project `Laravel + Vue.JS Lifeanalytics` is based on `docker`

# <span style="color:#007bff"> Table of content </span>

-   [Prerequisites](#Prerequisites)
-   [Technologies](#Technologies)
-   [Setup Environment](#Setup-Environment)
-   [ERD](#ERD)
-   [Contribute]

## Prerequisites

---

Make sure you have insalled the following prerequisites in your development or production machine.

-   `PHP v8.x` - [Download & install PHP](https://www.php.net/downloads.php) make sure that the PHP 8.x version has been installed on your machine.

-   `Node v14` - [Download & install Node](https://nodejs.org/download/) make sure that the Nodejs 14.15 version has been installed on your machine.

-   `Docker` - [Download & install Docker](https://docs.docker.com/get-docker/) make sure that the latest docker version has been installed on your machine.

### Technologies

---

List of technologies which are used in this project.

-   PHP : Version 8.x
-   Laravel: Version 8.x
-   MySQL: Version 7
-   Node: Version 14.15.0

### Setup Environment for Development:

-   Build `docker-compose build`.
-   Run `docker-compose up -d` for development purpose.
-   Open favourite browser and type `http://localhost`. If you wan to run on different port, you can change the `HTTP_PORT` from `.env` file.

### Setup Environment for Production:

-   Copy `.env.example` to `.env`.
-   Change the necessary staff in `.env` file.
-   Run `docker-compose -f docker-compose.production.yml up` for production.
-   Open favourite browser and type `http://localhost`. If you wan to run on different port, you can change the `HTTP_PORT` from `.env` file.

## Contribute

Contribution are alwasy welcome! Please read the [contribution guidelines](contributing.md) first.

-   Fork this project to your personal account.
-   Create your feature branch `git checkout -b feature/foo`.
-   Commit your changes `git commit -am 'Add some foo`.
-   Push to the branch `git push origin feature/foo`.
-   Create a new Pull Request.

## About design

1) Create two Ecommerces, an agency and a customer user.
2) Create a billing function to the agency
3) Link the subscription web application with customer data.

-  Ecommerce meterial link: https://drive.google.com/file/d/1WN3JRPdzGehnQn7DCiQP0bGPJz_lC73N/view?usp=sharing
     
## About GCP
- url : https://console.cloud.google.com/home/dashboard?project=capable-alcove-265511&hl=ja 

## ERD
[erd](documents/erd.png)
