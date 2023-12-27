-- users Table
CREATE TABLE users (
    email VARCHAR(255) PRIMARY KEY,
    phone VARCHAR(10) NOT NULL,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'manager', 'partner', 'host', 'user') DEFAULT 'user',
    status ENUM('verified', 'pending', 'deleted') DEFAULT 'pending'
);