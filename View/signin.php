<?php $this->layout('master', ['title' => $title]) ?>


<div style="
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
   ">
   <section style="@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap'); 
         font-family: 'Roboto Mono', monospace;
         font-size: 20px;
         color: white;
         text-align: center;
         margin-bottom: 50px;
      ">
      <form spellcheck="false" action="/signin" method="post">
         <label for="name_signin">Nome</label><br>
         <input type="text" name="name_signin" placeholder="Insira um nome" required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <label for="email_signin">Email</label><br>
         <input type="text" name="email_signin" placeholder="Insira um email" required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <label for="password_signin">Senha</label><br>
         <input type="password" name="password_signin" placeholder="Insira uma senha" required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <label for="password_confirm_signin">Confirmar Senha</label><br>
         <input type="password" name="password_confirm_signin" placeholder="Confirme a senha" required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <input type="submit" class="btn btn-outline-light" value="Cadastrar">
      </form>
      <br>
      <br>
      <a href="/"><button type="button" class="btn btn-outline-light">Voltar</button></a>
   </section>
</div>
