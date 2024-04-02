-- users Table
CREATE TABLE users (
    userID VARCHAR(255) PRIMARY KEY NOT NULL, 
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    name VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female'),
    otp VARCHAR(10) NOT NULL,
    role ENUM('admin', 'manager', 'partner', 'host', 'user') DEFAULT 'user',
    status ENUM('verified', 'pending', 'deleted') DEFAULT 'pending',
    createdAt DATETIME,
    verifiedAt DATETIME
);