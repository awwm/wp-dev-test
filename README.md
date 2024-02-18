# WordPress Development Test

This repository showcases a WordPress project exploring various tools and methods. The theme is built using Tailwind CSS and Gulp.js for styling and workflow automation. Two custom plugins, "Wis Events" and "Wis API Block," are developed using standard WordPress tools like Gutenberg blocks and WordPress scripts. These plugins add features like event management and seamless integration of external data. The project also emphasizes SEO optimization for better website visibility. Overall, it's a demonstration of how to create dynamic WordPress websites using popular web development technologies.

## Prerequisites

Before starting with the project, ensure you have the following prerequisites installed:

- [Docker](https://www.docker.com/get-started) - Docker is used for containerization and running the WordPress environment.
- [Git](https://git-scm.com/) - Git is required for version control and managing the project repository.
- [Node.js/npm](https://nodejs.org/) - Node.js and npm (Node Package Manager) are used for managing dependencies and running build scripts for the project. You can download and install Node.js/npm from the official website.

## Project Structure

The project is structured as follows:

- **wp-dev-test/**: Root directory containing the project.
  - **docker-compose.yml**: Docker Compose file for setting up WordPress environment.
  - **wordpress/**: Directory for WordPress configuration and themes.
    - **themes/**: Directory for WordPress themes.
      - **wis/**: Custom theme supporting the 'Events' custom post type.
        - *(Theme files and templates)*
  - **plugins/**: Directory for WordPress plugins.
    - **wis-events/**: Plugin adding a custom post type for 'Events' and custom Gutenberg blocks for displaying Events.
      - *(Plugin files and PHP/js code)*
    - **wis-api/**: Plugin for integrating external RESTful API.
      - *(Plugin files and PHP/js code)*

## How to Use

1. Clone the repository to your local machine.
2. Navigate to the `wp-dev-test` directory.
3. Run `docker-compose up` to start the WordPress environment.
4. Access WordPress at `http://localhost:8000` in your web browser.
5. Activate the `wis` theme and `wis-events` and `wis-api` plugins in the WordPress admin panel.

## Additional Tasks

Here are additional tasks that are documented separately:

- [Task 7: Implement error handling for API requests and briefly describe caching strategies](https://github.com/awwm/wp-dev-test/blob/master/TASK7.md)
- [Task 9: Outline steps to optimize site speed and integrate a popular SEO plugin, explaining key features](https://github.com/awwm/wp-dev-test/blob/master/TASK9.md)

