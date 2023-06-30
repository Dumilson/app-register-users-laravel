# Cadastro de Usuarios
## Stacks e Tecnologias
 `PHP 8.1 | COMPOSER 2.* | MySQL  8.* | LARAVE 10 | DDD | Repository | JavaScript | Blade`
 
## Instalação do Projecto 

Baixe a aplicação: Baixe o código-fonte da aplicação Laravel do repositório do GitHub. Isso pode ser feito usando o comando git clone seguido pelo URL do repositório. Por exemplo:
bash

    https://github.com/Dumilson/app-register-users-laravel.git

Navegue até a `pasta raiz da aplicação Laravel` no seu terminal:

    cd app-register-users-laravel
Faça uma cópia do arquivo .env.example: Execute o seguinte comando para criar uma cópia do arquivo .env.example e renomeá-lo para .env:

    cp .env.example .env

### `Configuração do arquivo env e banco de dados`

Abra o arquivo .env em um editor de texto e configure as credenciais do banco de dados:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=banco
    DB_USERNAME=user
    DB_PASSWORD=senha

Certifique-se de que essas informações sejam correspondentes às suas configurações locais.

 Crie um `banco de dados vazio com o nome especificado no arquivo .env.` Isso pode ser feito usando uma ferramenta como o `phpMyAdmin` ou executando comandos SQL diretamente no banco de dados.

### `Configuração do composer, Migration e Seed`

Instale as dependências do projeto usando o Composer:

    composer install

Execute as migrações para criar as tabelas no banco de dados:

    php artisan migrate

Execute os seeders execute o comando:

    php artisan db:seed

Depois de o seed os dados gravados para acesso ao sistema são :

        Email: admin@gmail.com
        Senha: admin

### `Rodando o Projecto`
Gere uma chave de aplicação única usando o comando:

    php artisan key:generate

Inicie o servidor local para executar a aplicação Laravel:

        php artisan serve

Pronto! Agora você deve ter a aplicação Laravel em execução localmente. 
    Acesse http://localhost:8000 (ou a porta especificada no terminal) em seu navegador para visualizar a aplicação.
