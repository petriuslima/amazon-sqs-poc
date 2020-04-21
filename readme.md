
This is a Amazon SQS POC using Laravel **5.6**


## How to use

The instructions below shows the steps to run this POC:


### Laravel Install

1. Clone this repository
1. Use `docker-compose up -d` to start the PHP container
2. Copy .env.example to .env
3. Change permissions for `storage` and `bootstrap/cache` folders using `sudo chown -R http:http <folder_name>`
4. Enter on PHP docker container bash using `docker-compose exec php bash` and navigate to `/var/www`
5. Run `composer install` to install all dependencies
6. Run `php artisan key:generate` to generate .env APP_KEY
7. exit PHP docker container bash using `exit`
8. Using your web browser, go to http://localhost and you will see your welcome page


### Configuring environment

1. Create an IAM user on AWS Panel with `AmazonSQSFullAccess` policy
2. Replace the QUEUE_DRIVER on .env to `sqs`
3. Use the IAM Key and Secret and replace the SQS_KEY and SQS_SECRET on .env, respectively
4. Create a SQS queue on AWS Panel
5. Replace SQS_QUEUE config on .env with the queue name
6. Replace SQS_REGION config on .env with the region where the quere is
7. Replace SQS_PREFIX config on .env with the queue URL (without the queue name at the end)
8. From the welcome page, click on `TEST A SINGLE QUEUE` or `TEST A CHAINED QUEUE` and you should see that the message was sent to SQS! (I hope! :D)
9. Verify SQS Panel on AWS and see that your queue has a new message
10. Use `docker-compose exec php bash`, navigate to `/var/www` and run `php artisan queue:work`. You should see that ProcessStandard Job was executed. (Use `ctrl + C` to stop)
11. Go to `/var/www/storage/logs/laravel.log` and you should see some Jobs strings (I hope again! :D)
