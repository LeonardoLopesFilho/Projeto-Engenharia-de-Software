
<html>
  <head>
    <meta content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
  </head>
  <style>
  input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 4px;
    box-sizing: border-box;
  }
input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: rgb(107, 97, 97);
    padding: 14px 20px;
    margin: 8px 0;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 4px;
    cursor: pointer;
  }
  
  input[type=submit]:hover {
    background-color: #3a3939;
  }
  
  div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  h1.titulos{
    text-align:center;
    color: rgb(0, 0, 0);
  }
  table{
      background:rgb(255, 255, 255);
      border-radius: 15px;
      padding: 20px;
  }
  body{
    background-color:#8B8A8A;
    padding-top: 55px;
  }
  a{
    color:#000000;
    font-size: 15px;
    font-style:initial;
    font-family: sans-serif;
  }
  img{
    width:30%;
    height: 35%;
  }
  td.nomes{
    color:rgb(0, 0, 0);
    font-size: 150%;
    font-style:initial;
    font-family: sans-serif;
  }
  td.botão{
    padding-top: 20px;
  }
  p{
    color:white;
    font-size: 15px;
    font-style:initial;
    font-family: sans-serif;
  }
  .btncadas{
    font-family: arial;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: bold;
    border: none;
    padding:10px;
    cursor: pointer;
    background:rgb(3, 128, 212);
    color:white;
    box-shadow:3px 3px 2px rgb(2, 67, 110) ;
  }
  input.btncancelar{
    font-family: arial;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: bold;
    border: none;
    padding:10px;
    cursor: pointer;
    background:rgb(218, 2, 2);
    color:white;
    box-shadow:3px 3px 2px rgb(184, 2, 2) ;
  }
  </style>
<body>
  <?php if($this->session->flashdata('danger')) :?>
    <p><?= $this->session->flashdata('danger')?></p>
  <?php endif ?>
  <center>
    <form action="/usuario/recebePost?tipo=<?= $tipo ?>" method="POST">
    <table >
      <tr>
        <td colspan="2"><h1 class=titulos>Cadastro</h1></td>
      </tr>
      <tr>
        <td class="nomes">
          id do Usuario:
        </td>
        <td>
        <input type="text" name="id_usuario"  value="<?= $tipo ? '' : $usuario[0]->id_usuario ?>" autocomplete="off" readonly> <br>
        </td>
      </tr>      
      <tr>
        <td class="nomes">
          Usuario:
        </td>
        <td>
        <input type="text" name="username" value="<?= $tipo ? '' : $usuario[0]->username ?>" autocomplete="off"> <br>
        </td>
      </tr>
      <tr>
        <td class="nomes">
          CPF:
        </td>
        <td>
        <input type="number" name="cpf" value="<?= $tipo ? '' : $usuario[0]->cpf ?>" autocomplete="off"> <br>
        </td>
      </tr>
      <tr>
            <td class="nomes">
              Senha:
            </td>
            <td>
            <input type="password" name="senha" value="<?= $tipo ? '' : $usuario[0]->senha ?>" autocomplete="off"> <br>
            </td>
          </tr>      
      <tr>
        <tr>
            <td class="nomes">
                Email:
            </td>
            <td>
            <input type="text" name="email" value="<?= $tipo ? '' : $usuario[0]->email ?>" autocomplete="off"> <br>
            </td>
        </tr>
        <tr>
            <td class="nomes">
                Nivel Acesso:
            </td>
            <td>
               <input type="number" name="nivel_acesso" value="<?= $tipo ? '' : $usuario[0]->nivel_acesso ?>" autocomplete="off"> <br>
            </td>
        </tr>                               
        <td class="nomes">
          Num Documento:
        </td>
        <td>
        <input type="number" name="documento" value="<?= $tipo ? '' : $usuario[0]->documento ?>" autocomplete="off"> <br>
        </td>
      </tr>
      <tr>
        <td class="botão" colspan="2">
          <center>
          <button class="btncadas">Cadastrar</button>
          <input type="reset" value="Limpar" class="btncancelar">   
        </center>
        </td>
      </tr>
      <tr>      
      </tr>  
      </form>
      </tr></td>
    </table>
    <footer>
      <p>&copy; Carrara Bar</p>
      <a href='/login'>Já tem um Cadastro? Clique aqui para logar!</a>
      <p>Duvidas nos contate:<a href="mailto:leo_zinho_filho@hotmail.com">
      CarraraBar@gmail.com</a>.</p>
      </footer>
  </center>
  <!--<img src="logo.png" alt="Carrara Bar"> -->
</body>
</html>

<