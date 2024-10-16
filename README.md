
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
  


# Documentação da API - Upload de Transação

## Descrição:
Este endpoint permite enviar os dados do arquivo que serão via POST, incluindo informações sobre a loja e os detalhes da transação.

### URL:
**POST** `/upload`

### Requisição:
O corpo da requisição deve ser enviado o array com dos dados das lojas e transações.

#### Parâmetros:
- **store_name**: (string) Nome da loja.
- **store_owner**: (string) Nome do proprietário da loja.
- **type**: (string) Tipo de transação(Entradas e Saídas).
- **date**: (date) Data da transação.
- **time**: (time) Hora da transação.
- **value**: (float) Valor da transação.
- **cpf**: (string) Cpf do cliente.
- **card**: (string) Cartão do cliente.

#### Exemplo de Requisição:
```bash
POST /upload
URL : http://localhost/projetos/desafio-dev/api/upload


return [
            'type'          => (int)substr($line, 0, 1),
            'date'          => substr($line, 1, 8),
            'value'         => (float)substr($line, 9, 10) / 100,
            'cpf'           => substr($line, 19, 11),
            'card'          => substr($line, 30, 12),
            'time'          => substr($line, 42, 6),
            'store_owner'   => trim(substr($line, 48, 14)),
            'store_name'    => trim(substr($line, 62, 19)),
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
- **500 Internal Server Error**: Em caso de erro interno do servidor, será retornada uma mensagem descrevendo o erro ocorrido.
- **422 Unprocessable Entity**: Se houver algum problema na validação dos dados enviados, será retornado um status de erro e detalhes da falha.

7. **Acessar o Projeto**:
   - Acesse pelo navegador em `http://localhost:8080`
