# agendaCRUD_PHP
Projeto de agendamento de contatos com PHP/BootsTrap/MySQL para firmar o os principios de CRUD
Para garantir um funcionamento deve-se criar um banco de dados usando o XAMPP, pode ser baixado nesse link "https://www.apachefriends.org/pt_br/index.html"
Após o download e instalação ative  o php e mysql.
Acesse "http://localhost/phpmyadmin", click em "SQL" rode o seguinte comando:
CREATE DATABASE agenda;

USE agenda;

CREATE TABLE contacts(
  id INT UNSIGNED AUTO_INCREMT PRIMARY KEY,
  name VARCHAR(260),
  phone VARCHAR(20),
  observation TEXT
);

Depois de seguir esse passos basta colar a pasta do projeto em "C:\xampp\htdocs" e acessar o projeto via "http://localhost/agenda/index.php"

O projeto conta com metodo binParam para garantir mais segurança ao usuario, mensagem informando quando um contato foi inserido, modificado ou deletado. interação de paginas e templates pre definidos.
