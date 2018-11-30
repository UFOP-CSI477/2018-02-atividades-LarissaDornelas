<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="container" style="padding: 127px;
">
<h2>Insira seus dados</h2>
<form action="/register-user" method="POST">
    <div class="form-group col-md-6">
    <label for="inputAddress">Nome</label>
    <input type="text" class="form-control" id="nome" name="name" placeholder="Nome">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Senha">
    </div>
    <input type="hidden" name="type" value=0>
      <button type="submit" class="btn btn-primary" style="margin: 18px;">Cadastrar</button>
  </div>
  
</form>
</div>
