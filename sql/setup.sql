-- Author: Daniel Benjamin Perez Morales
-- GitHub: https://github.com/DanielPerezMoralesDev13
-- Email: danielperezdev@proton.me

DROP DATABASE IF EXISTS ContactsApp;

CREATE DATABASE IF NOT EXISTS ContactsApp;

USE ContactsApp;

CREATE TABLE IF NOT EXISTS contacts (id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL);

INSERT INTO contacts (name, phone_number) VALUES ("Daniel Perez", "12345678"), ("Danna Morales", "87654321"), ("Benjamin Perez", "22443377");