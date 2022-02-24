Developer Documentation Draft for Course Maker Pro Theme

## Prerequisites
Node and npm are required for Gulp and SASS, and to compile the project.
Composer and phpcs are optional for ensuring your code conforms to the WordPress Coding Standards.

[How to Install Node.js and NPM on a Mac](http://blog.teamtreehouse.com/install-node-js-npm-mac)

[How to Install Node.js and NPM on Windows](http://blog.teamtreehouse.com/install-node-js-npm-windows)

The versions required of ```node```, ```npm```, and ```node-sass``` are marked below:

```bash
npm - 6.4.1
node - 10.15.3
node-sass - 4.14.1
```

Recommended is to install NVM and switch versions that way: https://github.com/nvm-sh/nvm

Once NVM is installed, you can do the following:

```bash
nvm install 10.15.3
```

And then to switch to the version:

```bash
nvm use 10
```

Check your verions of ```node``` and ```npm``` respectively.

```
node -v
npm -v
```

- - - -

## Install Gulp

The Gulp version required is 3.9.x. If you are running Gulp 4 or later, you can install Gulp 3.9.x in the theme direcgtory.

## Clone the Course Maker Pro theme repo.
[GitHub](https://github.com/brandid/course-maker-pro)

Once the Child theme is installed, from the child theme folder in Terminal type:

`npm install`

At the terminal type `gulp watch`

This will fire up the Gulp watch task - it will sit back and watch for any changes you make to the source src/.css files, when you save a file the task will run, process your CSS files, and place them in the child theme folder.

If you receive any errors, it is likely the node version is a mismatch.

- - - -

## Install Composer and phpcs

[How to Install Composer](https://getcomposer.org/download/)

[phpcs](https://github.com/squizlabs/PHP_CodeSniffer)

Once phpcs is installed, you can install the WordPress Coding Standards:

[WordPress Coding Standards for phpcs](https://github.com/WordPress/WordPress-Coding-Standards)

Once these are installed, you can open Terminal and run the phpcs function on a file to check for any errors or warnings:

`phpcs functions.php`
