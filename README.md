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

# Bugsnag
BUGSNAG_API_KEY=

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
```

Make sure, you have set the **"DB_DATABASE"**, **"DB_USERNAME"** and the **"DB_PASSWORD"**.

## Getting the application ready

### Node.js NPM (optional)

Make sure you have nodejs and npm installed then install the dependencies using `npm install`.

But before running the `npm install` command, you might want to change the current frontend framework. The default frontend framework is `react`. You can easily change it by running `php craftsman frontend:switch`.

*If you don't have node.js, follow this tutorial: https://www.taniarascia.com/how-to-install-and-use-node-js-and-npm-mac-and-windows/*

### Migrations (optional)

This part is optional (but recommended). The following command will create a couple of tables to get your application ready. (You will be able to edit these tables at a later stage if you want to make any changes).

```
php craftsman migrate all
```

*This will create a users, password_resets, verified_users, magic_links and migrations table*

### Seeders (optional)

Craftsman makes it easy to add testing (fake) data into your application database. You can do this by creating a new seed. You can run `php craftsman craft:seeder <name> --table="<table_name>"` to create a new seed.

e.g
`php craftsman craft:seeder users --table="users"`

And you can run this seed, using the following command `php craftsman seed users --count=10`

The `--count=<int>` represents the number of rows, the seed will add.

*Please note, your application already has the "users" seed.*

## Running the application

Run the following command to boot up your Application.

```
php craftsman serve
```

If port `8000` is already in use, just set your own port. e.g

```
php craftsman serve --port=8001
```

*You can now visit your Application on `http://localhost:<port>`*

That's all!

> Author: Donald Pakkies
