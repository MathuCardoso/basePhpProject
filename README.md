# ApexBase

Uma estrutura base para projetos PHP Vanilla, pensada para desenvolvedores que desejam iniciar projetos pessoais sem depender de frameworks robustos.

## Descrição

O **ApexBase** funciona como um mini framework para aplicações PHP puras. A proposta é oferecer uma base enxuta, organizada e fácil de entender, com recursos essenciais para acelerar o desenvolvimento, como roteamento, carregamento de views, helpers e conexão com banco de dados.

> Aviso: este projeto foi criado com foco em **estudo, prototipação e desenvolvimento local**. Ele **não é recomendado para produção**.

## Funcionalidades

- Roteamento simples com suporte a rotas `GET` e `POST`
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
git clone <url-do-repositorio>
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

Inicie o servidor local com um dos comandos:

```bash
composer serve
```

ou

```bash
composer run serve
```

Por padrão, a aplicação será servida em:

```text
http://localhost:8000
```

### Exemplo de rota

As rotas ficam em `app/routing/routes.php`:

```php
use App\controller\HomeController;
use App\routing\Router;

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
│   ├── controller/      # Controllers base e controllers da aplicação
│   ├── database/        # Classe de conexão com banco de dados
│   └── routing/         # Router e definição das rotas
├── configs/             # Configurações centralizadas, como banco
├── helpers/             # Funções auxiliares globais
├── public/              # Ponto de entrada da aplicação e arquivos públicos
│   ├── css/             # Arquivos de estilo
│   ├── js/              # Scripts front-end
│   ├── view/            # Views da aplicação e páginas de erro
│   └── index.php        # Front controller
├── storage/             # Logs e arquivos gerados em tempo de execução
├── vendor/              # Dependências instaladas pelo Composer
├── .env.example         # Exemplo de variáveis de ambiente
├── composer.json        # Dependências, autoload e scripts
└── README.md
```

### Pastas importantes

- `app/controller`: concentra a lógica de controle e o carregamento de views.
- `app/routing`: contém a classe `Router` e o arquivo de registro das rotas.
- `app/database`: centraliza a conexão com o banco usando `PDO`.
- `configs`: armazena configurações reutilizáveis do sistema.
- `helpers`: disponibiliza funções globais como `dd()`, `httpError()` e `addLog()`.
- `public/view`: guarda as páginas, templates HTML e telas de erro.
- `storage`: usado para persistir logs da aplicação.

## Contribuição

Contribuições são bem-vindas. Para colaborar:

1. Faça um fork do projeto
2. Crie uma branch para sua feature ou correção
3. Realize as alterações
4. Execute testes manuais no ambiente local
5. Abra um Pull Request com uma descrição clara

Se a ideia for uma melhoria estrutural, vale abrir uma issue antes para alinhar a proposta.

## Licença

Este projeto ainda **não possui uma licença definida** no repositório. Se você pretende reutilizar ou distribuir este código, o ideal é adicionar uma licença explícita antes.

## Autor

**Matheus Cardoso**  
Desenvolvedor responsável pelo projeto **ApexBase**.
