php artisan serve 2>&1 | Select-String "losin" -NotMatch | Select-String "accep" -NotMatch | Select-String "favicon.ic" -NotMatch | Select-String "app" -NotMatch

https://stackoverflow.com/questions/1215260/how-to-redirect-the-output-of-a-powershell-to-a-file-during-its-execution


use dd and dump // dump doesnt stop excecution

php artisan dump-server
