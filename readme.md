## Framework
> Laravel 5.7

## Instalacja
```
$ git clone project
$ cd project_folder
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan storage:link
```

## CLI
> Komenda:
```
generate-codes [options]
```

> Dostępne opcje:
```
--numberOfCodes[=NUMBEROFCODES]   [default: "10"]
--lengthOfCode[=LENGTHOFCODE]     [default: "10"]
--file[=FILE]                     [default: "kody.txt"]
```
>Użycie:
```
php artisan generate-codes
```
>Ścieżka do pliku:
```
1. project_folder/storage/app/public/kody.txt

2. http://localhost:8000/storage/kody.txt
```