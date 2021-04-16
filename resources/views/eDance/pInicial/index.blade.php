<!DOCTYPE html>
<html>
<head>
 <title></title>

 <style>
  
 * {
  margin: 0;
  padding: 0;
 }

 .menu {
  width: 100%;
  height: 50px;
  background: rgb(241, 166, 166);
  font-family: 'Arial';
 }

 .menu ul {
  list-style: none;
  position: relative;
 }

 .menu ul li {
  width: 150px;
  //background: tomato;
  float: left;
 }

 .menu a {
  background-color: rgb(241, 166, 166);
  padding: 15px;
  display: block;
  text-decoration: none;
  text-align: center;
  color: #fff;
 }

 .menu a:hover {
  background-color: rgb(241, 149, 149);
  color: #fff;
 }

 .menu ul ul {
  position: absolute;
  visibility: hidden;
 }

 .menu ul li:hover ul {
  visibility: visible;
 }

 .menu ul ul li {
  float: none;
  border-bottom: solid 1px #ccc;
 }

 .menu ul ul li a {
  background-color: rgb(216, 214, 214); 
 }

 label[for="bt_menu"] {
  padding: 5px;
  background-color: rgb(181, 201, 231);
  color: #fff;
  font-family: 'Arial';
  text-align: center;
  font-size: 30px;
  cursor: pointer;
  width: 50px;
  height: 50px;
  display: none;
 }

 #bt_menu {
  display: none;
 }

 @media (max-width: 800px) {
  label[for="bt_menu"] {
   display: block;
  }

  #bt_menu:checked ~ .menu {
   margin-left: 0;
  }

  .menu {
   margin-top: 5px;
   margin-left: -100%;
   transition: all .4s;
  }

  .menu ul li {
   width: 100%;
   float: none;
  }
  .menu ul ul {
   position: static;
   overflow: hidden;
   max-height: 0;
   transition: all .8s;
  }
  .menu ul li:hover ul {
   height: auto;
   max-height: 200px;
  }
 }

 </style>

</head>
<body>

 <input type="checkbox" id="bt_menu">
 <label for="bt_menu">&#9776;</label>

 <nav class="menu">
  <ul>
   <li><a href="#">Home</a></li>

   <li>
    <a href="#">Cadastro</a> 
    <ul>
     <li><a href="{{route('CadastroAluno')}}">Cadastrar novo aluno</a></li>
     
     <!--Funcionalidade de busca referenciada nessa rota  -->
     <li><a href="{{route('ProcuraCadastro')}}">Procurar aluno</a></li>
    </ul>
   </li>

    <li>
        <a href="#">Matricula</a>
        <ul>
            <li><a href="{{route('MatriculaAluno')}}">Nova matricula</a></li>
            <li><a href="{{route('ProcuraMatricula')}}">Pesquisar matricula</a></li>
        </ul>
    </li>

    <li>
        <a href="#">Turma</a>
        <ul>
            <li><a href="{{route('GerenciarTurma')}}">Gerenciar turmas</a></li>
            <li><a href="{{route('GerenciarEstudio')}}">Gerenciar estudios</a></li>
        </ul>
    </li>

    <li>
        <a href="#">Funcionario</a>
        <ul>
            <li><a href="{{route('InsereFuncionario')}}">Inserir funcionario</a></li>
            <li><a href="{{route('ProcuraFuncionario')}}">Procurar funcionario</a></li>
        </ul>
    </li>

  </ul>
 </nav>

</body>
</html>