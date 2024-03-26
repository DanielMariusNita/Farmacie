CREATE DATABASE Farmacie;

CREATE TABLE Utilizatori(
UtilizatorID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
Rol char(10) DEFAULT 'Utilizator',
Nume nvarchar(50) NOT NULL,
Prenume nvarchar(50) NOT NULL,
Email varchar(50) NOT NULL UNIQUE,
Parola varchar(50) NOT NULL,
Domiciliu nvarchar(100) DEFAULT NULL,
CONSTRAINT ChK_Rol CHECK(Rol='Utilizator' OR Rol='Manager' OR Rol='Admin')
);

CREATE TABLE Promotii(
PromotieID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
DataStart smalldatetime NOT NULL CHECK(DataStart>=GETDATE()),
DataTerminare smalldatetime NOT NULL CHECK(DataTerminare>GETDATE()),
ProcentReducere tinyint NOT NULL CHECK(ProcentReducere>0 AND ProcentReducere<=100)
);

CREATE TABLE Comenzi(
ComandaID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
UtilizatorID int DEFAULT 1 FOREIGN KEY REFERENCES Utilizatori(UtilizatorID) ON DELETE SET DEFAULT,
DataComanda smalldatetime NOT NULL,
TipLivrare char(20) NOT NULL CHECK(TipLivrare='ridicare din farmacie' OR TipLivrare='livrare la domiciliu'),
TipPlata char(7) NOT NULL CHECK(TipPlata='online' OR TipPlata='ramburs')
);

CREATE TABLE Facturi(
FacturaID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
ComandaID int FOREIGN KEY REFERENCES Comenzi(ComandaID) ON DELETE CASCADE,
Serie char(4) NOT NULL,
Numar bigint NOT NULL
);

CREATE TABLE ListeFavorite(
ListaID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
UtilizatorID int FOREIGN KEY REFERENCES Utilizatori(UtilizatorID) ON DELETE CASCADE,
NumeLista nvarchar(50) NOT NULL
);

CREATE TABLE Medicamente(
MedicamentID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
PromotieID int FOREIGN KEY REFERENCES Promotii(PromotieID) ON DELETE SET NULL,
Denumire nvarchar(50) NOT NULL,
Descriere nvarchar(150) NOT NULL,
Imagine char(50) NOT NULL,
Categorie nchar(19) NOT NULL,
Forma nchar(25) NOT NULL,
TipAdministrare char(10) NOT NULL,
TipEliberare nchar(20) NOT NULL CHECK(TipEliberare='la liber' OR TipEliberare='cu rețetă' OR TipEliberare='cu rețetă compensată'),
Pret decimal(6, 2) NOT NULL,
Stoc int NOT NULL,
Distribuitor nvarchar(50) NOT NULL,
Prospect ntext NOT NULL,
DataExpirare smalldatetime NOT NULL
);

CREATE TABLE MedicamenteFavorite(
ListaID int FOREIGN KEY REFERENCES ListeFavorite(ListaID) ON DELETE CASCADE,
MedicamentID int DEFAULT 1 FOREIGN KEY REFERENCES Medicamente(MedicamentID) ON DELETE SET DEFAULT,
CONSTRAINT PK_MedicamenteFavorite PRIMARY KEY (ListaID, MedicamentID)
);

CREATE TABLE Recenzii(
RecenzieID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
UtilizatorID int FOREIGN KEY REFERENCES Utilizatori(UtilizatorID) ON DELETE CASCADE,
MedicamentID int FOREIGN KEY REFERENCES Medicamente(MedicamentID) ON DELETE CASCADE,
NumarStele tinyint NOT NULL CHECK(NumarStele>0 AND NumarStele<=5),
Comentariu nvarchar(250),
DataRecenzie smalldatetime NOT NULL
);

CREATE TABLE MedicamenteComenzi(
MedicamentID int DEFAULT 1 FOREIGN KEY REFERENCES Medicamente(MedicamentID) ON DELETE SET DEFAULT,
ComandaID int FOREIGN KEY REFERENCES Comenzi(ComandaID) ON DELETE CASCADE,
NumarBucati int NOT NULL
);

INSERT INTO Utilizatori
VALUES('Utilizator', 'Utilizator', 'Șters', '-', '-', '-'); --cazul pentru care utilizatorul isi sterge contul

INSERT INTO Medicamente
VALUES(NULL, 'Medicament Indisponibil', '-', '-', '-', '-', '-', 'la liber', 0.00, 0, '-', '-', '2023-01-01') --cazul pentru care medicamentul este sters din baza de date

--drop-urile au fost puse pentru a verifica constrangerile de integralitate referentiala
--DROP TABLE MedicamenteFavorite;
--DROP TABLE MedicamenteComenzi;
--DROP TABLE Recenzii;
--DROP TABLE ListeFavorite;
--DROP TABLE Facturi;
--DROP TABLE Comenzi;
--DROP TABLE Medicamente;
--DROP TABLE Promotii;
--DROP TABLE Utilizatori;

SELECT * FROM Utilizatori;
SELECT * FROM Medicamente;
