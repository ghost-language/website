## Ghost Website
This is the source of the official [Ghost website](https://ghostlang.org). The website is powered by PHP using the Laravel framework. If you're looking for documentation, they may be found at [https://github.com/ghost-language/docs](https://github.com/ghost-language/docs).

## Local Development
If you want to work on this project on your local machine, you may follow the instructions below. These instructions assume you are serving the site using Laravel Valet out of your `~/Sites` directory:

1. Fork this repository
2. Open your terminal and `cd` to your `~/Sites` folder
3. Clone your fork into the `~/Sites/ghostlang` folder, by running the following command *with your username placed into the {username} slot*:
    ```bash
    git clone git@github.com:{username}/website ghostlang
    ```
4. CD into the new directory you just created:
    ```bash
    cd ghostlang
    ```
5. Run the `setup.sh` bin script, which will take all the steps necessary to prepare your local install:
    ```bash
    ./bin/setup.sh
    ```

### Syncing Upstream Changes Into Your Fork
This [GitHub article](https://help.github.com/en/articles/syncing-a-fork) provides instructions on how to pull the latest changes from this repository into your fork.

### Updating After Remote Code Changes
If you pull down the upstream changes from this repository into your local repository, you'll want to update your Composer and NPM dependencies, as well as update your documentation branches. For convenience, you may run the `bin/update.sh` script to update these things:

```bash
./bin/update.sh
```