# modulusPHP

## Getting Starterd

### Create a new modulusPHP application

To create a new modulusPHP application, we need to run the following command.

```
composer create-project modulusphp/modulusphp <app-name>
```

> `<app-name>` is the name of your application. e.g. `blog`

*I assume, you already have composer installed, if not. Check out this link https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-16-04*

## Setting up the environment

Rename `.env.example` to `.env`

```
# Application
APP_NAME=modulusPHP
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost
APP_ROOT=/public

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=modulusphp
DB_USERNAME=root
DB_PASSWORD=secret

# Mail
MAIL_USERNAME=example@domain.com
MAIL_PASSWORD=secret
MAIL_FROM_NAME=foo
MAIL_HOST=smtp.domain.com
MAIL_PORT=465 # or 587
MAIL_SMTP_SECURE=ssl # or tls

# C Modulus
C_MODULUS_ENABLE=false
```

Make sure, you have set the **"DB_DATABASE"**, **"DB_USERNAME"** and the **"DB_PASSWORD"**.

## Getting the application ready

### Node.js NPM

Make sure you have nodejs and npm installed then install the dependencies using `npm install`.

*If you don't have node.js, follow this tutorial: https://www.taniarascia.com/how-to-install-and-use-node-js-and-npm-mac-and-windows/*

### Migrations

This part is optional (but recommended). The following command will create a users table. (You will be able to edit the table later if you want to make any changes).

```
php modulus migrate
```

*This will create a users, password_resets and migrations table*

## Running the application

Run the following command to boot up your Application.

```
php modulus serve
```

If port `8000` is already in use, just set your own port. e.g

```
php modulus serve 8001
```

*You can now visit your Application on `http://localhost:<port>`*

## Using C% in modulusPHP

C% (pronounced see modulus) is a new free object-oriented programming language that has a Swift-style syntax and trans-compiles into JavaScript. 
Before you can use C% in modulusPHP, you need to enable it in the .env file.

```
C_MODULUS_ENABLE=true
```

Here's how you can write C% Code in modulusPHP.

```
% // Code stored in resources/views/welcome.modulus.php %

{% extend('cmod.main') %}

```

```
% // Code stored in resources/views/cmod/main.modulus.php %

<@cmodulus

func greet(name) {
  println 'Hello ' + name;

  if name == "Donald" {
    echo name + ' is the creator of C% and modulusPHP';
  }
}

greet('Donald');

@>
```

> {tip} Use the `seshaUI.web` library


That's all!

> Author: Donald Pakkies
