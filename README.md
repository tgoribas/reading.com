
# Reading.com

Desafio para criar o IMDB dos livros.

## 💻 Tecnologias Usadas
- PHP 8.1.5
- Laravel Framework 9.11.0
- HTML
- CSS
- Javascript
- Mysql

## 🚀 Instalação
Para realizar a instalação do projeto siga esses passos.

#### GitClone
```
git clone https://github.com/tgoribas/reading.com.git
```

#### Composer
```
composer install
composer update
```
#### Gerar APP Key
```
php artisan key:generate
```


#### Arquivo .env
Renomear o arquivo `.env.exemple` para `.env` e fazer a configuração das variaveis se necessario.

## 🗂 Banco de dados
O nome do banco de dados foi criado como `reading` e foi formato em:
```
'charset' => 'utf8',
'collation' => 'utf8_unicode_ci',
```
O banco de dados poder ser instalado de duas maneiras via importação de um arquivo `.sql` ou via `Migration e Seeder`

#### Instalação via arquivo SQL
Existe na raiz do projeto um arquivo chamado `reading.sql`, com esse arquivo é possivel importação o banco de dados com todo seu conteúdo já pre-definido.

#### Migration & Seeder
```
php artisan migrate
php artisan db:seed
```

## 🔌 Executar Projeto
Para executar o projeto iniciar o servidor com o seguinte codigo.
```
php artisan serve
```
Depois acessar a url `http://127.0.0.1:8000`


## ⏳ Ajustes e melhorias
Funcionalidades para serem adicionadas
- [ ] Botão terminar livro
- [ ] Editar Livro
- [ ] Carregador foto em branco quando o livro não tiver foto
- [ ] Trocar undefined para 'Autor Desconhecido'