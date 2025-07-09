CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,   
    descripcion_corta TEXT NOT NULL,
    cuerpo_articulo TEXT NOT NULL,
    image_one VARCHAR(255), -- para una imagen destacada
    image_two VARCHAR(255),  
    image_three VARCHAR(255),
    tags VARCHAR(255),
    metatags VARCHAR(250),  
    estado VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   
)