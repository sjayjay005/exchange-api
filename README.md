<h1 align="center">Exchange API</h1>



# About Exchange API
Exchange API is a web app where users are be able to connect and enter a start & end date and select a base currency from a dropdown l ist. Once the form has been submitted, the User should be able to view all exchange rates (by connecting to a 3rd party API) with the selected value as a base currency and ordered by newest to oldest date. At the bottom of the list of rates, I would l ike to see statistics on the min, max, and average rates for the period selected. The user should be able to save his/her search for future use. Once saved, the i nformation needs to be stored within a MySQL Database. Users should be able to delete saved searches from the MySQL Database. Lastly, should a User perform a search between a date range already saved i n the past (by any other User), i nformation should be retrieved from the MySQL Database as opposed to requesting the same set of data from the API.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
PHP 7.0.30+
MySQL Server 8+
Composer
```

### Installing

- Clone the the github repository :  `git clone https://github.com/sjayjay005/exchange-api`
- Install composer dependencies : `composer install`
- Run Server : `php -S localhost:8000`


Now to see the local server, on your browser, navigate to

```
http://localhost:8000
```

## Creating and running the tests

To run tests: simply do a ```composer run-script``` test or even shorter with ```composer test```



### And coding style tests

We follow [psr-0 and psr-1](https://flowframework.readthedocs.io/en/stable/TheDefinitiveGuide/PartV/CodingGuideLines/PHP.html) coding standards


## Built With

* PHP


## Authors

* **Jay Ntshwenyese** - *Initial work* - [Github link](https://github.com/sjayjay005)

