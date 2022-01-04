# Restart Technology Game Test

## DB columns are:
* :flashlight: id -> integer .. primary field <br>
* :flashlight: number -> integer .. to save the guesses numbers <br>
* :flashlight: created_at -> timestamp .. get current stamp  <br> <br> <br>
 
## How to start?:
There are TWO functions to start and play the game, The first is
```php 
    get_result('secret_player1', 'guess_number') 
```
and like you see it's have two parameters. <br> 
The first is the secrect number for the first player, and the secnod number is the guessing of the secrect number for the play two. <br> 

---------------------------------------------------------

The second function is
```php 
     guess() 
```
and it used to create a random number consiste of 5 unique number as a guessing number. <br>
And validate it if the number have any type of value not integer and if the number smallest than 5 numbers. <br>
And check the guess number if exist in the Database .. if not exist the function will be save it as a guessing number. 



