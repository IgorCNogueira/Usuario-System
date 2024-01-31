<?php $this->layout('master', ['title' => $title]) ?>

<div id="mainDiv">
   <section id="titleSection">
      <h1>Olá</h1>
      <p>Escolha realizar seu Login ou Cadastrar-se</p>
   </section>

   <section id="btnSection">
      <a href="/login"><button type="button" class="btn btn-outline-light">Login</button></a>
      <a href="/signin"><button type="button" class="btn btn-outline-light">Cadastro</button></a>
   </section>
</div>


<style>
   #mainDiv {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
   }
   #titleSection {
      font-family: 'Roboto Mono', monospace;
      font-size: 20px;
      color: white;
      text-align: center;
      margin-bottom: 50px;
   }
   #btnSection {
      margin: 0 auto;
      width: fit-content;
   }
</style>