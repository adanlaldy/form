# Survey project

## Project Overview

Survey project is a web application designed to allow users to create and consult surveys in an intuitive and secure way. Developed with Laravel, Tailwind CSS, and JavaScript, the application provides efficient survey management with a modern and responsive interface.

### Implemented Features

- Survey creation with unique names.

- Survey consultation for available surveys.

- Robust structure with clear entity management.

- User authentication to secure access to features.

### Technologies Used

- Backend: Laravel

- Frontend: Tailwind CSS & JavaScript

- Database: MongoDB

## Areas for Improvement

Despite a well-structured foundation and basic functionality, some parts were not completed due to inappropriate technology choices and premature feature complexity. Areas for improvement include:

- Editing and deleting surveys

- Submitting survey responses and storing them in the database

- Advanced permission and role management

## Installation and Setup

#### Clone the GitHub repository:

```bash
git clone https://github.com/adanlaldy/survey.git
cd survey
```

#### Install Laravel dependencies:

```bash
composer install
```

#### Install JavaScript dependencies:

```bash
npm install && npm run dev
```

#### Configure the environment:

```bash
cp .env.example .env
php artisan key:generate
```

#### Start the application:

```bash
php artisan serve
```

## Contributors

This project was developed as part of an academic exercise.

## Future Improvements

- Completion of survey management (editing, deletion, responses).

- Performance optimization and improved MongoDB management.

- Enhanced UI/UX for a better user experience.

SondageX provides a solid foundation for a more ambitious project. Feel free to contribute or suggest improvements!
