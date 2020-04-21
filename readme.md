
## How to use

The instructions below shows the steps to run this POC:

1. Use docker-compose to up the PHP container
2. Create an IAM user on AWS Panel with `AmazonSQSFullAccess` policy
3. Use the IAM Key and Secret and replace the SQS_KEY and SQS_SECRET on .env, respectively
4. Create a SQS queue on AWS Panel
5. Replace SQS_QUEUE config on .env with the queue name
6. Replace SQS_REGION config on .env with the region where the quere is
7. Replace SQS_PREFIX config on .env with the queue URL (without the queue name at the end)
8. Go to `/test-queue` route on your app and you should see a message that everything worked! (I hope! :D)
