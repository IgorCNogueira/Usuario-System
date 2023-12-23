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
      <form spellcheck="false" action="/login" method="get">
         <label for="email">Email</label><br>
         <input type="email" name="email_login" id="email_input" placeholder="Insira seu email" required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <label for="password">Senha</label><br>
         <input type="password" name="password_login" id="password_input" placeholder="Insira sua senha"  required
            style="
               border-radius: 5px;
            ">
         <br>
         <br>
         <input type="submit" class="btn btn-outline-light" value="Logar">
      </form>
      <br>
      <br>
      <a href="/"><button type="button" class="btn btn-outline-light">Voltar</button></a>
   </section>
</div>
