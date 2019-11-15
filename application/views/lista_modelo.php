<!DOCTYPE html>
<html lang="PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Aluno</title>
</head>
<body>
    <h1>Lista da Tabela Alunos</h1>
    <hr>
    <a href="/Aluno/formInsere">Inserir</a>
    <table border='1'>
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>-</th>
            <th>-</th>
        </thead>
        <tbody>
            <?php foreach($alunos as $aluno): ?>
            <tr>
                <td><?= $aluno->id ?></td>
                <td><?= $aluno->nome ?></td>
                <td><?= $aluno->nascimento ?></td>
                <td> <a href="/Aluno/formAltera?id=<?= $aluno->id ?>">Alterar</a> </td>
                <td> <a href="/Aluno/deletaDb?id=<?= $aluno->id ?>">Exluir</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>