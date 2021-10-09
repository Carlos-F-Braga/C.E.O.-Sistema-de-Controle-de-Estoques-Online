<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C.E.O - Relatório de Movimentações</title>

    <!-- Fonts Google -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap v4.6.0 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h3 class="text-center mt-4">Movimentações - C.E.O</h3>

    <br />

    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr class="text-center">
                <th scope="col">Empresa</th>
                <th scope="col">Produto</th>
                <th scope="col">QTDE. Movimentada</th>
                <th scope="col">Estoque</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($movimentacoes as $movimentacao) {
            ?>
                <tr class="text-center">
                    <td scope="row"><?= $movimentacao['empresa'] ?></td>
                    <td><?= $movimentacao['nome'] ?></td>
                    <td><?= $movimentacao['quantidade'] ?></td>
                    <td><?= $movimentacao['qtde_estoque'] ?></td>
                    <td><?= $movimentacao['tipo'] ?></td>
                    <td><?= $movimentacao['data_lancamento'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>