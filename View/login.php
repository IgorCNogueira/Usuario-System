<?php $this->layout('master', ['title' => $title]) ?>

<div id="mainDiv">
   <section id="formSection">
      <form spellcheck="false" action="/login" method="post">

         <label>Email</label>
         <br>
         <input type="email" class="signin_inputs" name="email_login" placeholder="Insira seu email" required>

         <br>
         <br>

         <label>Senha</label>
         <br>
         <input type="password" class="signin_inputs" name="password_login" placeholder="Insira sua senha"  required>
         
         <br>
         <br>
         
         <input type="submit" class="btn btn-outline-light" value="Logar">
      </form>

      <br>

      <a href="/"><button type="button" class="btn btn-outline-light">Voltar</button></a>
   </section>
</div>

<style>
   #mainDiv {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-style: solid;
      border-radius: 10px;
      padding: 10px;
      border-color: white;
   }
   #formSection { 
      font-family: 'Roboto Mono', monospace;
      font-size: 20px;
      color: white;
      text-align: center;
   }

   .signin_inputs {
      border-radius: 5px;
   }
</style>