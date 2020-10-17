<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost you and your team's skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Custom Guidlines

### Environment Setup

Copy ```.env.example``` file in the root folder and rename it as ```.env``` (if you don't have a ```.env``` file).

Then change these fields according to yours.

``` bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

You need to create the database before you run the server.

### Start Server

First open a command line window on project root folder. Then run below commands one after the other.

``` bash
# Install dependencies
composer install

#Install NPM Dependencies
npm install

#Create a copy of your .env file
cp .env.example .env

# Generate application key
php artisan key:generate

#Open the .env file in the project root directory. (This file can be hidden in your syatem, check for hidden files also)

#Change the database and smtp credentials in .env file

#Create the same named database in phpmyadmin which you have saved in .env file

# Database migrations
php artisan migrate

# See the Database. this will create Roles in the DB. Admin and Client Roles.
php artisan db:seed

# Start server in port 8000
php artisan serve

# Start server in a custom port (in here 8800)
php artisan serve --port=8800
```

You can also follow the link below to run this Laravel Project after cloning:<br>
https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/



# FluidMeet Exercise
CRUD Application for Roles, Users and Companies.


<h4>Prerequisites:</h4>

<p><b>-</b> PHP Installed.</p>
<p><b>-</b> Some localhost server installed (e.g. Wamp, Xamp, Lamp etc.).</p>

<h4>Importanat Notes:</h4>

<p><b>-</b> I have used the Laravel version 8.10.0 and PHP version 7.4.4.</p>
<p>For first user registeration, the role should be assigned 'Admin'. <br>
The below command in RegisterController will assign 'Admin' Role to First Registered User.<br>
$user->roles()->attach(1);<br>
This step should be done before registering any user.<br><br>

After the registeration of First User as Admin, by default, all the other registered users should be assigned the role 'Client'.<br>
The below command assigns each registering user the role 'Client' in the RegisterController.<br>
So change the above command to below after registeration of First user:<br>
$user->roles()->attach(2);</p>
