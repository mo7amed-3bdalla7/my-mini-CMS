CREATE TABLE categories
(
    id SMALLINT(6) PRIMARY KEY NOT NULL,
    user_id SMALLINT(6) NOT NULL,
    created DATETIME NOT NULL,
    title VARCHAR(100) NOT NULL,
    slug VARCHAR(20) NOT NULL,
    content LONGTEXT NOT NULL
);
CREATE TABLE comments
(
    id INT(11) PRIMARY KEY NOT NULL,
    user_id SMALLINT(6) NOT NULL,
    content TEXT NOT NULL,
    created DATETIME NOT NULL
);
CREATE TABLE news
(
    id SMALLINT(6) PRIMARY KEY NOT NULL,
    title VARCHAR(150) NOT NULL,
    user_id SMALLINT(6) NOT NULL,
    created DATETIME NOT NULL,
    content LONGTEXT NOT NULL,
    cat VARCHAR(200) NOT NULL,
    tag VARCHAR(200) NOT NULL
);
CREATE TABLE newsbar
(
    user_id INT(11) NOT NULL,
    id INT(11) PRIMARY KEY NOT NULL,
    content VARCHAR(250) NOT NULL,
    created DATETIME NOT NULL
);
CREATE TABLE pages
(
    id SMALLINT(6) PRIMARY KEY NOT NULL,
    user_id SMALLINT(6) NOT NULL,
    category_id SMALLINT(6) NOT NULL,
    created DATETIME NOT NULL,
    last_modified TIMESTAMP NOT NULL,
    title VARCHAR(100) NOT NULL,
    slug VARCHAR(20) NOT NULL,
    content LONGTEXT NOT NULL,
    publish TINYINT(1) NOT NULL
);
CREATE TABLE settings
(
    id SMALLINT(6) PRIMARY KEY NOT NULL,
    title VARCHAR(50) NOT NULL,
    status TINYINT(1) NOT NULL,
    theme VARCHAR(20) NOT NULL
);
CREATE TABLE slideshow
(
    id SMALLINT(6) PRIMARY KEY NOT NULL,
    file_name VARCHAR(100) NOT NULL,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(150) NOT NULL
);
CREATE TABLE users
(
    id SMALLINT(6) PRIMARY KEY NOT NULL,
    username VARCHAR(30) NOT NULL,
    password CHAR(32) NOT NULL,
    email VARCHAR(50) NOT NULL,
    gender TINYINT(1) NOT NULL,
    status TINYINT(1) NOT NULL,
    activation CHAR(32) NOT NULL,
    privilege TINYINT(1) NOT NULL,
    lastlogin DATETIME NOT NULL
);
CREATE UNIQUE INDEX id ON categories (id);
CREATE UNIQUE INDEX email ON users (email);
CREATE UNIQUE INDEX username ON users (username);