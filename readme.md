# Salary Date Calculator
A small command-line utility to help a fictional company
determine the dates they need to pay salaries to their sales department.
Following are the functionalities covered:

- The base salaries are paid on the last day of the month unless that day is a
Saturday or a Sunday (weekend).
- On the 15th of every month bonuses are paid for the previous month, unless that
day is a weekend. In that case, they are paid the first Wednesday after the 15th

For more information, check ```docs/requirement.pdf```

## Prerequisites

- PHP >= 7.2
- MySQL
- GIT
- Composer

## How to install

- Do the git clone of the project

```
git clone git@github.com:dineshrabara/salary-dates-calculator.git
```


- Navigate inside project directory

```
cd salary-dates-calculator
```

- Install composer dependencies

```
composer install
```

## How to run application

- Run below command from the project root directory

```
php public/index.php 2020
```

## How to execute tests

- Run the below command from the project root directory

```
./vendor/bin/phpunit
```