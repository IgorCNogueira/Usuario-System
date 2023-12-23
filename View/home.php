<?php $this->layout('master', ['title' => $title]) ?>

<div style="
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
   ">
   <section 
      style="@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap'); 
         font-family: 'Roboto Mono', monospace;
         font-size: 20px;
         color: white;
         text-align: center;
         margin-bottom: 50px;
      ">
      <h1>Olá</h1>
      <p>Escolha realizar seu Login ou Cadastrar-se</p>
   </section>

   <section style="
      margin: 0 auto;
      width: fit-content;
   ">
      <a href="/login"><button type="button" class="btn btn-outline-light">Login</button></a>
      <a href="/signin"><button type="button" class="btn btn-outline-light">Cadastro</button></a>
   </section>
</div>
