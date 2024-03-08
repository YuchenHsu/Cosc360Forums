CREATE DATABASE IF NOT EXISTS forums;

USE forums;

-- Table for storing user information
CREATE TABLE IF NOT EXISTS user (
    username VARCHAR(50) NOT NULL PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
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
    username VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (username) REFERENCES user(username)
);

-- Table for storing posts (replies)
CREATE TABLE IF NOT EXISTS comment (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    username VARCHAR(50),
    content TEXT NOT NULL,
    reported BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    FOREIGN KEY (username) REFERENCES user(username)
);

CREATE TABLE IF NOT EXISTS notification (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    content TEXT NOT NULL,
    FOREIGN KEY (username) REFERENCES user(username)
);

CREATE TABLE IF NOT EXISTS conflict (
    conflict_id INT AUTO_INCREMENT PRIMARY KEY,
    username1 INT NOT NULL,
    username2 INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    info TEXT,
    status BOOLEAN,
    FOREIGN KEY (username1) REFERENCES user(username),
    FOREIGN KEY (username2) REFERENCES user(username)
);

CREATE TABLE IF NOT EXISTS statistic (
    day DATE PRIMARY KEY,
    usernameNew DOUBLE,
    postNew DOUBLE,
    upvotes DOUBLE,
    downvotes DOUBLE,
    loggedIn DOUBLE,
    topPost INT,
    FOREIGN KEY (topPost) REFERENCES post(post_id)
);
