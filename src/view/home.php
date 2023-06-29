<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REST API</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
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
</body>
</html>