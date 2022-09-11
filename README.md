
 
#   Trabalho final de Desenvolvimento Web 1    
    Feito por Thales Assis de Olivera e Natan Cervinski
## Desenvolvimento da aplicação de um site de cadastro de solicitações.
    O projeto basea-se em um banco de dados contendo duas tabelas, uma de usuários e outra de solicitações. São apresentadas para o usuário basicamente 4 telas:
        1.  Tela de Criação de usuário: consiste no preenchimento de um formulário onde o usuario fornece seu apelido, nome, email, senha e a confirmação da senha. As informações são válidadas e enviadas para o banco de dados através de um metodo POST, criando uma query e salvando-as no banco de dados.

        2.  Tela de Login: Tela onde o usuário informa o seu login(user) e senha. Caso estejam cadastrados no banco de dados o usuário acessa a tela principal, caso contrário o usuário é informado de que usuário e/ou senha não coincidem e tem a opção de criar uma conta.

        3.  Página principal: é a tela onde o usuário visualiza as suas solicitações em aberto podendo editar ou excluir as mesmas. A página fornece ao usuário, também, as opçoes de criar uma nova solicitação ou deslogar de sua conta.

        4.  Página de cadastro de solicitação: é a tela onde o usuário faz a sua solicitação, informando à sua natureza (conserto, limpeza, instalação e etc.) e adicionando uma breve descrição sobre o problema enviando as informações através de um método POST onde tem suas informações válidadas e salvas no banco de dados.

        obs: cada usuário visualiza somente as suas solicitações, porém, o usuário administrador, criado juntamente com o banco de dados, tem acesso a todas as solicitações. 