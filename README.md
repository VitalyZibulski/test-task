Firstly, made docker container use image php 8.1 and used laravel 9.2 \
Create console command for parsing csv - ImportPayments \
For parsing csv used generators \
In handle method used service importCsvService with getPayments method \
Created PaymentDTO for sending DTO between layers  \
Then I decided validate DTO, if problem with validation, finish console command and create FailedPayment event and listener who send failed report to support@example.com \
Then when validate passed, use importCsvService with savePayments method \
SavePayments use ProcessPayment job, I decide to make async, for example if we have some problem, always we can retry a task \
All logic in this job was put in transaction, if some problem, transaction will be rollbacked, and also add log errors with payment reference id and errors \
With listeners used public $afterCommit = true to ensure that listeners are only executed after the transaction has been committed \
Also used event and listeners, for example, when payment equals to matched loan amount to pay, LoanFullyProcessed event will be created and work listener SendUserNotification for sending notification \
When payment is greater than matched loan amount to pay, RefundProcessed  event will be created and work listener CreateRefund for creating payments order \ 
Also with dealing with database used Repository layer
