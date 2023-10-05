# Php-Laravel-Inovices
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![jQuery](https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white)

 An invoice project using Laravel is a web application that allows users to create, manage, and print invoices. It can be used by businesses of all sizes to streamline their billing process.

 ## Installation:

1. Clone the repository :

```
git clone https://github.com/sharkblue58/php-laravel-invoice.git
```
2. Install the dependencies :

```
composer install
```
```
npm install
```

3.	Copy the ```.env.example``` file to ```.env``` and update the environment variables.

4.	Generate the app key :

```
php artisan key:generate
```
   
6.	Create the database :

```
php artisan migrate
```

7. Seed the database :
   
```
php artisan db : seed
```

8.	Start the development server

```
php artisan serve
```
```
npm run dev
```

## Usage:

The project can be accessed at ```http://127.0.0.1:8000``` in your browser.

## Features:

- Create, manage, and print invoices
- Add section to invoices with all details
- Calculate taxes and discounts
- Generate PDF invoices
- Send invoices via email
- View invoice history

## Gallery

<div>
<img src="https://github.com/sharkblue58/php-laravel-invoice/blob/main/public/assets/gallery/invovice1.png" width="200">
</div>

## Contributing Guidelines

To contribute to this project, please follow these steps:

1-Fork the repository.
2-Create a new branch for your contribution.
3-Make your changes.
4-Commit your changes with a descriptive message.
5-Push your branch to your fork.
6-Open a pull request against the upstream repository.

 **_NOTE:_** Please make sure to follow the coding style guide and testing guidelines when making your contributions.

## Deployment:

To deploy the project to production, you can use a variety of methods, such as Laravel Forge, Capistrano, or Deployer.

## License:

This project is licensed under the **MIT** License.

## Credits

This project was created by **Mohamed Essam** .


