CREATE DATABASE libreria;

USE libreria;
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    autor VARCHAR(255) NOT NULL,
    ISBN VARCHAR(255) NOT NULL
);

INSERT INTO libros (nombre, descripcion, precio, stock, autor, ISBN) VALUES
('El señor de los Anillos', 'Libro de fantasía', 25.99, 10, 'Tolkien','454512654'),
('El archivo de las tormentas', 'Recopilación de las mejores tormentas', 10.50, 50, 'Paco Meloso','48485165'),
('El libro gordo de Petete', 'Memorias de Petete', 5.30, 24, 'Petete','121245135'),
('Manuelita, el libro', 'Aventura de una tortuga', 8.90, 10, 'Kase O','16154871'),
('Las aventuras de Anita', 'Antología de las historias de Anita', 14.20, 40, 'Anita Max','62629584');