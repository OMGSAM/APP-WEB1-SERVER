CREATE TABLE Professeur (
    num_prof INT PRIMARY KEY,
    nom_prof VARCHAR(50),
    prenom_prof VARCHAR(50),
    telephone VARCHAR(15),
    adresse VARCHAR(100),
    type ENUM('permanent', 'vacataire') NOT NULL
);

CREATE TABLE Module (
    num_module INT PRIMARY KEY,
    nom_module VARCHAR(50),
    masse_horaire_prevue INT CHECK (masse_horaire_prevue >= 10),
    num_prof_enseignant INT,
    num_prof_responsable INT,
    num_classe INT,
    FOREIGN KEY (num_prof_enseignant) REFERENCES Professeur(num_prof),
    FOREIGN KEY (num_prof_responsable) REFERENCES Professeur(num_prof),
    FOREIGN KEY (num_classe) REFERENCES Classe(num_classe)
);

CREATE TABLE Precision (
    num_precision INT PRIMARY KEY,
    nom_precision VARCHAR(50),
    num_module INT,
    FOREIGN KEY (num_module) REFERENCES Module(num_module)
);

CREATE TABLE Classe (
    num_classe INT PRIMARY KEY,
    nom_classe VARCHAR(50),
    nombre_modules INT DEFAULT 0,
    motdepasse VARCHAR(50)
);

CREATE TABLE Groupe (
    num_groupe INT PRIMARY KEY,
    nom_groupe VARCHAR(50),
    num_classe INT,
    FOREIGN KEY (num_classe) REFERENCES Classe(num_classe)
);

CREATE TABLE Forme (
    num_forme INT PRIMARY KEY,
    nom_forme VARCHAR(50),
    num_groupe INT,
    FOREIGN KEY (num_groupe) REFERENCES Groupe(num_groupe)
);
