CREATE DATABASE issue_tracker;
USE issue_tracker;

CREATE USER 'cmsc447' IDENTIFIED BY 'demo';
GRANT ALL PRIVILEGES ON issue_tracker.* TO 'cmsc447' IDENTIFIED BY 'demo';


CREATE TABLE tickets(
    tid INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(128),
    status INT,
    poc_name VARCHAR(64),
    poc_email VARCHAR(254),
    modified_date DATE,
    PRIMARY KEY (tid)
);

CREATE TABLE comments(
    cid INT NOT NULL AUTO_INCREMENT,
    tid INT,
    name VARCHAR(64),
    comment TEXT,
    date TIMESTAMP,
    PRIMARY KEY (cid),
    FOREIGN KEY (tid) REFERENCES tickets (tid)
		ON DELETE CASCADE
);