# Tecnologias Utilizadas
Este projeto foi desenvolvido utilizando a linguagem PHP, juntamente com o framework CodeIgniter 4 como framework PHP, proporcionando uma estrutura sólida e organizada para a aplicação,  para a lógica do servidor, enquanto JavaScript e jQuery foram empregados para manipulação dinâmica do conteúdo do lado do cliente, possibilitando uma melhor experiência do usuário.

A biblioteca SweetAlert foi utilizada para melhorar as notificações e mensagens de alerta, tornando-as mais amigáveis e visuais. Além disso, o Bootstrap foi aplicado para estilizar a interface e garantir um layout responsivo e moderno.

Essas tecnologias foram escolhidas para proporcionar uma experiência de desenvolvimento ágil e uma interface rica e interativa para o usuário final.

# Testes
Para rodar os testes, tem que navegar até a pasta da api do projeto, e rodar o comando
```bash
php vendor/bin/phpunit tests/Feature/Controllers/UploadControllerTest.php


# Documentação de Configuração do Projeto

## Requisitos:
- **PHP**: Versão 8.2
- **Servidor Web**: Apache (WampServer, XAMPP ou equivalente)
- **Banco de Dados**: MySQL ou MariaDB
- **Composer**: Para gerenciamento de dependências
- **CodeIgniter**: Versão 4.x

---

## Configuração no Windows (WampServer):
1. **Baixar e instalar o WampServer**:
   - Faça o download do [WampServer](https://www.wampserver.com/en/) e instale em sua máquina.
   
2. **Configurar o WampServer**:
   - Inicie o WampServer e certifique-se de que os serviços de Apache e MySQL estão rodando.

3. **Instalar Composer**:
   - Baixe e instale o Composer para Windows em [getcomposer.org](https://getcomposer.org/download/).
   - Verifique se o Composer está instalado corretamente executando o comando:
     ```bash
     composer --version
     ```

4. **Clonar o Projeto**:
   - Navegue até a pasta onde deseja colocar o projeto (por exemplo, `C:\wamp64\www\`) e execute o comando para clonar o repositório:
     ```bash
     git clone <url-do-repositorio>
     ```

5. **Instalar Dependências**:
   - Acesse a pasta do projeto e instale as dependências:
     ```bash
     composer install
     ```

6. **Configurar o Ambiente (.env)**:
   - Renomeie o arquivo `.env.example` para `.env` e ajuste as configurações de banco de dados e outras variáveis.

7. **Configurar o Servidor Local**:
   - Inicie o servidor com o comando:
     ```bash
     php spark serve
     ```

8. **Acessar o Projeto**:
   - Acesse o projeto pelo navegador em: `http://localhost:8080`

---

## Configuração no Linux (Ubuntu ou outra distribuição):

1. **Instalar Apache, MySQL, PHP e Composer**:
   - Abra o terminal e execute os seguintes comandos:
     ```bash
     sudo apt update
     sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql
     sudo apt install composer
     ```

2. **Clonar o Projeto**:
   - Navegue até o diretório onde deseja instalar o projeto (por exemplo, `/var/www/html/`) e clone o repositório:
     ```bash
     git clone <url-do-repositorio>
     ```

3. **Instalar Dependências**:
   - Acesse a pasta do projeto e instale as dependências:
     ```bash
     cd /var/www/html/<nome-do-projeto>
     composer install
     ```

4. **Configurar o Ambiente (.env)**:
   - Renomeie o arquivo `.env.example` para `.env` e ajuste as variáveis, como banco de dados.

5. **Configurar Permissões**:
   - Certifique-se de que o servidor tem permissão para acessar a pasta do projeto:
     ```bash
     sudo chown -R www-data:www-data /var/www/html/<nome-do-projeto>
     ```

6. **Reiniciar o Apache**:
   - Reinicie o Apache para aplicar as mudanças:
     ```bash
     sudo systemctl restart apache2
     ```

7. **Acessar o Projeto**:
   - Abra o navegador e acesse o projeto: `http://localhost/<nome-do-projeto>`

---

## Configuração no Mac (macOS):

1. **Instalar Homebrew (se não tiver instalado)**:
   - Abra o terminal e execute:
     ```bash
     /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
     ```

2. **Instalar Apache, MySQL, PHP e Composer**:
   - Usando o Homebrew, instale os seguintes pacotes:
     ```bash
     brew install httpd mysql php composer
     ```

3. **Iniciar Serviços**:
   - Inicie o Apache e MySQL:
     ```bash
     sudo apachectl start
     brew services start mysql
     ```

4. **Clonar o Projeto**:
   - Navegue até o diretório do projeto (por exemplo, `/Library/WebServer/Documents/`) e clone o repositório:
     ```bash
     git clone <url-do-repositorio>
     ```

5. **Instalar Dependências**:
   - Acesse a pasta do projeto e instale as dependências:
     ```bash
     composer install
     ```

6. **Configurar o Ambiente (.env)**:
   - Renomeie o arquivo `.env.example` para `.env` e configure as variáveis.
  


# Documentação da API

## Descrição:
Este endpoint permite enviar os dados do arquivo que serão via POST, incluindo informações sobre a loja e os detalhes da transação.

### URL:
**POST** `/upload`

### Requisição:
O corpo da requisição deve ser enviado o array com dos dados das lojas e transações.

#### Parâmetros:
- **store_name**: (string) Nome da loja.
- **store_owner**: (string) Nome do proprietário da loja.
- **type**: (tinyint) Tipo de transação(Entradas e Saídas).
- **date**: (date) Data da transação.
- **time**: (time) Hora da transação.
- **value**: (float) Valor da transação.
- **cpf**: (string) Cpf do cliente.
- **card**: (string) Cartão do cliente.

#### Exemplo de Requisição:
```bash
POST /upload
URL : http://localhost/projetos/desafio-dev/api/upload


       [
            'type'          => 1,
            'date'          => '2024-10-16',
            'value'         => 1'52,14',
            'cpf'           => '06652598830',
            'card'          => '2344****1222',
            'time'          => '14:14:25',
            'store_owner'   => 'João Brasil',
            'store_name'    => 'Pastelaria do João',
        ];

### Respostas:
A API irá retornar um JSON com o status da operação e uma mensagem de erro caso haja algum problema.

#### Sucesso:
```json
{
  "status": true
}
```

#### Falha (exemplo de erro):
```json
{
  "status": false,
  "message": "Mensagem de erro ou query gerada"
}
```

### Tratamento de Erros:
-  Em caso de erro interno do servidor, será retornada uma mensagem descrevendo o erro ocorrido.

7. **Acessar o Projeto**:
   - Acesse pelo navegador em `http://localhost:8080/projetos/desafio-dev`
