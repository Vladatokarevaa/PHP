-- -------------------------------------------------------------
-- TablePlus 5.9.6(546)
--
-- https://tableplus.com/
--
-- Database: blog.sqlite3
-- Generation Time: 2024-04-08 22:23:17.7020
-- -------------------------------------------------------------


CREATE TABLE comments (
    id INTEGER PRIMARY KEY,
    user_id INTEGER,
    comment TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    name TEXT,
    surname TEXT,
    email TEXT UNIQUE
);

