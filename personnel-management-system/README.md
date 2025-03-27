# Personnel Management System

## Overview
The Personnel Management System is a web application designed to manage employee records efficiently. It allows users to create, edit, view, and delete employee information.

## Features
- Add new employees
- Edit existing employee details
- View a list of all employees
- Display detailed information about a specific employee
- Delete employee records

## Directory Structure
```
personnel-management-system
├── src
│   ├── controllers
│   │   └── EmployeeController.php
│   ├── models
│   │   └── Employee.php
│   ├── views
│   │   ├── employee
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   │   └── show.php
│   └── config
│       └── database.php
├── public
│   ├── index.php
│   └── assets
│       ├── css
│       │   └── style.css
│       └── js
│           └── script.js
├── composer.json
└── README.md
```

## Installation
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Run `composer install` to install the required dependencies.

## Usage
- Access the application through the `public/index.php` file.
- Use the navigation to manage employee records.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is open-source and available under the MIT License.