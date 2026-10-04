# Sistema de Gestão de Estoque

## Objetivo
Sistema web simples para controlar os produtos do estoque de um mercado, permitindo
**cadastrar, listar, editar e excluir** produtos.

## Tecnologias
- PHP 8 (mysqli com Prepared Statements)
- MySQL / MariaDB
- HTML e CSS

## Requisitos
- PHP 7.4 ou superior
- MySQL ou MariaDB
- XAMPP, Laragon ou o servidor embutido do PHP

## Instalação e configuração
1. Clone o repositório:
   ```bash
   git clone https://github.com/ramontsantos-trindade/estoque-.git
   ```
2. Importe o banco de dados (arquivo `banco/db.sql`):
   ```bash
   mysql -u root -p < banco/db.sql
   ```
   ou importe pelo phpMyAdmin.
3. Se necessário, edite usuário e senha do MySQL em `conexao.php`.
4. Inicie o servidor dentro da pasta do projeto:
   ```bash
   php -S localhost:8000
   ```
5. Acesse http://localhost:8000

(No XAMPP, copie a pasta para `htdocs` e acesse `http://localhost/Ramon_trindade_2026/estoque-/`.)

## Estrutura de arquivos
```
estoque/
├── database/estoque.sql   # criação do banco e da tabela
├── docs/caso-de-uso.md    # documentação e diagrama de caso de uso
├── conexao.php            # conexão com o banco
├── validar.php            # validação dos dados
├── index.php              # listagem de produtos
├── cadastrar.php          # cadastro
├── editar.php             # edição
├── excluir.php            # exclusão
├── estilo.css             # estilos
└── README.md
```

## Estrutura do banco de dados
Tabela `produtos`:

| Campo | Tipo | Observação |
|-------|------|------------|
| id | INT | chave primária, auto incremento |
| nome | VARCHAR(100) | obrigatório |
| categoria | VARCHAR(50) | obrigatório |
| descricao | TEXT | opcional |
| preco | DECIMAL(10,2) | obrigatório |
| quantidade | INT | obrigatório |
| data_validade | DATE | obrigatório |

## Funcionalidades
- **Cadastrar** (`cadastrar.php`): formulário com validação dos campos.
- **Listar** (`index.php`): tabela com todos os produtos.
- **Editar** (`editar.php`): altera os dados de um produto.
- **Excluir** (`excluir.php`): remove o produto após confirmação.

## Segurança
- Todas as consultas usam **Prepared Statements** (`prepare`, `bind_param`, `execute`).
- Validação dos dados no servidor (`validar.php`).
- Saída escapada com `htmlspecialchars` (evita XSS).
- Erros do banco tratados com `try/catch`, sem mostrar detalhes ao usuário.

## Caso de uso
Veja [docs/caso-de-uso.md][def].