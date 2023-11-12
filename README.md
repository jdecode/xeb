### What do I need?
1. Git - To clone the code
2. Docker and docker-compose - To run the app

### How do I run this locally?
```
docker-compose up -d
```
_This will take a little while to download the images and build the containers_
```
http://200.20.1.1
```

### What services are running, and how are they configured?
Docker-compose based containerised setup having 6 services
1. `web` : Service serving the main Laravel web app
2. `pg` : Postgres DB service
3. `q` : Always-on queue service
4. `mailpit` : For capturing emails in development environments [super awesome] - Accessible at `http://xxx.xxx.xxx.xxx:8025`
5. `0x` : Without xdebug, to run test-cases faster[without coverage] than the `web` service
6. `fe` : Runs `npm run dev` in the background, without you having the need to manually start/stop asset compilation

### What is in the box?
1. Laravel 10.x
2. Admin login is at `/admin` and credentials are `admin@admin.com/admin`
3. Home page, User section and Admin section - all in dark mode
