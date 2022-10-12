 # How to run this project




 #Step One
 # Run this commend
 
 

 
```bash
    composer install
```

## Step two
```
    composer require intervention/image
```
## Step 

## Connection database 
```
    DB_DATABASE=phone-book
```

## Step three
```
    php artisan migrate:fresh --seed
```

## Step
### admin login info
```
 Email: admin@gmail.com
 Password: admin@gmail.com

```


## Step four
### open another terminal and run the below command for mail queue work 
```
    php artisan queue:work
```
