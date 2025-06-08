# Portal Educacional

Este é um sistema web desenvolvido em PHP com padrão MVC para a disciplina de Desenvolvimento de Sistemas, com funcionalidades voltadas para o gerenciamento de usuários, postagens e comentários.

## Funcionalidades

- Autenticação de usuários (login e cadastro)
- CRUD de Usuários (admin)
- CRUD de Postagens (com imagens)
- Comentários em postagens
- Segurança com CSRF Token
- Painel administrativo com navegação facilitada
- Validações visuais com JavaScript
- Upload de imagens real via formulário
- Layout com menu ativo
- Recuperação de senha com CPF + data de nascimento

## Requisitos

- PHP >= 7.4
- MySQL ou MariaDB
- XAMPP ou similar

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/gabeduarte97/Projeto_Portal_Educacional.git
   ```

2. Copie o diretório `portal-educacional` para sua pasta `htdocs` (no XAMPP):
   ```bash
   cp -r portal-educacional/ /Applications/XAMPP/xamppfiles/htdocs/
   ```

3. Importe o arquivo `backup_banco.sql` para o MySQL:
   - via phpMyAdmin ou linha de comando.

4. Inicie o Apache e MySQL no XAMPP.

5. Acesse o sistema no navegador:
   ```
   http://localhost/portal-educacional/public/
   ```

## Organização de Pastas

- `app/controller/` – Controladores (lógica das ações)
- `app/model/` – Acesso ao banco de dados
- `app/view/` – Telas e páginas HTML/PHP
- `app/core/` – Arquitetura base (roteamento, segurança, conexão)
- `public/` – Ponto de entrada (index.php) e arquivos públicos (CSS)
- `sql/` – Arquivo de backup do banco de dados

## Observações

- O projeto está preparado para ser executado em qualquer máquina com XAMPP corretamente configurado.
- O professor poderá criar seu próprio usuário durante os testes.

