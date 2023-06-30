# Tecnologias utilizadas:
- PHP 8.2.4
- MySql (MariaDB)
- Javascript
- Html
- Css

# Como executar o projeto:

A aplicação foi desenvolvida utilizando o software XAMP, dessa forma, para executar o mesmo basta clonar o projeto na pasta raiz que o
servidor utiliza para servir a aplicação, que por padrão é a pasta htdocs. Além disso, o banco de dados deve estar em execução para a 
aplicação funcionar. Outros servidores também podem ser utilizados.

Estando na pasta raiz do projeto deve-se executar o seguinte comando:
```
./composer.phar install
```
Esse comando irá configurar o autoload para que as classes possam ser encontradas.

Após isso a aplicação pode ser acessada a partir dos seguintes endpoints, a partir da raiz do projeto (/api-rest-php/public):
- GET    /         	           Front (Pode ser usado para cadastrar clubes e consumir recursos);
- GET    /clubes    	       Lista todos os clubes cadastrados;
- POST	 /clubes    	       Cadastra um novo clube;
- GET    /recursos  	       Lista todos os recursos cadastrados;
- POST   /consumirRecurso      Consome um recurso.

Validações foram adicionadas para garantir a integridade da aplicação.
