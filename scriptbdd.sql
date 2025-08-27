CREATE DATABASE IF NOT EXISTS peisey CHARSET utf8mb4;

USE peisey;

CREATE TABLE IF NOT EXISTS role(
    id_role INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE
)ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS user(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES role(id_role)
)ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS inscription(
    id_inscription INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    age INT NOT NULL
)ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS host(
    id_host INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL
)ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS type(
    id_type INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
)ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS event(
    id_event INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    date_start DATETIME NOT NULL,
    date_end DATETIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    img VARCHAR(255) NOT NULL,
    remaining_places INT NOT NULL,
    id_type INT,
    FOREIGN KEY (id_type) REFERENCES type(id_type),
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES user(id_user)
)ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS inscription_event(
    id_inscription INT NOT NULL,
    id_event INT NOT NULL,
    PRIMARY KEY (id_inscription, id_event),
    CONSTRAINT fk_inscription_event_inscription
        FOREIGN KEY (id_inscription) REFERENCES inscription(id_inscription),
    CONSTRAINT fk_inscription_event_event
        FOREIGN KEY (id_event) REFERENCES event(id_event)
)ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS host_event(
    id_host INT NOT NULL,
    id_event INT NOT NULL,
    PRIMARY KEY (id_host, id_event),
    CONSTRAINT fk_host_event_host
        FOREIGN KEY (id_host) REFERENCES host(id_host),
    CONSTRAINT fk_host_event_event
        FOREIGN KEY (id_event) REFERENCES event(id_event)
)ENGINE=innoDB;

INSERT INTO role (name)
VALUES ("utilisateur"), ("admin");

INSERT INTO user (email, password, id_role)
VALUES ("jeanmichelpeisey@gmail.com", "$2y$10$.mXLP5CxBiiSi/SAoYRgjuXxPnEgAQ34hqiC3oj39.VRV08sIJT/W", 2);