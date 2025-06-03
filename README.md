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

## Requisitos

- PHP >= 7.4
- MySQL ou MariaDB
- XAMPP ou similar

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/gabeduarte97/Projeto_Portal_Educacional.git
   ```

2. Copie para seu diretório `htdocs` do XAMPP:
   ```bash
   cp -r portal-educacional/Applications/XAMPP/xamppfiles/htdocs/
   ```

3. Importe o arquivo `backup_banco.sql` para seu MySQL:
   - via phpMyAdmin ou linha de comando.

4. Inicie o servidor Apache e MySQL no XAMPP.

5. Acesse o sistema:
   ```
   http://localhost/portal-educacional/public/
   ```

## Credenciais de acesso

Você pode se cadastrar com seu e-mail, ou alterar manualmente um usuário diretamente na base de dados.

## Organização

- `app/controller` – Controladores das páginas
- `app/model` – Acesso ao banco de dados
- `app/view` – Layouts e templates
- `public/` – Arquivos públicos, como CSS e index.php
- `app/core/` – Arquivos de estrutura MVC (roteador, segurança, etc.)
