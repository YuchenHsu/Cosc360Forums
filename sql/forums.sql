CREATE DATABASE IF NOT EXISTS forums;

USE forums;

CREATE TABLE IF NOT EXISTS category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Table for storing user information
CREATE TABLE IF NOT EXISTS user (
    username VARCHAR(50) PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile_pic MEDIUMBLOB,
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
    image MEDIUMBLOB,
    category_id INT NOT NULL,
    upvotes DOUBLE DEFAULT 0,
    downvotes DOUBLE DEFAULT 0,
    reported BOOLEAN DEFAULT FALSE,
    pinned BOOLEAN DEFAULT FALSE,
    username VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (username) REFERENCES user(username)
);

CREATE TABLE IF NOT EXISTS userpost (
    username VARCHAR(50) NOT NULL,
    post_id INT NOT NULL,
    status ENUM('unset', 'upvote', 'downvote') DEFAULT 'unset',
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    FOREIGN KEY (username) REFERENCES user(username),
    PRIMARY KEY (username, post_id)
);

DELIMITER //

CREATE TRIGGER ins_userpost AFTER INSERT ON userpost
FOR EACH ROW
BEGIN
    IF NEW.status = 'upvote' THEN
        UPDATE post SET upvotes = upvotes + 1 WHERE post.post_id = NEW.post_id;
    elseif NEW.status = 'downvote' THEN
        UPDATE post SET downvotes = downvotes + 1 WHERE post.post_id = NEW.post_id;
    END IF;
END;
//

CREATE TRIGGER upd_userpost AFTER UPDATE ON userpost
FOR EACH ROW
BEGIN
    DECLARE old_status ENUM('unset', 'upvote', 'downvote');
    DECLARE new_status ENUM('unset', 'upvote', 'downvote');
    
    SET old_status = OLD.status;
    SET new_status = NEW.status;
    
    IF old_status = 'upvote' AND new_status = 'downvote' THEN
        UPDATE post SET upvotes = upvotes - 1, downvotes = downvotes + 1 WHERE post.post_id = NEW.post_id;
    ELSEIF old_status = 'downvote' AND new_status = 'upvote' THEN
        UPDATE post SET downvotes = downvotes - 1, upvotes = upvotes + 1 WHERE post.post_id = NEW.post_id;
    ELSEIF old_status = 'unset' AND new_status = 'upvote' THEN
        UPDATE post SET upvotes = upvotes + 1 WHERE post.post_id = NEW.post_id;
    ELSEIF old_status = 'unset' AND new_status = 'downvote' THEN
        UPDATE post SET downvotes = downvotes + 1 WHERE post.post_id = NEW.post_id;
    ELSEIF old_status = 'upvote' AND new_status = 'unset' THEN
        UPDATE post SET upvotes = upvotes - 1 WHERE post.post_id = NEW.post_id;
    ELSEIF old_status = 'downvote' AND new_status = 'unset' THEN
        UPDATE post SET downvotes = downvotes - 1 WHERE post.post_id = NEW.post_id;
    END IF;
END;
//


CREATE TRIGGER del_userpost AFTER DELETE ON userpost
FOR EACH ROW
BEGIN
    IF OLD.status = 'upvote' THEN
        UPDATE post SET upvotes = upvotes - 1 WHERE post.post_id = OLD.post_id;
    elseif OLD.status = 'downvote' THEN
        UPDATE post SET downvotes = downvotes - 1 WHERE post.post_id = OLD.post_id;
    END IF;
END;
//

DELIMITER ;

-- Table for storing posts (replies)
CREATE TABLE IF NOT EXISTS comment (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    username VARCHAR(50) NOT NULL,
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
    username1 VARCHAR(50) NOT NULL,
    username2 VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    info TEXT,
    resolved BOOLEAN,
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
    topPost INT NOT NULL,
    FOREIGN KEY (topPost) REFERENCES post(post_id)
);

INSERT INTO category (name) VALUES ('General Discussion');
INSERT INTO category (name) VALUES ('News and Announcements');
INSERT INTO category (name) VALUES ('Introductions');
INSERT INTO category (name) VALUES ('Feedback and Suggestions');
INSERT INTO category (name) VALUES ('Help and Support');
INSERT INTO category (name) VALUES ('Off-Topic Chat');
INSERT INTO category (name) VALUES ('Technology and Gadgets');
INSERT INTO category (name) VALUES ('Gaming');
INSERT INTO category (name) VALUES ('Movies and TV Shows');
INSERT INTO category (name) VALUES ('Music');
INSERT INTO category (name) VALUES ('Books and Literature');
INSERT INTO category (name) VALUES ('Art and Design');
INSERT INTO category (name) VALUES ('Photography');
INSERT INTO category (name) VALUES ('Travel and Adventure');
INSERT INTO category (name) VALUES ('Food and Cooking');
INSERT INTO category (name) VALUES ('Health and Fitness');
INSERT INTO category (name) VALUES ('Sports');
INSERT INTO category (name) VALUES ('Automotive');
INSERT INTO category (name) VALUES ('Fashion and Style');
INSERT INTO category (name) VALUES ('Beauty and Skincare');
INSERT INTO category (name) VALUES ('Pets and Animals');
INSERT INTO category (name) VALUES ('Home and Garden');
INSERT INTO category (name) VALUES ('DIY and Crafts');
INSERT INTO category (name) VALUES ('Science and Education');
INSERT INTO category (name) VALUES ('Business and Finance');
INSERT INTO category (name) VALUES ('Careers and Jobs');
INSERT INTO category (name) VALUES ('Relationships and Dating');
INSERT INTO category (name) VALUES ('Parenting and Family');
INSERT INTO category (name) VALUES ('Personal Development');
INSERT INTO category (name) VALUES ('Spirituality and Religion');
INSERT INTO category (name) VALUES ('Politics and Current Events');
INSERT INTO category (name) VALUES ('History and Culture');
INSERT INTO category (name) VALUES ('Environment and Nature');
INSERT INTO category (name) VALUES ('Coding and Programming');
INSERT INTO category (name) VALUES ('Web Development');
INSERT INTO category (name) VALUES ('Graphic Design');
INSERT INTO category (name) VALUES ('Digital Marketing');
INSERT INTO category (name) VALUES ('Blogging');
INSERT INTO category (name) VALUES ('E-commerce');
INSERT INTO category (name) VALUES ('Cryptocurrency');
INSERT INTO category (name) VALUES ('Sports Betting');
INSERT INTO category (name) VALUES ('Stock Market');
INSERT INTO category (name) VALUES ('Real Estate');
INSERT INTO category (name) VALUES ('Travel Planning');
INSERT INTO category (name) VALUES ('Event Planning');
INSERT INTO category (name) VALUES ('Product Reviews');
INSERT INTO category (name) VALUES ('Comedy and Memes');
INSERT INTO category (name) VALUES ('Conspiracy Theories');
INSERT INTO category (name) VALUES ('Local Community');
INSERT INTO category (name) VALUES ('Classifieds');
