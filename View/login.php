<?php $this->layout('master', ['title' => $title]) ?>

<form action="/login" method="get">
   <label for="email">Email</label><br>
   <input type="email" name="email_login" id="email_input" placeholder="Insira seu email">
   <br>
   <br>
   <label for="password">Senha</label><br>
   <input type="password" name="password_login" id="password_input" placeholder="Insira sua senha">
   <br>
   <br>
   <input type="submit" value="Logar">
</form>
<br>
<br>
<a href="/"><button>Voltar</button></a>
