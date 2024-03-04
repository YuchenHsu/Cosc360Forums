CREATE DATABASE IF NOT EXISTS forums;

USE forums;

-- Table for storing user information
CREATE TABLE IF NOT EXISTS user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    admin BOOLEAN,
    disabled BOOLEAN,
    reported BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for storing threads (topics)
CREATE TABLE IF NOT EXISTS post (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    image BLOB,
    upvotes DOUBLE,
    downvotes DOUBLE,
    reported BOOLEAN,
    pinned BOOLEAN,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES forum_user(user_id)
);

-- Table for storing posts (replies)
CREATE TABLE IF NOT EXISTS comment (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    user_id INT,
    content TEXT NOT NULL,
    reported BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    FOREIGN KEY (user_id) REFERENCES forum_user(user_id)
);

