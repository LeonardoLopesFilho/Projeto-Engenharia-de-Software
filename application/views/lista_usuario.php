<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
body{
    background-color:#8B8A8A;
    padding-top: 55px;
    color:rgb(0, 0, 0);
    font-size: 150%;
    font-style:initial;
    font-family: sans-serif;
}
div{
    color:white;
    font-size: 70%;
    font-style:initial;
    font-family: sans-serif;
}
a{
    color:black;
    font-size: 15px;
    font-style:initial;
    font-family: sans-serif;
}
.tg  {
    border-collapse:collapse;
    border-spacing:0;
    border-color:#9ABAD9;
}
.tg td{
    font-family:Arial, sans-serif;
    font-size:14px;
    padding:10px 5px;
    border-style:solid;
    border-width:1px;
    overflow:hidden;
    word-break:normal;
    border-color:#9ABAD9;
    color:#444;
    background-color:#EBF5FF;
}
.tg th
{font-family:Arial, sans-serif;
    font-size:14px;
    font-weight:normal;
    padding:10px 5px;
    border-style:solid;
    border-width:1px;
    overflow:hidden;
    word-break:normal;
    border-color:#9ABAD9;
    color:#fff;
    background-color:#409cff;
}
.tg .tg-0lax{
    text-align:left;
    vertical-align:top
}
.tg .tg-kaf5{
    font-size:12px;
    font-family:"Comic Sans MS", cursive, sans-serif !important;
    ;text-align:left;
    vertical-align:top
}
</style>    
    <title>Document</title>
</head>
<body>
<center>
    <h1>Usuarios Cadastrados</h1>
    <table class="tg">
        <thead>
            <th class="tg-0lax">id_usuario</th>
            <th class="tg-0lax">username</th>
            <th class="tg-0lax">senha</th>
            <th class="tg-0lax">email</th>
            <th class="tg-0lax">cpf</th>
            <th class="tg-0lax">nivel_acesso</th>
            <th class="tg-0lax">documento</th>
            <th class="tg-0lax">-</th>
            <th class="tg-0lax">-</th>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td class="tg-0lax"><?= $usuario->id_usuario ?></td>
                    <td class="tg-0lax"><?= $usuario->username ?></td>
                    <td class="tg-0lax"><?= $usuario->senha ?></td>
                    <td class="tg-0lax"><?= $usuario->email ?></td>
                    <td class="tg-0lax"><?= $usuario->cpf ?></td>
                    <td class="tg-0lax"><?= $usuario->nivel_acesso ?></td>
                    <td class="tg-0lax"><?= $usuario->documento ?></td>
                    <td class="tg-0lax"><a href="/usuario/form_usuario?tipo=0&id=<?= $usuario->id_usuario ?>">alterar</a></td>
                    <td class="tg-0lax"><a href="/usuario/excluiregistro?id=<?= $usuario->id_usuario ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>Deseja cadastrar um novo usuario:<a href="/usuario/form_usuario?tipo=1">Cadastrar</a><br></div>
    <a href ="/login">Entrar com outro usuario</a>
</center>
</body>
</html>