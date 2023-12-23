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
      <form spellcheck="false" action="/signin" method="store">
         <label for="name">Nome</label><br>
         <input type="text" name="name_signin" id="name_input" placeholder="Insira um nome" required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <label for="email">Email</label><br>
         <input type="text" name="email_signin" id="email_input" placeholder="Insira um email" required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <label for="password">Senha</label><br>
         <input type="text" name="password_signin" id="password_input" placeholder="Insira uma senha" required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <label for="password_confirmation">Confirmar Senha</label><br>
         <input type="text" name="password_confirm_signin" id="password_confirm_input" placeholder="Confirme a senha" required
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
