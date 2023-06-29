<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REST API</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
</head>
<body>
    <header>

    </header>
    <main>
        <h1>API Rest para gerenciamento de recursos financeiros de clubes</h1>

        <h3>Rotas da aplicação</h3>
        <table>
            <tr>
                <th>Método</th>
                <th>Endpoint</th>
                <th>Descrição</th>
            </tr>
            <tr>
                <td>GET</td>
                <td>/</td>
                <td>Página inicial</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/clubes</td>
                <td>Lista todos os clubes</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/clubes</td>
                <td>Cria um novo clube</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/consumirRecurso</td>
                <td>Consome um recurso</td>
            </tr>
        </table>

        <h3>Lista de Clubes</h3>
        <table id="lista-clubes">
            <tr>
                <th>ID</th>
                <th>Clube</th>
                <th>Saldo disponível</th>
            </tr>
        </table>

        <div>
            <h3>Criar clube</h3>
            <form id="criar-clube-form">
                <input type="text" name="clube" placeholder="Nome "/>
                <input type="text" name="saldo_disponivel" placeholder="Saldo"/>
                <input id="criar-clube-btn" type="button" name="submit-clube" value="Criar clube"/>
            </form>
        </div>

        <h3>Lista de Recursos</h3>
        <table id="lista-recursos">
            <tr>
                <th>ID</th>
                <th>Recurso</th>
                <th>Saldo disponível</th>
            </tr>
        </table>

        <div>
            <h3>Consumir recurso</h3>
            <form id="consumir-recurso-form">
                <input type="text" name="clube_id" placeholder="Id clube "/>
                <input type="text" name="recurso_id" placeholder="Id recurso"/>
                <input type="text" name="valor_consumo" placeholder="Valor Consumo"/>
                <input id="consumir-recurso-btn" type="button" name="submit-consumir" value="Consumir recurso"/>
            </form>
        </div>


    </main>
    <footer>
    </footer>
    <script src="./js/endpoint.js"></script>
    <script>
        criarListaClubes();
        criarListaRecursos();
    </script>
</body>
</html>