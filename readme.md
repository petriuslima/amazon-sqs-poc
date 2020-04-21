
This is a Amazon SQS POC using Laravel **5.6**


## How to use

The instructions below shows the steps to run this POC:

1. Use docker-compose to up the PHP container
2. Create an IAM user on AWS Panel with `AmazonSQSFullAccess` policy
3. Replace the QUEUE_DRIVER on .env to `sqs`
4. Use the IAM Key and Secret and replace the SQS_KEY and SQS_SECRET on .env, respectively
5. Create a SQS queue on AWS Panel
6. Replace SQS_QUEUE config on .env with the queue name
7. Replace SQS_REGION config on .env with the region where the quere is
8. Replace SQS_PREFIX config on .env with the queue URL (without the queue name at the end)
9. Go to `/test-queue` route on your app and you should see that the message was sent to SQS! (I hope! :D)
10. Verify SQS Panel on AWS and see that your queue has a new message
11. Use `docker-compose exec php bash`, navigate to `/var/www` and run `php artisan queue:work` (you should see that ProcessStandard Job was executed.)
12. Go to `/var/www/storage/logs/laravel.log` and you should see a new line with "It works" string (I hope again! :D)
