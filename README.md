# nael-maths

Perform for AWA 1


## Requirements

| Tools                                         | Version |
| --------------------------------------------- | ------- |
| [Composer](https://getcomposer.org/download/) | 2.4.4   |
| [NPM](https://www.npmjs.com/)                 | 8.19.2    |
| [php](https://www.php.net/)  | 8.1.12   |
| [vue](https://v2.vuejs.org/v2/guide/)  | 3.2.36   |
| [Gsap](https://greensock.com/docs/v3/Installation)  | 3.11.4   |
| [motion](https://motion.dev/vue/quick-start)  | 10.15.5   |
| [aos](https://michalsnik.github.io/aos/)  | 2.3.4  |





## Installation

1. Clone the repo

    ```bash
    https://github.com/robielcpnv/nael-maths.git
    ```

2. Install dependencies

    ```bash
    cd nael-maths
    composer i
    npm i
    ```

3. Build assets

    ```bash
    npm run dev
    ```

4. Generate application key and add it in `.env`
    ```bash
    php artisan key:generate
    cp .env.example .env
    ```

## Usage

The environment variables are configured in .env which is located at the root of the project.


```
# .env

DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=<CHANGE>
DB_USERNAME=<CHANGE>
DB_PASSWORD=<CHANGE>
```


### Fake Data

Populate the database with fake data

```sh
php artisan migrate:fresh --seed
```

## Usage

Compile the JavaScript and CSS assets: ```npm run dev```

Start the development server: ```php artisan serve```

```
  VITE v4.0.4  ready in 2197 ms

  ➜  Local:   http://localhost:5174/
  ➜  Network: use --host to expose
  ➜  press h to show help

  LARAVEL v9.47.0  plugin v0.7.3

  ➜  APP_URL: http://localhost:8000
  ```

Note
This is a basic readme file for a laravel project with vue.js, you can add more details according to your project's requirements.
