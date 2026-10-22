CREATE DATABASE IF NOT EXISTS simple_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE simple_pos;

CREATE TABLE IF NOT EXISTS customers (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, full_name VARCHAR(100) NOT NULL, email VARCHAR(150) NOT NULL, phone VARCHAR(30) NULL, created_at DATETIME NULL, updated_at DATETIME NULL);
CREATE TABLE IF NOT EXISTS users (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50) NOT NULL UNIQUE, full_name VARCHAR(100) NOT NULL, role VARCHAR(50) NOT NULL DEFAULT 'Cashier', avatar VARCHAR(255) NULL, created_at DATETIME NULL, updated_at DATETIME NULL);

INSERT INTO customers (full_name, email, phone) VALUES ('Juan Dela Cruz', 'juan.delacruz@example.com', '0917-123-4567'), ('Maria Santos', 'maria.santos@example.com', '0918-234-5678');
INSERT INTO users (username, full_name, role) VALUES ('admin01', 'Kenneth Castañeda', 'Administrator'), ('cashier01', 'Anna Bautista', 'Cashier');
