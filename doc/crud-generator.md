# 2. Crud-generator package configuration

>This tutorial uses the package [crud-generator](https://github.com/appzcoder/crud-generator) done by appzcoder and you can install it following the next steps: 

First get the document from packagist
```sh
composer require appzcoder/crud-generator --dev
```

For laravel versions <=5.5 follow the instructions in the owner's repo. For versions >= 5.5 run the next command:
```sh
php artisan vendor:publish --provider="Appzcoder\CrudGenerator\CrudGeneratorServiceProvider"
```
To use this package I recommend to generate a JSON file in the root folder like this, modifying the names and types as you need:
```json
{
    "fields": [
        {
            "name": "title",
            "type": "string"
        },
        {
            "name": "content",
            "type": "text"
        },
        {
            "name": "category",
            "type": "select",
            "options": {
                "technology": "Technology",
                "tips": "Tips",
                "health": "Health"
            }
        },
        {
            "name": "user_id",
            "type": "integer#unsigned"
        }
    ],
    "foreign_keys": [
        {
            "column": "user_id",
            "references": "id",
            "on": "users",
            "onDelete": "cascade"
        }
    ],
    "relationships": [
        {
            "name": "user",
            "type": "belongsTo",
            "class": "App\\User"
        }
    ],
    "validations": [
        {
            "field": "title",
            "rules": "required|max:10"
        }
    ]
}
```

To execute the crud run:
```sh
php artisan crud:generate NameOfYourModel --fields_from_file="/path/to/fields.json" --form-helper=html
```

> The last command will generate: Controller, routes, views, model and migration. 

Finally you should migrate 
```sh
php artisan migrate
```

[Next step ->](authentication.md)