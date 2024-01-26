<?php $this->layout('master', ['title' => $title]) ?>

<?php if(isset($message)): ?>
<dialog open style="
      border-color: white;
      border-radius: 2pt;
      padding: 5px;
      width: fit-content;
   ">
   <?=$this->e($message)?>
   <button type="button" style="
      border-style: none;
      border-radius: 1px;
      background-color: white;
      position: relative;
      padding: 0;
      margin-left: 5px;
   " onclick="closeModal()">
   ✕
   </button>
</dialog>
<?php endif ?>

<div style="
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: fit-content;
      display: flex;
      justify-content: center;
   ">
   <section style="
         @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap'); 
         font-family: 'Roboto Mono', monospace;
         font-size: 20px;
         color: white;
         text-align: center;
         align-items: center;
         margin-bottom: 25px;
      ">
      <form spellcheck="false" action="/signin" method="post">
         <label for="name_signin">Nome</label><br>
         <input type="text" id="name_signin" name="name_signin" placeholder="Insira um nome" required
            style="
               border-radius: 5px;
            ">
         <?php if(isset($nameError) && $nameError):  ?>
               <p style="
                     position: absolute;
                     border-style: none;
                     margin: 0;
                     width: 300px;
                     text-align: center;
                     font-size: 13px;
                     right: -280px;
                     top: 15px;
                     left: 250px;
                  ">
                  o Nome deve iniciar com uma letra e possuir pelo menos 3, não pode conter números, pode conter espaços e pontos.
               </p>
         <?php endif ?>
         <br>
         <?php if(isset($nameError) && $nameError): ?>
            <p style="
               border-style: none;
               margin: 0;
               width: fit-content;
               text-align: center;
               font-size: 15px;
               color: red;
            ">
            ✘
            Nome inválido.
            </p>
         <?php endif ?>
         <br>
         <label for="email_signin">Email</label><br>
         <section style="
               display: flex;
               width: fit-content;
               height: fit-content;
               flex-direction: column;
               flex-wrap: wrap;
            ">
            <input type="text" id="email_signin" class="input" name="email_signin" placeholder="Insira um email" required
               style="
                  border-radius: 5px;
               ">
            <?php if(isset($emailError) && $emailError): ?>
               <p style="
                     position: absolute;
                     border-style: none;
                     margin: 0;
                     width: 200px;
                     text-align: center;
                     font-size: 15px;
                     left: 250px;
                     top: 133px;
                  ">
                  Email inválido
               </p>
            <?php endif ?>
            
            <?php if(isset($emailError) && $emailError): ?>
               <p style="
                  border-style: none;
                  margin: 0;
                  width: fit-content;
                  text-align: center;
                  font-size: 15px;
                  color: red;
               ">
               ✘
               Email inválido.
               </p>
            <?php endif ?>
         </section>
         
         <br>
         <label for="password_signin">Senha</label><br>
         <input type="password" id="password_signin" name="password_signin" placeholder="Insira uma senha" required
            style="
               border-radius: 5px;
            ">
         <?php if(isset($passwordError) && $passwordError): ?>
            <p style="
                  position: absolute;
                  border-style: none;
                  margin: 0;
                  width: 300px;
                  text-align: center;
                  font-size: 13px;
                  left: 250px;
                  top: 205px;
               ">
               Senha inválida. A senha deve possuir no mínimo 8 caracteres
               letras Maiúsculas e Minúsculas, caracteres especiais
               "-" e/ou "_", também numeros.
            </p>
         <?php endif ?>
         <br>
         <?php if(isset($passwordError) && $passwordError): ?>
            <p style="
               border-style: none;
               margin: 0;
               width: fit-content;
               text-align: center;
               font-size: 15px;
               color: red;
            ">
            ✘
            Senha inválida.
            </p>
         <?php endif ?>
         <br>
         <label for="password_confirm_signin">Confirmar Senha</label><br>
         <input type="password" id="password_confirm_signin" name="password_confirm_signin" placeholder="Confirme a senha" required
            style="
               border-radius: 5px;
            ">
         <br>
         <?php if(isset($passwordError) && $passwordError): ?>
            <p style="
               border-style: none;
               margin: 0;
               width: fit-content;
               text-align: center;
               font-size: 15px;
               color: red;
            ">
            ✘
            Senhas não coincidem.
         </p>
         <?php endif ?>
         <br>
         <input type="submit" class="btn btn-outline-light" value="Cadastrar">
         <br>
         <br>
         <a href="/"><button type="button" class="btn btn-outline-light">Voltar</button></a>
      </form>
   </section>
</div>

<script>
   const modal = document.querySelector("dialog");
   function closeModal() {
      modal.close();
   }
</script>