<?php $this->layout('master', ['title' => $title, 'style' => $style]) ?>

<form action="/signin" method="post">
   <label for="name">Nome</label><br>
   <input type="text" name="name_signin" id="name_input" placeholder="Insira seu nome">
   <br>
   <br>
   <label for="email">Email</label><br>
   <input type="text" name="email_signin" id="email_input" placeholder="Insira seu email">
   <br>
   <br>
   <label for="password">Senha</label><br>
   <input type="text" name="password_signin" id="password_input" placeholder="Insira uma senha">
   <br>
   <br>
   <label for="password_confirmation">Confirmar Senha</label><br>
   <input type="text" name="password_confirm_signin" id="password_confirm_input" placeholder="Confirme a senha">
   <br>
   <br>
   <input type="submit" value="Cadastrar">
</form>
<br>
<br>
<a href="/"><button>Voltar</button></a>
