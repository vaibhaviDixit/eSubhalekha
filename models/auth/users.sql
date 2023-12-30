-- users Table
CREATE TABLE users (
    userID VARCHAR(255) PRIMARY KEY NOT NULL, 
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(10) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'manager', 'partner', 'host', 'user') DEFAULT 'user',
    status ENUM('verified', 'pending', 'deleted') DEFAULT 'pending',
    createdAt DATETIME,
    verifiedAt DATETIME
);