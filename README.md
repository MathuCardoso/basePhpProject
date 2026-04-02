# Flavour

Uma estrutura base para projetos PHP Vanilla, pensada para desenvolvedores que desejam iniciar projetos pessoais sem depender de frameworks robustos.

## Descrição

O **Flavour** oferece ao usuário apenas um “gostinho” (flavour) da experiência de trabalhar com um framework completo, como o Laravel. A proposta é disponibilizar uma base leve, organizada e de fácil compreensão, contendo recursos essenciais que ajudam a acelerar o desenvolvimento, como roteamento, renderização de views, helpers e conexão com banco de dados.

> Aviso: este projeto foi criado com foco em **estudo, prototipação e desenvolvimento local**. Ele **não é recomendado para produção**.

## Funcionalidades

- Roteamento com suporte a rotas `GET`, `POST`, `PUT` e `DELETE`
- Suporte a **path parameters** em rotas, como `/user/{id}`
- Carregamento de views por controller
- Helpers globais para utilidades comuns
- Configuração por variáveis de ambiente com `.env`
- Conexão com banco de dados via `PDO`
- Tratamento básico de erros HTTP (`404`, `500`) e erro de conexão com banco
- Servidor local rápido usando o servidor embutido do PHP via Composer

## Tecnologias utilizadas

- PHP
- HTML
- CSS
- JavaScript
- Composer
- PDO
- `vlucas/phpdotenv`

## Instalação

Clone o repositório:

```bash
git clone https://github.com/MathuCardoso/Flavour
cd ApexBase
```

Instale as dependências:

```bash
composer install
```

Crie o arquivo de ambiente a partir do exemplo:

```bash
cp .env.example .env
```

No Windows PowerShell, você também pode usar:

```powershell
Copy-Item .env.example .env
```

Depois, preencha as variáveis do arquivo `.env`, principalmente as configurações de banco de dados:

```env
APP_NAME=ApexBase
APP_LANG=pt-BR
APP_DATE_FORMAT=d/m/Y
APP_DEFAULT_TIMEZONE=America/Sao_Paulo
APP_ENV=development

DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=seu_banco
DB_USER=root
DB_PASSWORD=
```

## Como usar

Inicie o servidor local com o comando abaixo:

```bash
php serve
```

Por padrão, a aplicação será servida em:

```text
http://localhost:8000
```

### Exemplo de rota

As rotas ficam em `/routes.php`:

```php
use App\controller\HomeController;
use Core\router\Router;

Router::get('/callable', function () {
	echo 'Callable funcionando!';
});

Router::get('/user/{nome}/{idade}', function ($params) {
	echo "Nome: {$params['nome']}<br>Idade: {$params['idade']}";
});
```

### Exemplo de carregamento de view

Nos controllers, você pode renderizar uma view assim:

```php
public function index(): void
{
    $this->loadView('home');
}
```

## Estrutura do projeto

```text
ApexBase/
├── app/
│   ├── controllers/
│   │   └── HomeController.php
│   ├── model/
│   ├── repository/
│   └── service/
├── core/
│   ├── database/
│   │   ├── config.php
│   │   └── Connection.php
│   ├── http/
│   │   └── View.php
│   ├── router/
│   │   └── Router.php
│   └── util/
│       ├── helpers.php
│       └── pathHelpers.php
├── public/
│   ├── index.php
│   ├── css/
│   │   ├── home.css
│   │   └── main.css
│   ├── js/
│   │   └── script.js
│   └── view/
│       ├── home.php
│       ├── errors/
│       │   ├── 404.php
│       │   ├── 500.php
│       │   └── dbError.php
│       └── layouts/
│           └── html_template/
│               ├── footer.php
│               └── header.php
├── routes/
│   └── web.php
├── storage/
│   └── logs.txt
├── .env.example
├── composer.json
├── serve
└── vendor/
```

### Pastas importantes

- `app/controllers`: controllers responsáveis por receber a requisição e carregar views ou executar ações.
- `app/model`: espaço reservado para modelos e classes de representação de dados.
- `app/repository`: camada para acesso a dados e consultas ao banco.
- `app/service`: regras de negócio e serviços da aplicação.
- `core/database`: configuração e conexão com o banco via `PDO`.
- `core/http`: classe de apoio para renderização de views e resposta HTTP.
- `core/router`: implementação do roteador da aplicação.
- `core/util`: helpers globais e utilitários de caminho carregados pelo Composer.
- `public`: diretório público da aplicação, com `index.php`, arquivos estáticos e as views.
- `public/view`: páginas, layouts e telas de erro exibidas pela aplicação.
- `routes`: definição das rotas, como o arquivo `web.php`.
- `storage`: arquivos gerados em tempo de execução, como logs.
- `serve`: script utilitário para subir o servidor local rapidamente.
- `vendor`: dependências instaladas pelo Composer.

## Contribuição

Contribuições são bem-vindas. Para colaborar:

1. Faça um fork do projeto
2. Crie uma branch para sua feature ou correção
3. Realize as alterações
4. Execute testes manuais no ambiente local
5. Abra um Pull Request com uma descrição clara

Se a ideia for uma melhoria estrutural, vale abrir uma issue antes para alinhar a proposta.

## Autor

**Matheus Cardoso**  
Desenvolvedor responsável pelo projeto **Flavour**.
