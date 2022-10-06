<!docktype html>

<html>

	 <head>
	 
	 <title>comunidades || campella</title>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="defaultstyle/baseestilo.css" />
	 <link rel="stylesheet" href="defaultstyle/cmm.css" />
	 </head>
	 
	 <body>
		<header	class="cabeça">
		
			<img src="ico/logocampella.png" alt="logo do site" />
			<nav> 
				<ul>
					<li><a href="user.php">user</a></li>
					<!-- o de cima é nome do usuario-->
					<li><a href="principal.php">principal</a></li>
					<li>configuração</li>
					<li><s>camp</s></li>
					<li>feed back</li>
					<li><a href="sair">sair</a></li>
				
				
				</ul>

			</nav>
		
		
		</header>
		<section>	
			<main class="cmm">
				<h1>criar sua comunidade</h1>
					<form>
						<label for="cmm">nome da comunidade</label>
						<input type="text" name="nomecmm" id="cmm" />
						<label for="des">decrisção da comunidade</label>
						<input class="texto" type="text"  id="des" />
						<label for="fotocmm">foto da comunidade</label>
						<input type="file" accept="image/png" id="fotocmm" />
						<!-- camp
						<label for="corfundo">cor de fundo</label>
						<input type="color" id="corfundo" />
						-->
				
					</form>
			
			</main>
			
			<aside>
				qualquer coisa
			
			</aside>
		</section>
	 
	 </body>





</html>