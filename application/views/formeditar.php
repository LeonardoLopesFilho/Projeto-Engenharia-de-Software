<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="/controle/salvar/<? $produto['id_produto'] ?>" method="post">
        nome:<input type="text" name="nome" value="<?=$produto['nome'] ?>">
        descricao:<input type="text" name="descricao" value="<?=$produto['descricao'] ?>">
        data_validade:<input type="text" name="data_validade" value="<?=$produto['data_validade'] ?>">
        quantidade:<input type="text" name="quantidade" value="<?=$produto['quantidade'] ?>">
        valor:<input type="text" name="valor" value="<?=$produto['valor'] ?>">
        <button type="submit">Salvar</button>
        
        
        
        
        </form>
    </div>
    
</body>
</html>