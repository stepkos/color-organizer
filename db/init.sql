CREATE DATABASE colororganizer;

use colororganizer;

CREATE TABLE colors (
  color_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  palette_id int(11) NOT NULL,
  hash_of_color varchar(6) NOT NULL
);

CREATE TABLE pallets (
  palette_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id int(11) NOT NULL
);

CREATE TABLE users (
  user_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  login varchar(20) UNIQUE NOT NULL,
  password_hash varchar(255) NOT NULL,
  email varchar(255) UNIQUE NOT NULL
);