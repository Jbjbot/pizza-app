## Guide d'installation de l'application

1. Installer les dépendances
    ```sh
    $ composer install
    ```
2. Créer un fichier .env suivant le .env.example puis renseigner les informations de connexion à la base de données
  * Database variables
    * `DB_DATABASE` - Database name
    * `DB_USERNAME` - Database user
    * `DB_PASSWORD` - Database password

3. Générer la clé de l'application
    ```sh
    $ php artisan key:generate
    ```

4. Installer la base de données
    ```sh
    $ php artisan migrate
    ```

5. Lancer le serveur de développement
    ```sh
    $ php artisan serve
    ```

