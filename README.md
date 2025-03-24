# Catalogue App

Catalogue App is a full-stack content catalogue built with **Laravel 12** (backend) and **Inertia.js + React** (frontend) using **Material UI** for a modern, responsive design. The project demonstrates dynamic UI layouts based on content type (e.g. circular, rectangular, or polygonal cards) and is fully containerized using Docker.

## Features

- **Laravel 12 Back-End**
    - Serves the React.js front-end via Inertia.js.
    - Calls an external catalogue API to fetch learning content.
    - Implements class inheritance (or composition) to manage content types:
        - **Base Class (Content):** Contains shared properties (e.g., `fullname`, `summary`, `image`).
        - **Derived Classes (Course, LiveLearning):** Extend the base class with additional fields or methods.
- **React.js Front-End with Material UI**
    - Displays a catalogue of learning content tiles (title, description, image).
    - Uses a responsive grid layout to render the content.
    - Adjusts appearance (e.g., colours, click events, layout shapes) based on the content type.
- **Containerization & Deployment**
    - Dockerized both FE and BE.

## Getting Started

### Prerequisites

- **PHP 8.2+** and Composer
- **Node.js 18+** and npm
- **Docker** (and optionally Docker Compose)
- **Google Cloud SDK** for deployment

### Setup Locally

1. **Clone the Repository**

    ```bash
    git clone https://github.com/Nirajchemjong/catalogueApp.git
    cd catalogue-app

    ```

2. COPY the .env.example and Update ACRON_API_KEY.
3. Install Composer
4. Install npm pakages(npm install && npm run dev )
5. RUN laravel (php artisan serve --host=0.0.0.0 --port=8080 )

## RUN IT in DOCKER

1. Docker build -t catalogueapp .
2. Docker run -d -p 8080:8080 catalougueapp
