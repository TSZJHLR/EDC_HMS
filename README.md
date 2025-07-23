# Electronic Data Capture (EDC) System

A secure, user-friendly PHP CRUD application for electronic data capture with modern web technologies.

## Features

- **Authentication**: Secure login and registration with session management
- **Data Security**: Password hashing with bcrypt, prepared statements
- **Modern UI**: Responsive design with Font Awesome icons
- **AJAX Integration**: Real-time form validation and submission
- **Form Validation**: Dual-layer validation (client + server)
- **RESTful API**: JSON endpoints for all CRUD operations
- **OOP Architecture**: Modular class structure
- **Database Security**: PDO prepared statements, foreign key constraints

## Installation

1. **Setup MAMP/XAMPP**
   - Start Apache and MySQL services
   - Create a new database named `electronic_data_capture`

2. **Database Setup**
   ```sql
   -- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create sessions table for session management
CREATE TABLE IF NOT EXISTS sessions (
    id VARCHAR(32) PRIMARY KEY,
    user_id INT NOT NULL,
    ip_address VARCHAR(45),
    user_agent TEXT,
    last_activity TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
   ```

3. **File Structure**
   ```
   edc-system/
   ├── api/
   │   ├── auth.php
   │   ├── data_entries.php
   │   └── logout.php
   ├── assets/
   │   ├── css/
   │   │   ├── base.css
   │   │   ├── components.css
   │   │   ├── dashboard.css
   │   │   ├── entry.css
   │   │   ├── landing.css
   │   │   ├── responsive.css
   │   │   └── style.css
   │   └── js/
   │       ├── api.js
   │       ├── auth.js
   │       ├── dashboard.js
   │       ├── daseboard-main.js
   │       ├── forms.js
   │       ├── landing.js
   │       ├── main.js
   │       ├── navigation.js
   │       └── utils.js
   ├── classes/
   │   ├── APIHandler.php
   │   ├── DataEntry.php
   │   ├── FormHandler.php
   │   └── Validator.php
   ├── config/
   │   ├── Database.php
   │   └── Security.php
   ├── entry.php
   ├── includes/
   │   ├── alert.php
   │   ├── dashboard-header.php
   │   ├── data-form.php
   │   ├── data-table.php
   │   ├── footer.php
   │   ├── header.php
   │   ├── navbar.php
   │   ├── scripts.php
   │   ├── sidebar.php
   │   └── stats.php
   ├── sql/
   │   ├── schema.sql
   │   └── setup.sql
   ├── dashboard.php
   ├── index.php
   └── README.md
   ```

4. **Configuration**
   - Update database credentials in `config/Database.php`
   - Configure session settings in `config/Security.php`
   - Customize UI in `assets/css/base.css` and `assets/css/style.css`

## Usage

1. **Landing Page**: Navigate to `index.php`
2. **Authentication**: Login/Register at `entry.php`
3. **Dashboard**: Full CRUD operations at `dashboard.php`
4. **API**: RESTful endpoints at `api/`

## API Endpoints

- `GET /api/data_entries.php` - Get all entries
- `GET /api/data_entries.php?id={id}` - Get single entry
- `POST /api/data_entries.php` - Create new entry
- `PUT /api/data_entries.php` - Update entry
- `DELETE /api/data_entries.php` - Delete entry
- `POST /api/logout.php` - Logout
   
## Security Features

- **Data Encryption**: Sensitive fields encrypted with AES-128-CBC
- **SQL Injection Protection**: PDO prepared statements
- **XSS Prevention**: HTML escaping and sanitization
- **Input Validation**: Client and server-side validation
- **CSRF Protection**: Form token validation (can be enhanced)

## Technologies Used

- **Backend**: PHP 8.2.14, MySQL, PDO
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Security**: OpenSSL encryption, prepared statements
- **Architecture**: Object-Oriented Programming (OOP)
- **API**: RESTful JSON API

## Browser Compatibility

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## License

This project is for educational purposes. Feel free to modify and use as needed.
