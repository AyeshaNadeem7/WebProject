-- Create database
CREATE DATABASE IF NOT EXISTS travelmate;
USE travelmate;

-- Table to store contact form submissions
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for storing trip plans
CREATE TABLE trip_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(100) NOT NULL,
    hotel VARCHAR(100) NOT NULL,
    meal_type VARCHAR(50),
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    persons INT NOT NULL,
    duration_days INT NOT NULL,
    meal_plan VARCHAR(50),
    transport_option VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for storing available packages
CREATE TABLE travel_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    badge VARCHAR(50),
    duration VARCHAR(50),
    features TEXT,
    price INT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE login_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    status ENUM('success', 'failure'),
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Insert sample packages (like in your HTML)
INSERT INTO travel_packages (title, badge, duration, features, price)
VALUES
('Hunza Adventure', 'Popular', '5 Days / 4 Nights', 'Altit Fort Tour,Attabad Lake Visit,4x4 Jeep Safari,Luxury Hotel Stay', 45000),
('Swat Explorer', 'Best Value', '4 Days / 3 Nights', 'Malam Jabba Ski Resort,White Palace Visit,River Rafting,Deluxe Hotel Stay', 35000),
('Skardu Expedition', NULL, '6 Days / 5 Nights', 'Deosai Plains Trek,Upper Kachura Lake,Shigar Fort Visit,Premium Hotel Stay', 55000);


