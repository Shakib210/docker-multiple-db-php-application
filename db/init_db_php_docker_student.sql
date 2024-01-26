-- Drop the database if it exists
DROP DATABASE IF EXISTS php_docker_student;

-- Create a new database
CREATE DATABASE php_docker_student;

USE php_docker_student;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

INSERT INTO `students` (`id`, `username`, `email`) VALUES
(1, 'student 1 first post', 'test@gmail.com'),
(2, 'student 2 second post', 'test@gmail.com');
