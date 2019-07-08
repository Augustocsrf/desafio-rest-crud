# rest-crud
Um programa que manipula um banco de dados de eventos com login e arquitetura rest.

Instruções:
1 - É necessario que exista um banco de dados chamado "db-eventos", com as tabelas "login" (com as colunas "Username" e "Senha") e "evento" (com as colunas "ID", "Nome", "Descricao", "HoraComeco" e "HoraTermino"). O programa está assumindo que o usuário para acessar o bando de dados é "host", e a senha é "".

2 - A primeira página é uma página de login que irá procurar se o valor da senha e do login estão na tabela de login. Se essa linha existir, então o aplicativo irá carregar a página de opções do que fazer em seguida, caso contrário, irá anunciar um erro em login ou senha.

3 - Na página de opções, pode-se selecionar qual função do CRUD o usuário quer utilizar.
