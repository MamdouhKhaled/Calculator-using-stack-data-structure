# Calculator 


### Create and using 
```php
    use \App\Classes\Calculator;

    $value = "( (25+25) + 10 ) / 30 "; 
    $calculator = new Calculator($value);
```
### Check Brackets in sync or not
```
    ( (25+25) + 10 ) / 30  # in sync
    ( (25+25 + 10 ) / 30  # not in sync open not close 
```
### Convert From inFix to PostFix
```
( (25+25) + 10 ) / 30 
to 
25 25 + 10 + 30 /
```

### Do some Math and Done