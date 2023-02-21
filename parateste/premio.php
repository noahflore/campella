<?php session_start();
	  require_once "function/objeto/Usuario.php";
	  require_once "function/conexao.php";

	
	$nome=$_SESSION['nome'];
	$sobrenome=$_SESSION['sobrenome'];
	$id=$_SESSION['id'];

$user= new Usuario($nome,$sobrenome,$id,$cone);

	if ((!empty($_GET['buy'])) and (!empty($_POST['pin']))){
		$pin=$_POST['pin'];
		
		$user->comprar(30000,$pin);
		
		
	}


?>
<!doctype html>

<html>

	 <head>
	 
	 <title>premio || kampella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/premio.css" />
	 <link rel="icon" href="ico/logoico.png" />
	 
	 </head>
	 
	 <body>
		<header class="cabeça">
		
			<img src="ico/logobanner.png" alt="logo do site" />
			<nav> 
				<ul>
					<?php echo "<li onclick='usuario(1)'><a href='userdefault.php'>". $_SESSION['nome'] ."</a></li>"; ?>
					<!-- o de cima é nome do usuario-->
					<li><a href="principaldefault.php">principal</a></li>
					<li>configuração</li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		
		<h1> escolha sua conta premio</h1>
		
		<ul class="apresenta">
			<div><li><h2>silver</h2></li>
				adquirir sua <strong>conta silver</strong><br>
			com ele você pode coloca gif<br>
			no seu perfil, uma foto no<br>
			fundo e mudar a cor da comunidade<br>
			<p>compra custa <span>10 reais</span><br>
				você vai recebe <strong>1 mês+conta silver</strong><br>
			<span id="buypix"><button id="pixa" onclick="deletabutao()">compra!</button></span></p>
			
			</div>
			<div><li><h2>gold</h2></li>
			adquirir sua conta gold
			com ele você pode coloca gif<br>
			no seu perfil, uma foto no<br>
			fundo e na comunidade<br>
			, aumenta o tamanho da foto<br>
			usar emojins personalizado<br>
			<p>compra custa <s>valor camp</s> receba 1 bigode+conta gold</p>
			<!-- ainda em desenvovimento-->
			
			
			</div>
			<li><h2>diamond</h2>
			adquirir sua conta diamond
			com ele você pode coloca gif<br>
			no seu perfil, uma foto no<br>
			fundo e na comunidade<br>
			, aumenta o tamanho da foto<br>
			usar emojins personalizado<br>
			20% de camp mais novos recursos<br>
			<p>compra custa <s>valor camp</s> receba 1 bigode+conta silver</p></li>
			
			
			</div>
		
		</ul>
	
	 		
			<script>
	
				
				
				
			function deletabutao(){
					
				let buypixa= document.getElementById("buypix")
				let pixa= document.getElementById("pixa")
				let popup= document.createElement("div")
				let janela= document.createElement("div")
					
					janela.setAttribute("style","background-color:white;margin-top:200px;margin-left:500px")
					popup.setAttribute("style","position:fixed;height:100%;width:100%;top:0%;left:0%;background-color:#272222ad")
					popup.setAttribute("onclick","fechapop()")
					popup.setAttribute("id","pop")
					janela.setAttribute("onmouseenter","esconde()")
					janela.innerHTML="faça o pagamento via pix<br><strong style='color:red'>7aae2781-3466-44e6-bbc7-5b93ef69eb20</strong><hr>essa é uma chave aleatoria se tiver problemas em enviar consulta o dono<hr><form method='post' action='premio.php?buy=1'><input type='submit' value='comprar!' /><input type='tet' name='pin' placeholder='coloque sua chave pin' /></form><br><br>click nesse botão se quer pagar com kant"
					popup.appendChild(janela)
					buypixa.removeChild(pixa)
					buypixa.appendChild(popup)

					
					
				}
				
				function esconde(){
					
					let janela= document.getElementById("pop")
					
					janela.removeAttribute("onclick")
					
					
					
				}
				
				function fechapop(){
					
					let buypixa= document.getElementById("buypix")
					let pop= document.getElementById("pop")
					let pixa= document.createElement("button")
					
						
						pixa.setAttribute("id","pixa")
						pixa.setAttribute("onclick","deletabutao()")
						pixa.innerText="compra!"
						buypixa.removeChild(pop)
						buypixa.appendChild(pixa)
					
					
					
					
					
				}
	
	
	
	
			</script>
	 </body>





</html>