# modulusPHP

## Getting Starterd

### Install modulusPHP dependencies

Before we can do anything, we first need to make sure that we have all the dependencies modulusPHP is using. To do this, we need to run the following command.

```
composer install
```

*I assume, you already have composer installed, if not. Check out this link https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-16-04*

## Setting up the environment

Rename `.env.example` to `.env`

```
APP_NAME=modulusPHP
APP_ENV=development
APP_DEBUG=true
APP_URL=http://localhost
APP_ROOT=/public

C_MODULUS_ENABLE=false

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=modulusphp
DB_USERNAME=root
DB_PASSWORD=
```

Make sure, you have set the **"DB_DATABASE"**, **"DB_USERNAME"** and the **"DB_PASSWORD"**.

## Getting the application ready

This part is optional (but recommended). The following command will create a users table. (You will be able to edit the table later if you want to make any changes).

```
php modulus migrate users
```

*This will create a users table*

> Alternatively, you can run `php modulus migrate`

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


That's all!

> Author: Donald Pakkies

## Using C% in modulusPHP

C% (pronounced see modulus) is a new free object-oriented programming language that has a Swift-style syntax and trans-compiles into JavaScript. 
Before you can use C% in modulusPHP, you need to enable it in the .env file.

```
C_MODULUS_ENABLE=true
```

Here's how you can write C% Code in modulusPHP.

```
% // Code stored in resources/views/welcome.modulus.php %

{% extends('cmod/main.c') %}

```

```
% // Code stored in resources/views/cmod/main.c.modulus.php %

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