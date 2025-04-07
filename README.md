<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## BUILT USING LARAVEL

## Final Project in CIT18 - Mastery in Web Development
- BONDOC, Hans Ian
- CORTEZ, Alain
- DAGDAGAN, Kenji
- MANG-OY, Demetrie

## Running Devscribe

### Local Development Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/Devscribe.git
   cd Devscribe
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database**
   - Update the `.env` file with your database credentials
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=devscribe
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run Migrations and Seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Build Assets**
   ```bash
   npm run dev
   ```

7. **Start the Development Server**
   ```bash
   php artisan serve
   ```
   The application will be available at http://localhost:8000

### GitHub Codespaces Setup

1. **Create a Codespace**
   - Open the GitHub repository
   - Click the "Code" button
   - Select the "Codespaces" tab
   - Click "Create codespace on main"

2. **Once the Codespace is Running**
   ```bash
   composer install
   npm install
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure Database**
   - Update the `.env` file with appropriate database credentials for your Codespace environment

4. **Run Migrations and Seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Build Assets and Start the Server**
   ```bash
   npm run dev &
   php artisan serve --host=0.0.0.0
   ```

6. **Access Your Application**
   - GitHub Codespaces will provide a forwarded ports tab
   - Click on the URL next to port 8000 to access your application
