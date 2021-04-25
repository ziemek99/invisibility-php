# invisibility-php
Hide your website in plain sight by making it accessible only after entering a secret token, returning error 404 otherwise.

## How to use
Edit `config.php` to match your server's behavior and personal preferences, then just prepend every text file you want to protect with:
```php
<?php
session_start();
require 'invisibility.php';
?>
```
Then append `.php` to the file extension and your files will be protected!

## Automation
You can automate some of requirements. Instead of manually prepending the PHP code above, you can save it to a separate file
and auto-prepend it by `auto_prepend_file` in `php.ini`. If you're using Apache HTTP Server, you can omit changing all text files' extensions
and instead force them to be interpreted by PHP interpreter by fiddling with `.htaccess` or `httpd.conf` (do your own research, I haven't figured that out yet).
