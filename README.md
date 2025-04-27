ok lets s# gcPanel - Construction Management Dashboard

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

## Roadmap
gcPanel's development roadmap outlines the path for expanding its functionality and enhancing its capabilities over time. Here are the key milestones we're working towards:

**Completed**
    - All policies and providers have been created and updated.

1.  **User Authentication and Authorization**: Securely manage user access and permissions.
    -   Implement user registration and login processes.
    -   Define and enforce user roles (Administrator, Editor, Contributor, Viewer, Restricted).
    -   Manage user permissions based on roles.
    -   Ensure data security and privacy.
2.  **Company Management**: Allow users to create and manage company profiles.
    -   Enable creation of company profiles with necessary details.
    -   Manage company information and user associations.
    -   Provide role-based access to company data.
3.  **Project Management**: Enable the creation, management, and tracking of projects.
    -   Create, update, and delete projects.
    -   Define project scopes, timelines, and milestones.
    -   Track project progress and status.
    -   Assign teams and resources to projects.
4.  **Vendor Management**: Manage vendor relationships and data.
    -   Store vendor contact information and performance history.
    -   Categorize and manage different types of vendors.
    -   Track vendor interactions and contracts.
5.  **Reporting Module**: Generate detailed reports on project status and performance.
    -   Generate reports on project status, budget, and timelines.
    -   Customize report formats and content.
    -   Export reports to PDF and CSV.
6.  **BIM Module**: Integrate Building Information Modeling capabilities.
    -   Upload, view, and manage BIM models.
    -   Coordinate BIM data with project timelines and resources.
    -   Manage BIM related issues.
7.  **Closeout Module**: Manage project closeout procedures and documentation.
    -   Manage final inspections and punch lists.
    -   Organize closeout documentation.
    -   Manage warranties and O&M Manuals.
8.  **Contracts Module**: Handle contract creation, management, and execution.
    -   Create, store, and manage project contracts.
    -   Track contract versions and amendments.
    -   Manage Contractual documentation.
9.  **Cost Module**: Track and manage project budgets and expenses.
    -   Manage project budgets and forecasts.
    -   Track costs associated with project resources.
    -   Track and manage change orders, direct costs, and other expenses.
10. **Engineering Module**: Facilitate the management of engineering tasks and documentation.
    -   Store and manage engineering drawings and specifications.
    -   Track Requests for Information (RFIs) and submittals.
    -   Manage and control meetings agendas and meeting minutes.
11. **Field Module**: Manage field operations, daily logs, and inspections.
    -   Manage daily logs and site inspections.
    -   Track field operations and site conditions.
    -   Manage photo library and punchlists.
12. **Preconstruction Module**: Oversee the preconstruction phase, including bidding and planning.
    -   Manage bid packages and qualified bidders.
    -   Track bid submission and results.
    -   Manage bid manuals.
13. **Resources Module**: Manage project resources, including labor and materials.
    -   Track labor, materials, and equipment resources.
    -   Manage resource costs and availability.
    -   Manage locations and CSI Divisions.
14. **Safety Module**: Ensure compliance with safety regulations and manage safety incidents.
    -   Track safety inspections and incidents.
    -   Manage safety documentation.
    -   Manage JHA and PTP.
15. **Settings Module**: Provide comprehensive system settings and customization options.
    -   Manage system configuration and customization.
    -   Manage user permissions and roles.
    -   Provide database management tools.
    -   Manage company information and defaults.
16. **Document Management**: Implement a robust system for managing project documents.
    -   Upload, organize, and manage project documents.
    -   Implement version control for documents.
    -   Securely store and retrieve documents.
17. **Communication and Collaboration**: Enhance team communication and collaboration features.
    -   Implement in-app messaging and notifications.
    -   Enable team collaboration on projects and tasks.
    -   Integrate with external communication tools.
18. **Mobile App Integration**: Develop mobile app(s) for on-the-go access and updates.
    -   Create mobile apps for iOS and Android.
    -   Provide access to key features on mobile.
    -   Sync data between mobile and web applications.
19. **System Integrations**: Integrate with other construction and business management systems.
    -   Integrate with accounting and ERP systems.
    -   Integrate with other construction management platforms.
    -   Support data import/export.
20. **Analytics and Business Intelligence**: Provide advanced data analysis and insights.
    -   Develop dashboards for project performance and trends.
    -   Provide data analysis tools and visualizations.
    -   Generate insights for better decision-making.
21. **AI-Driven Features**: Incorporate AI technologies to enhance decision-making and efficiency.
    -   Implement AI-driven predictive analytics.
    -   Develop AI assistants for project management.
    -   Use AI to automate routine tasks.
22. **Security Enhancements**: Implement robust security measures to protect data and user information.
    -   Regularly audit and update security protocols.
    -   Protect against cyber threats.
    -   Comply with data security standards.
23. **Performance Optimization**: Optimize the system for faster performance and scalability.
    -   Improve system speed and efficiency.

**Next Steps**
1. Define Permissions, Create Roles, and Assign Permissions
2. Implement a Core Feature
3. Create tests for existing and future functionality
    -   Ensure scalability to handle large projects.
    -   Optimize database performance.
24. **Continuous Improvement and Maintenance**: Regularly update and maintain the system based on user feedback and industry standards.
    -   Address user feedback and bug reports.
    -   Update system features based on industry trends.
    -   Regularly update dependencies.
25. **Community and Support**: Build a community and provide support channels for users.
    -   Create a user forum or community.
    -   Provide documentation and tutorials.
    -   Offer support channels (email, chat).








Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Acknowledgments
- Thanks to the Supabase team for providing an excellent backend service.
- Thanks to the open-source community for their contributions and support.