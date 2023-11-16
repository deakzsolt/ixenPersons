## About the test

This is a simple laravel 10 test project to manipulate the persons data. For this project you will need the following

- php 8.1 or above
- postgres database
- minimum knowledge of setting up a host

First clone this repository and follow the steps to make this work.

## First steps

You will need to setup your own environment from where you wish to run the laravel project. I have set in my own hosts file the following domain 127.0.0.1	persons.local. In the rest of the example I will use this as reference but you can choose what fits you the best.

When the above is set go to the cloned project and change the .env.exmaple file to .env. In the env file you will need to setup your database access:
```
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=ixen
DB_USERNAME=admin
DB_PASSWORD=secret
```
The above data are my own local setup so you can create what fits you the best. The database name is not mandatory to be ixen it can be anything what fits you the best.

## Initialising

All commands should be run from the project folder.

When the database is set you need to run the following command:
```
composer upgrade
```
After this you need to create the database structure by running the following command:
```
php artisan migrate
```
When the migration is done we need to populate the database with example data, for this run this command:
```
php artisan db:seed
```
## Persons database UI

Visiting the home page of persons.local you can get a list of persons. There is a option to add, edit and delete.

## Api requests

### Returns all person data.
```
http://persons.local/api/list
Type: GET
Response: JSON Array
Example:
[
  {
    "id": 15,
    "first_name": "Jaunita",
    "middle_name": "",
    "last_name": "Ondricka",
    "permanent_address": "7357 Drew Corners Apt. 785\nHilmabury, MN 53557-3563",
    "temporary_address": "31095 Bednar Lock Suite 234\nNorth Sabinaville, ND 42962-0548",
    "created_at": "2023-11-15T19:25:59.000000Z",
    "updated_at": "2023-11-15T19:25:59.000000Z",
    "person_emails": [
      {
        "id": 73,
        "person_id": 15,
        "email": "fahey.aletha@example.net",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      },
      {
        "id": 74,
        "person_id": 15,
        "email": "rboehm@example.org",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      }
    ],
    "person_mobiles": [
      {
        "id": 59,
        "person_id": 15,
        "mobile_number": "+3670457596",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      },
      {
        "id": 60,
        "person_id": 15,
        "mobile_number": "+3630684612",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      }
    ],
    "person_telephones": [
      {
        "id": 86,
        "person_id": 15,
        "telephone_number": "+361341094",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      },
      {
        "id": 87,
        "person_id": 15,
        "telephone_number": "+361590548",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      },
      {
        "id": 88,
        "person_id": 15,
        "telephone_number": "+361509288",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      },
      {
        "id": 89,
        "person_id": 15,
        "telephone_number": "+361320869",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      },
      {
        "id": 90,
        "person_id": 15,
        "telephone_number": "+361830222",
        "created_at": "2023-11-15T22:09:21.000000Z",
        "updated_at": "2023-11-15T22:09:21.000000Z"
      }
    ]
  },
  {
    "id": 14,
    "first_name": "Shaylee",
    "middle_name": "",
    "last_name": "Ullrich",
    "permanent_address": "6316 Harvey Course Suite 701\nEast William, MN 36137",
    "temporary_address": "",
    "created_at": "2023-11-15T19:25:59.000000Z",
    "updated_at": "2023-11-15T19:25:59.000000Z",
    "person_emails": [
      {
        "id": 50,
        "person_id": 14,
        "email": "terry.vella@example.com",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      },
      {
        "id": 51,
        "person_id": 14,
        "email": "pkunde@example.com",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      }
    ],
    "person_mobiles": [
      {
        "id": 38,
        "person_id": 14,
        "mobile_number": "+3630377157",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      },
      {
        "id": 39,
        "person_id": 14,
        "mobile_number": "+3670638175",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      },
      {
        "id": 40,
        "person_id": 14,
        "mobile_number": "+3620169445",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      }
    ],
    "person_telephones": [
      {
        "id": 50,
        "person_id": 14,
        "telephone_number": "+361711069",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      },
      {
        "id": 51,
        "person_id": 14,
        "telephone_number": "+361187006",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      },
      {
        "id": 52,
        "person_id": 14,
        "telephone_number": "+361878026",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      },
      {
        "id": 53,
        "person_id": 14,
        "telephone_number": "+361949550",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      },
      {
        "id": 54,
        "person_id": 14,
        "telephone_number": "+361353432",
        "created_at": "2023-11-15T19:25:59.000000Z",
        "updated_at": "2023-11-15T19:25:59.000000Z"
      }
    ]
  },
]
```
### Creates new person with data.
```
http://persons.local/api/create
Type: POST
Response: JSON Array
Success example:
{
    "id": 21,
    "first_name": "Valkyr",
    "middle_name": null,
    "last_name": "McManus",
    "permanent_address": "1234 Citty Street 1",
    "temporary_address": null,
    "created_at": "2023-11-16T08:50:15.000000Z",
    "updated_at": "2023-11-16T08:50:15.000000Z",
    "person_emails": [],
    "person_mobiles": [],
    "person_telephones": []
}

Error example:
{
    "errors": {
        "last_name": [
            "The last name field is required."
        ]
    },
    "status": 400
}
```
### Returns single person data.
In the request {person} expects person id.
```
http://persons.local/api/edit/{person}
Type: GET
Response: JSON Array
Success example:
{
  "id": 1,
  "first_name": "Jarrell",
  "middle_name": "Cielo",
  "last_name": "Buckridge",
  "permanent_address": "923 King Mews\nLake Arnulfo, AK 84647-6742",
  "temporary_address": "5933 Champlin Field\nNorth Veronicabury, AL 84742-5574",
  "created_at": "2023-11-15T19:25:59.000000Z",
  "updated_at": "2023-11-15T19:25:59.000000Z",
  "person_emails": [
    {
      "id": 1,
      "person_id": 1,
      "email": "jovany.gorczany@example.com",
      "created_at": "2023-11-15T19:25:59.000000Z",
      "updated_at": "2023-11-15T19:25:59.000000Z"
    },
    {
      "id": 2,
      "person_id": 1,
      "email": "ykunze@example.net",
      "created_at": "2023-11-15T19:25:59.000000Z",
      "updated_at": "2023-11-15T19:25:59.000000Z"
    },
    {
      "id": 3,
      "person_id": 1,
      "email": "qgreenfelder@example.org",
      "created_at": "2023-11-15T19:25:59.000000Z",
      "updated_at": "2023-11-15T19:25:59.000000Z"
    }
  ],
  "person_mobiles": [
    {
      "id": 1,
      "person_id": 1,
      "mobile_number": "+3670336413",
      "created_at": "2023-11-15T19:25:59.000000Z",
      "updated_at": "2023-11-15T19:25:59.000000Z"
    },
    {
      "id": 2,
      "person_id": 1,
      "mobile_number": "+3630995198",
      "created_at": "2023-11-15T19:25:59.000000Z",
      "updated_at": "2023-11-15T19:25:59.000000Z"
    }
  ],
  "person_telephones": [
    {
      "id": 1,
      "person_id": 1,
      "telephone_number": "+361695102",
      "created_at": "2023-11-15T19:25:59.000000Z",
      "updated_at": "2023-11-15T19:25:59.000000Z"
    },
    {
      "id": 2,
      "person_id": 1,
      "telephone_number": "+361231748",
      "created_at": "2023-11-15T19:25:59.000000Z",
      "updated_at": "2023-11-15T19:25:59.000000Z"
    }
  ]
}

On missing person example:
{
  "message": "Record not found."
}
```
### Updates single person data.
In the request {person} expects person id.
Response is the updated person data.
```
http://persons.local/api/person/update/{person}
Type: POST
Response: JSON Array
Success example:
{
    "id": 1,
    "first_name": "Jarrell",
    "middle_name": "Cielo",
    "last_name": "Buckridge",
    "permanent_address": "923 King Mews\nLake Arnulfo, AK 84647-6742",
    "temporary_address": "5933 Champlin Field\nNorth Veronicabury, AL 84742-5574",
    "created_at": "2023-11-15T19:25:59.000000Z",
    "updated_at": "2023-11-15T19:25:59.000000Z",
    "person_emails": [
        {
            "id": 1,
            "person_id": 1,
            "email": "jovany.gorczany@example.com",
            "created_at": "2023-11-15T19:25:59.000000Z",
            "updated_at": "2023-11-15T19:25:59.000000Z"
        }
    ],
    "person_mobiles": [
        {
            "id": 1,
            "person_id": 1,
            "mobile_number": "+3670336413",
            "created_at": "2023-11-15T19:25:59.000000Z",
            "updated_at": "2023-11-15T19:25:59.000000Z"
        },
        {
            "id": 2,
            "person_id": 1,
            "mobile_number": "+3630995198",
            "created_at": "2023-11-15T19:25:59.000000Z",
            "updated_at": "2023-11-15T19:25:59.000000Z"
        }
    ],
    "person_telephones": [
        {
            "id": 1,
            "person_id": 1,
            "telephone_number": "+361695102",
            "created_at": "2023-11-15T19:25:59.000000Z",
            "updated_at": "2023-11-15T19:25:59.000000Z"
        },
        {
            "id": 2,
            "person_id": 1,
            "telephone_number": "+361231748",
            "created_at": "2023-11-15T19:25:59.000000Z",
            "updated_at": "2023-11-15T19:25:59.000000Z"
        }
    ]
}

Error example:
{
    "errors": {
        "last_name": [
            "The last name field is required."
        ]
    },
    "status": 400
}
```
### Deletes person and its relation data.
```
http://persons.local/api/destroy/{person}
Type: GET
Response: bool
Success example:
{
  "success": true
}

On missing person example:
{
  "message": "Record not found."
}
```

## Api requests test

To test are the api requests working I have used Laravel built in Tester. I have set all api request in PersonApiTest and we can test it with the following command:
```
php artisan test
```
