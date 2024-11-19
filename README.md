# Movie Explorer Application

## Project Overview

This application allows users to:

- Search for movies by title using the OMDB API.
- View detailed information about a selected movie.
- Explore a list of trending movies based on popular or recent searches.

The project uses Laravel 11 with Livewire for dynamic interactivity.

## Setup Instructions

### Prerequisites

Ensure your system meets the following requirements:

- **PHP**: Version 8.1 or higher.
- **Composer**: Latest version.
- **Node.js (Optional)**: For frontend assets.
- **Docker (Optional)**: If using Laravel Sail for the development environment.

### Installation Steps

1. **Clone the Repository**
    ```bash
    git clone https://github.com/tiyiselani-ma/movie-search-cubezoo.git
    cd movie-search-cubezoo
    ```

2. **Install Dependencies**
    ```bash
    composer install
    npm install && npm run dev  # Optional, for frontend assets
    ```

3. **Environment Configuration**
    Duplicate the `.env.example` file to create a new `.env` file:
    ```bash
    cp .env.example .env
    ```
    Generate an application key:
    ```bash
    php artisan key:generate
    ```
    Add your OMDB API key to the `.env` file:
    ```env
    OMDB_API_KEY=your_api_key_here
    ```

4. **Database Setup (If Applicable)**
    Configure your database in the `.env` file.
    Run migrations to set up the database schema:
    ```bash
    php artisan migrate
    ```

5. **Run the Application**
    Start the Laravel development server:
    ```bash
    php artisan serve
    ```
    If using Sail:
    ```bash
    ./vendor/bin/sail up
    ```

## Usage Instructions

### Search for Movies

- Navigate to the search page.
- Enter a movie title in the search bar and press the Search button.
- Browse through the results displayed dynamically.

### View Movie Details

- Click on a movie from the search results.
- View detailed information, including:
  - Title
  - Release Date
  - Rating
  - Plot Summary
  - Additional metadata

### View Trending Movies

- Navigate to the Trending Movies section from the homepage.
- Explore movies based on the most-searched or recently-viewed logic.

## API Endpoints

### Search Movies

Retrieve movies based on a title query:
```sql
GET /search?query={movie_title}
```

### Movie Details

Retrieve details for a specific movie by its IMDb ID:
```bash
GET /movies/{imdbID}
```

### Trending Movies

Fetch the list of trending movies:
```bash
GET /trending
```

## Running Tests

### Execute the Test Suite

Run the following command to execute the unit and feature tests:
```bash
php artisan test
```

### Test Coverage

The tests cover:

- API interaction with the OMDB API.
- Dynamic movie search and display functionality.
- Error handling for API failures.
- Trending movies logic.

## Livewire Components

### Search Movies Component

- Dynamically fetch and display movie search results without reloading the page.
- Integrated with Livewire for real-time interactivity.

### Trending Movies Component

- Fetch and display trending movies dynamically.
- Cached popular or recently-viewed movies for performance optimization.

## Assumptions and Improvements

### Assumptions

- Trending movies are determined based on recently viewed movies cached in the application.
- The OMDB API key is valid and does not exceed the daily request limit.

### Potential Improvements

- Add user authentication to personalize trending movie results.
- Implement advanced search filters (e.g., genre, year, or IMDb rating).
- Include pagination for large search results.

## Submission Instructions

Ensure your project is pushed to a public GitHub repository. Share the repository link for review.