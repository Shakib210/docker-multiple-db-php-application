-- Drop the database if it exists
DROP DATABASE IF EXISTS test_docker;

-- Create a new database
CREATE DATABASE test_docker;


USE test_docker;

CREATE TABLE testTables (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- SHOW DATABASES;