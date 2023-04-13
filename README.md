### Prerequisites
1. Git - To clone the repo
2. Docker and docker-compose - To run the app

### Run locally

```
docker-compose up -d
```
_This will take a little while to download the images and build the containers_
```
http://200.20.1.1
```

Included:
1. Laravel 10.x
2. Docker-compose based containerised setup having 6 services
    1. `web` : Service serving the main Laravel web app
    2. `pg` : Postgres DB having 2 databases - `postgres` as the primary DB and `testing` as the DB used by Pest/PhpUnit
    3. `q` : For constantly running background queue `php artisan queue:listen` so that you don't have to worry about sending jobs in the background
    4. `mailpit` : For capturing emails in development environments [super awesome]
    5. `0x` : Without xdebug, to run test-cases faster[without coverage] than the `web` service
    6. `fe` : Runs `npm run dev` in the background, without you having the need to manually start/stop asset compilation
3. Login and Register links are on the homepage [top-right] - the default Breeze setup
4. Admin login is at `/admin` and credentials are `admin@admin.com/admin` - you will need to run `php artisan db:seed` before using the credentials [seeders are NOT run with the default setup]
5. Dark mode - Home page, User section anD Admin section
