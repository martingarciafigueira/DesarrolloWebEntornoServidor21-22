
--Actividad 1
SELECT Codigo FROM Fabricantes

SELECT * FROM Fabricantes

SELECT * FROM Fabricantes
ORDER BY Nombre DESC

--Actividad 2
INSERT INTO Fabricantes VALUES ('PSA')

--Actividad 3
INSERT INTO Fabricantes
SELECT * FROM NuevosFabricantes

--Actividad 4
UPDATE Fabricantes
SET Nombre = 'QUIQUE'
WHERE ID = 01

--Actividad 5
DELETE Fabricantes
WHERE Nombre = 'MARTÍN'





