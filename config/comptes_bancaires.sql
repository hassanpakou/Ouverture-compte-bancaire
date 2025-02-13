CREATE DATABASE comptes_bancaires;

USE comptes_bancaires;

CREATE TABLE comptes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL,
    type_compte ENUM('courant', 'epargne', 'salaire', 'autre') NOT NULL,
    devise ENUM('franc', 'dollar') NOT NULL,
    photo VARCHAR(255) NOT NULL,
    signature VARCHAR(255) NOT NULL,
    numero_compte VARCHAR(12) NOT NULL UNIQUE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
