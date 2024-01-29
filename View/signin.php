<?php $this->layout('master', ['title' => $title]) ?>

<?php if(isset($message)): ?>
   <dialog open id="dialogBox">
      <?=$this->e($message)?>
      <button type="button" id="dialogBoxBtn" onclick="closeModal()">
      ✕
      </button>
   </dialog>
<?php endif ?>

<div id="mainDiv">
   <section id="formSection">
      <form spellcheck="false" action="/signin" method="post">

         <label>Nome</label>
         <br>
         <input type="text" class="signin_inputs" name="name_signin" <?php if(isset($nameError) && $nameError): ?>value="<?=$this->e($nameData);?>" <?php endif ?> placeholder="Insira um nome" required>
            
         <?php if(isset($nameError) && $nameError): ?>
            <p class="underInputMessage">
            ✘
            Nome inválido.
            </p>
         <?php endif ?>
         
         <br>
         
         <?php if(isset($nameError) && $nameError):?>
            <p id="nameWarning">
            O nome deve iniciar com uma letra e possuir pelo menos 3, não pode conter números, pode conter espaços e pontos.
            </p>
         <?php endif ?>

         <br>

         <label>Email</label>
         <br>
         <input type="text" class="signin_inputs" name="email_signin"<?php if(isset($emailError) && $emailError): ?>value="<?=$this->e($emailData); ?>" <?php endif ?>placeholder="Insira um email" required>
         
         <?php if(isset($emailError) && $emailError): ?>
            <p class="underInputMessage">
            ✘
            Email inválido.
            </p>
         <?php endif ?>

         <br>
         <br>

         <label>Senha</label>
         <br>
         <input type="password" class="signin_inputs" name="password_signin" placeholder="Insira uma senha" required>

         <?php if(isset($passwordError) && $passwordError): ?>
            <p id="passwordWarning">
               Senha inválida. A senha deve possuir no mínimo 8 caracteres
               letras Maiúsculas e Minúsculas, caracteres especiais
               "-" e/ou "_", também numeros.
            </p>
         <?php endif ?>

         <br>

         <?php if(isset($passwordError) && $passwordError): ?>
            <p class="underInputMessage">
            ✘
            Senha inválida.
            </p>
         <?php endif ?>

         <br>

         <label>Confirmar Senha</label>
         <br>
         <input type="password" class="signin_inputs" name="password_confirm_signin" placeholder="Confirme a senha" required>
         
         <br>

         <?php if(isset($passwordError) && $passwordError): ?>
            <p class="underInputMessage">
            ✘
            A senha não coincide.
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

<style>
   #dialogBox {
      border-color: white;
      border-radius: 2pt;
      padding: 5px;
      width: fit-content;
   }
   #dialogBoxBtn {
      border-style: none;
      border-radius: 1px;
      background-color: white;
      position: relative;
      padding: 0;
      margin-left: 5px;
   }
   #mainDiv {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: fit-content;
      display: flex;
      justify-content: center;
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
      align-items: center;
      margin-bottom: 25px;
   }
   #nameWarning {
      position: absolute;
      border-style: none;
      margin: 0;
      width: 300px;
      text-align: center;
      font-size: 13px;
      right: -280px;
      top: 15px;
      left: 250px;
   }
   #passwordWarning {
      position: absolute;
      border-style: none;
      margin: 0;
      width: 300px;
      text-align: center;
      font-size: 13px;
      left: 250px;
      top: 205px;
   }

   .signin_inputs {
      border-radius: 5px;
   }
   .underInputMessage {
      border-style: none;
      margin: 0;
      width: fit-content;
      text-align: center;
      font-size: 15px;
      color: red;
   }
</style>