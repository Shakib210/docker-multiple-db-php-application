-- Drop the database if it exists
DROP DATABASE IF EXISTS php_docker;

-- Create a new database
CREATE DATABASE php_docker;


USE php_docker;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

INSERT INTO `users` (`id`, `username`, `email`) VALUES
(1, 'first post', 'test@gmail.com'),
(2, 'second post', 'test@gmail.com');
