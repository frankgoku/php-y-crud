--
-- Archivo generado con SQLiteStudio v3.4.4 el lun. may. 13 06:31:53 2024
--
-- Codificación de texto usada: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Tabla: Inventory
CREATE TABLE IF NOT EXISTS Inventory (
    item_id INTEGER PRIMARY KEY,
    item_name TEXT NOT NULL,
    quantity INTEGER NOT NULL,
    price REAL NOT NULL
);
INSERT INTO Inventory (item_id, item_name, quantity, price) VALUES (1, 'skin clear ', 10, 30.0);
INSERT INTO Inventory (item_id, item_name, quantity, price) VALUES (2, 'acetaminofen', 25, 1.25);
INSERT INTO Inventory (item_id, item_name, quantity, price) VALUES (3, 'clonacepan ', 56, 1.75);

-- Tabla: Users
CREATE TABLE IF NOT EXISTS Users (user_id INTEGER PRIMARY KEY, email TEXT NOT NULL, password_hash TEXT NOT NULL);
INSERT INTO Users (user_id, email, password_hash) VALUES (5, 'ia.frank@gmail.com', '$2y$10$D2FQi5xp7LZOl.uRP66jreqp02ftpK2FehM6fr6NyTv4EM0M8Rc5G');
INSERT INTO Users (user_id, email, password_hash) VALUES (6, 'frankgoku2011@gmail.com', '$2y$10$o38.aNwQqVIFHS3euWMTjeWQkwXA3h8C8RycRY6L9ziBClTKEySr6');

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
