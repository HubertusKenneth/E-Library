# Admin Monitoring Feature

This document describes the admin monitoring feature that has been implemented for tracking user activity and data.

## Overview

The admin monitoring feature provides administrators with comprehensive tools to monitor user activities, view user data, and track system usage patterns.

## Features

### 1. Monitoring Dashboard
- **Statistics Overview**: Total users, books, activities, and active users today
- **Top Active Users**: Lists the most active users by activity count
- **Activity by Type**: Shows distribution of different activity types
- **Recent Activities**: Displays the 20 most recent user activities

### 2. User Management
- **User List**: View all registered users with search and filter capabilities
- **Search**: Search users by name or email
- **Filter by Role**: Filter users by their role (user/admin)
- **User Details**: View individual user profiles with activity statistics

### 3. User Detail Page
- **User Information**: Name, email, role, join date, and favorite books count
- **Activity Statistics**: Total activities, today, this week, and this month
- **Favorite Books**: List of all books favorited by the user
- **Activity Log**: Paginated list of all activities performed by the user

### 4. Activity Logs
- **Comprehensive Logging**: All user actions are automatically logged
- **Filtering**: Filter activities by action type, date range
- **Detailed Information**: Each log includes user, action, description, IP address, and timestamp

## Database Structure

### User Activities Table
- `id`: Primary key
- `user_id`: Foreign key to users table
- `action`: Type of action performed
- `model_type`: Related model class
- `model_id`: Related model ID
- `description`: Human-readable description
- `properties`: JSON field for additional data
- `ip_address`: User's IP address
- `user_agent`: User's browser information
- `created_at`: Timestamp
- `updated_at`: Timestamp

## Logged Activities

The system automatically logs the following activities:
- **favorite_toggle**: When a user favorites/unfavorites a book
- **login**: User login
- **logout**: User logout
- **register**: New user registration
- **profile_update**: Profile information updates
- **profile_delete**: Account deletion
- **book_create**: Admin creates a new book
- **book_update**: Admin updates book information
- **book_delete**: Admin deletes a book

## Access Routes

All monitoring routes are protected by admin middleware and require authentication:

- `/admin/monitoring` - Main monitoring dashboard
- `/admin/monitoring/users` - User management page
- `/admin/monitoring/users/{id}` - Individual user detail page
- `/admin/monitoring/activities` - Activity logs page

## Navigation

The Admin Monitoring link appears in the main navigation bar for users with admin role.

## Technical Implementation

### Controllers
- `App\Http\Controllers\Admin\MonitoringController`: Handles all monitoring-related requests

### Models
- `App\Models\UserActivity`: Represents activity log entries

### Middleware
- `App\Http\Middleware\LogUserActivity`: Automatically logs user activities
- `App\Http\Middleware\AdminMiddleware`: Restricts access to admin users

### Views
- `resources/views/admin/monitoring/dashboard.blade.php`
- `resources/views/admin/monitoring/users.blade.php`
- `resources/views/admin/monitoring/user-detail.blade.php`
- `resources/views/admin/monitoring/activities.blade.php`

## Security

- All monitoring pages are protected by the admin middleware
- Only users with `role = 'admin'` can access monitoring features
- Activity logs capture IP addresses for security auditing
- User agent information is stored for device tracking

## Usage

1. Ensure you have a user with admin role in the database
2. Log in with an admin account
3. Click "Admin Monitoring" in the navigation menu
4. Explore the different monitoring sections:
   - Dashboard for overview
   - Users for user management
   - Activities for detailed logs
