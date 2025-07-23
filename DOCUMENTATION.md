# Electronic Data Capture (EDC) System Documentation

## 1. Introduction
The Electronic Data Capture System is a secure web application designed for managing participant data in research and clinical settings. It provides a user-friendly interface for data entry, management, and reporting. The system is primarily intended for:
- Research coordinators
- Data managers
- Clinical staff
- Administrative personnel

Key features include secure data entry, participant management, and real-time data updates.

## 2. System Requirements

### Software Requirements
- PHP 8.2.14 or higher
- MySQL 8.0 or higher
- Web Browser:
  - Chrome 60+
  - Firefox 55+
  - Safari 12+
  - Edge 79+

### Hardware Requirements
- Minimum 2GB RAM
- Minimum 1GHz processor
- 200MB free disk space
- Internet connection for online use

## 3. Installation/Access Instructions

### Local Installation
1. Install MAMP/XAMPP with PHP 8.2.14 and MySQL
2. Clone repository to web server directory
3. Create MySQL database named `electronic_data_capture`
4. Import database schema from `sql/schema.sql`
5. Configure database credentials in `config/Database.php`
6. Access application at `http://localhost/edc`

### Access Instructions
- Landing Page: `http://localhost/edc/index.php`
- Login Page: `http://localhost/edc/entry.php`
- Dashboard: `http://localhost/edc/dashboard.php`

## 4. User Roles and Permissions

### Admin Role
- Full access to all features
- Manage user accounts
- View all data entries
- Modify any entry
- Generate reports

### User Role
- View and manage own entries
- Create new entries
- Edit own entries
- Delete own entries

## 5. Authentication Process

### Registration
1. Navigate to login page
2. Click "Register" button
3. Fill in required fields:
   - Username
   - Email
   - Password
   - Full Name
4. Submit form
5. Account created with default user role

### Login
1. Enter username/email and password
2. Click "Login" button
3. Session created
4. Redirected to dashboard

### Logout
1. Click "Logout" button in navbar
2. Session destroyed
3. Redirected to login page

### Password Security
- Passwords hashed using bcrypt
- Minimum 8 characters
- Includes uppercase, lowercase, number, special character

## 6. Main Features & Functionalities

### Create
1. Click "Add New Entry" button
2. Fill in participant details:
   - Participant ID (unique)
   - First Name
   - Last Name
   - Email
   - Date of Birth
   - Gender
   - Notes
3. Submit form
4. Entry added to database

### Read
1. View all entries in dashboard table
2. Search entries using filters
3. Sort entries by columns
4. View detailed entry information

### Update
1. Click "Edit" button on entry
2. Modify desired fields
3. Submit changes
4. Entry updated in real-time

### Delete
1. Click "Delete" button on entry
2. Confirm deletion
3. Entry removed from database
4. Table updated immediately

## 7. Navigation Guide

### Main Pages
- **Dashboard**: Overview of data entries
- **Add Entry**: Form for new entries
- **Data Table**: List of all entries
- **Profile**: User account settings
- **Logout**: End session

### Navigation Menu
- Home: Landing page
- Dashboard: Main interface
- Entries: Data management
- Profile: User settings
- Logout: End session

## 8. Database Overview

### Key Tables
1. **users**
   - id (PK)
   - username
   - email
   - password_hash
   - full_name
   - role
   - created_at
   - updated_at

2. **data_entries**
   - id (PK)
   - participant_id (UNIQUE)
   - first_name
   - last_name
   - email
   - date_of_birth
   - gender
   - notes
   - created_at
   - updated_at

3. **sessions**
   - id (PK)
   - user_id (FK)
   - ip_address
   - user_agent
   - last_activity

## 9. AJAX Integration

### Form Submission
- Real-time form validation
- No page refresh on submission
- Immediate UI updates
- Error messages shown without reload

### Data Fetching
- Dynamic table loading
- Real-time updates
- Background data operations
- Progress indicators

## 10. Error Handling and Notifications

### Common Errors
1. **Authentication**
   - Invalid credentials
   - Session expired
   - Account locked

2. **Form Validation**
   - Required fields missing
   - Invalid email format
   - Duplicate participant ID
   - Invalid date format

3. **Data Operations**
   - Entry not found
   - Permission denied
   - Database error

### Error Messages
- Clear, user-friendly messages
- Error codes for debugging
- Guidance for correction
- Success confirmations

## 11. Security Measures

### Database Security
- PDO prepared statements
- SQL injection prevention
- Parameterized queries
- Transaction support

### Session Management
- Secure session handling
- Session timeout
- IP tracking
- User agent validation

### Input Validation
- Client-side validation
- Server-side validation
- XSS prevention
- Sanitization of inputs

### Protection Techniques
- CSRF tokens
- Password hashing (bcrypt)
- Data encryption (AES-128-CBC)
- Rate limiting

## 12. Screenshots

### Login Page
![Login Page](screenshots/login.png)

### Dashboard
![Dashboard](screenshots/dashboard.png)

### Data Entry Form
![Data Entry](screenshots/entry-form.png)

## 13. FAQs

### Common Questions
1. **Forgot Password?**
   - Contact administrator for password reset

2. **Login Issues**
   - Clear browser cache
   - Check credentials
   - Contact support

3. **Data Entry**
   - Use unique participant IDs
   - Fill required fields
   - Save before closing

4. **System Access**
   - Must be authenticated
   - Use proper credentials
   - Contact admin for access

## 14. Contact & Support

### Support Information
- Email: support@edc-system.com
- Phone: +1 555-0123
- Documentation: [Documentation](docs/)

### Developer Information
- Lead Developer: [Your Name]
- GitHub: [Repository](https://github.com/yourusername/edc-system)
- Version Control: Git

---

**Note:** This documentation is subject to change. Please refer to the latest version for the most up-to-date information.
