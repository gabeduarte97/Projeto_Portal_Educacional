-- Configurações iniciais
SET NAMES utf8mb4;
SET time_zone = '+00:00';

-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS portal;
USE portal;

-- Tabela de usuários
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  senha VARCHAR(255),
  cpf VARCHAR(14),
  data_nascimento DATE,
  tipo ENUM('comum', 'admin'),
  token_recuperacao VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de cursos
CREATE TABLE cursos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  descricao TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de conteúdos dos cursos
CREATE TABLE conteudos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100),
  texto TEXT,
  id_curso INT,
  FOREIGN KEY (id_curso) REFERENCES cursos(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de postagens
CREATE TABLE postagens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  conteudo TEXT,
  imagem_url VARCHAR(255),
  autor_id INT DEFAULT NULL,
  data_publicacao DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (autor_id) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de comentários
CREATE TABLE comentarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  postagem_id INT NOT NULL,
  autor_id INT NOT NULL,
  conteudo TEXT NOT NULL,
  data_publicacao DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (postagem_id) REFERENCES postagens(id) ON DELETE CASCADE,
  FOREIGN KEY (autor_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dados de teste
INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento, tipo)
VALUES (
  'Gabriel Teste',
  'gabriel@teste.com',
  '$2y$10$4Iykz2nHqu0L58ppGkkU9eb6bB0mdAo5kk58F.cQZIf5wAtu.A20K',
  '123.456.789-00',
  '2000-01-01',
  'comum'
);

INSERT INTO postagens (titulo, conteudo, imagem_url, autor_id)
VALUES (
  'Postagem de Exemplo',
  'Esta é uma postagem criada para teste visual do portal.',
  NULL,
  1
);

INSERT INTO comentarios (postagem_id, autor_id, conteudo)
VALUES (
  1,
  1,
  'Comentário automático feito por Gabriel para teste de visualização.'
);
