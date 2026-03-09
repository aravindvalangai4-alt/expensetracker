CREATE DATABASE expense_tracker;

USE expense_tracker;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(100),
budget DECIMAL(10,2)
);

CREATE TABLE expenses(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
amount DECIMAL(10,2),
category VARCHAR(50),
date DATE
);
