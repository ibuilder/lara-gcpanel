# gcPanel - Construction Management Dashboard

## Overview
gcPanel is a modular construction management dashboard designed to facilitate project management through a series of CRUD modules. It allows users to manage various aspects of construction projects, including preconstruction, engineering, field operations, safety, contracts, cost management, BIM, closeout processes, and resource management.

## Features
- **User Roles**: Supports multiple user roles with varying permissions:
  - **Administrator**: Full access (create, read, update, delete).
  - **Editor**: Can create, read, and update records.
  - **Contributor**: Can create and read records.
  - **Viewer**: Can only read records.
  - **Restricted**: No access to records.
- **CRUD Operations**: Each module supports create, read, update, and delete operations.
- **Commenting System**: Users can comment on records they have access to.
- **Export Functionality**: Ability to export records to PDF and CSV formats.
- **Sortable and Filterable Tables**: Tables displaying records can be sorted and filtered based on various criteria.
- **Modular Architecture**: Easily add new modules via zip files.
- **User Management**: Registration and authentication through Supabase.
- **Company Association**: Each user is associated with a company.

## Project Structure
The project is organized into several directories, each serving a specific purpose:

- **app**: Contains the core application logic, including controllers, models, and services.
- **bootstrap**: Contains the application bootstrap files.
- **config**: Configuration files for the application.
- **database**: Database-related files including migrations and seeders.
- **public**: Publicly accessible files such as CSS and JavaScript.
- **resources**: Frontend resources including views and assets.
- **routes**: Route definitions for the application.
- **storage**: Storage files.
- **tests**: Test files for the application.

## Installation
1. Clone the repository:
   ```
   git clone https://github.com/yourusername/gcPanel.git
   ```
2. Navigate to the project directory:
   ```
   cd gcPanel
   ```
3. Install dependencies:
   ```
   composer install
   npm install
   ```
4. Set up your environment file:
   ```
   cp .env.example .env
   ```
5. Configure your Supabase database connection in the `.env` file.
6. Run migrations:
   ```
   php artisan migrate
   ```
7. Start the development server:
   ```
   php artisan serve
   ```

## Usage
- Access the application through your web browser at `http://localhost:8000`.
- Register a new user or log in with existing credentials.
- Navigate through the dashboard to access different modules based on your user role.

## Module Creation
To create a new module:
1. Create a new directory under `app/Http/Controllers/Modules` for your module.
2. Create a corresponding model in `app/Models/Modules`.
3. Define routes in `routes/web.php` for your module.
4. Create views in `resources/views/modules/[your_module]`.
5. Implement the necessary CRUD functionality in your controller.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Acknowledgments
- Thanks to the Supabase team for providing an excellent backend service.
- Thanks to the open-source community for their contributions and support.