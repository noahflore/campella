
	if (localStorage.fundo){
		
		if (localStorage.num==1){
		
			let caixa= document.getElementsByClassName("caixa")[0]
			let caixab= document.getElementsByClassName("caixa")[1]
			caixa.style.backgroundColor= localStorage.caixa
		if (caixab){caixab.style.backgroundColor= localStorage.caixa}
			
			
		}else if (localStorage.num==2){
			
			for (let i=0; i<=50; i++){
				
				if (document.getElementsByClassName("bloco")[i]){
				
				let bloco= document.getElementsByClassName("bloco")[i]
				let cmmestilo= document.getElementsByClassName("cmmestilo")[i]
				
					bloco.style.backgroundColor= localStorage.bloco
					cmmestilo.style.backgroundColor= localStorage.cmmestilo
					
					}
					
			}
			
		}
	//	alert(localstorage.num)
		
		let cabeca= document.getElementsByClassName("cabeça")[0]
			
			cabeca.style.backgroundColor= localStorage.cabeça
			document.body.style.backgroundColor= localStorage.fundo
		
		
		}

			let clicar= document.getElementById('click')
			
			var pp= localStorage.clase
			
			if (pp== "p"){clicar.setAttribute('class','pp')}
			
			if (clicar.hasAttribute('class')){
			
				clicar.setAttribute('onclick','preto()')
				clicar.removeAttribute('href')
				clicar.setAttribute('href','../userdefault.php?mode=1')
				
			}else{
				
				let ben= document.getElementById('ben')
					ben.removeAttribute('oncick')
				
				
				
			}
	
	function config(num){
		
		let li= document.getElementById('lista')
		let butao= document.getElementById("config")
		let lista= document.createElement('span')
		let opcao= document.createElement('div')
		var op=[]
		
			for (let i=0; i<=4; i++){
				
				 op[i]=document.createElement('Button')
				 op[i].setAttribute('id',i)
				 opcao.appendChild(op[i])
				
			}
		
			
			lista.setAttribute('id','voltar')
			opcao.setAttribute("style","position: fixed; display: flex; flex-direction: column;")
			opcao.setAttribute("id","configmobi")
			op[0].setAttribute('value','modo dark')
		    if (num==4){op[2].setAttribute("onclick","janela(1)")}else {op[2].setAttribute("onclick","janela()")}
			if(num==4){op[4].setAttribute("onclick","conta(1)")}else if(num==6){op[4].setAttribute("onclick","conta(1)")}else{op[4].setAttribute("onclick","conta()")}var pare=0
		    if(num==4){op[1].setAttribute("onclick","perfil(1)"); pare=1}
			if ((num==3) ||(num==4)){op[0].setAttribute('onclick','preto(1)');num=1}else{op[0].setAttribute('onclick','preto()')}
			op[0].innerHTML= "<span class='cabemobi'>modo dark</span>"
			op[1].setAttribute("value","config")
		
		 if (num==5){op[1].setAttribute("onclick","perfil(2)")}else if ((num==1) && (pare==0)){	op[1].setAttribute("onclick","perfil(0,1)")}
		  if (num==2){op[1].setAttribute("onclick","perfil(0,1)")}
		 if (num==6){op[1].setAttribute("onclick","perfil(1)")}
			op[1].innerHTML= "<span class='cabemobi'>configuração</span>"
			op[2].innerHTML= "<span class='cabemobi'>privacidade</span>"
			op[3].innerHTML= "<span class='cabemobi'>backup</span>"
		  	op[4].innerHTML= "<span class='cabemobi'>conta</span>"
			
			if (localStorage.fundo){
				
				op[0].removeAttribute("onclick","preto()")
				op[0].setAttribute("onclick","original(1)")
				op[0].innerHTML= "<span class='cabemobi'>modo light</span>"
				
			}
			
			li.removeChild(butao)
			lista.appendChild(opcao)
			li.appendChild(lista)
			
			let voltar= document.getElementById('voltar')
			
			
		
				
				localStorage.num= num
				
			
			
			
			
			
		
		
	}

	
	function janela(n=0){
		
		let janela= document.createElement("div")
		let janelafundo= document.createElement("div")
		let palavra= localStorage.pa
		let palavrb= localStorage.pb
		
			if (palavra==1){
				
				var pa1="on"
				
			}else if (palavra ==0){
				
				var pa1="off"
				
			}else{ var pa1="off"}
			
			if (palavrb==1){
				
				var pa2="on"
				
			}else if (palavrb == 0){
				
				var pa2="off"
				
			}else{ var pa2="off"}
		
		
			janelafundo.setAttribute("style","background-color:#000000cc;position:fixed;top:0%;left:0%;height:100%;width:100%");
			janelafundo.setAttribute("onclick","fechajanela()")
			janelafundo.setAttribute("id","fechajanela")
			janelafundo.appendChild(janela)
			janela.setAttribute("style","background-color: white; margin-left:400px;margin-top:200px;width:300px;")
			janela.innerHTML= "<h2> o que você quer privar?</h2><br>"
		if (n==0){janela.innerHTML+= `meus recados: <button onclick='priva(1)'>${pa1}</button><br>`}else if (n==1){janela.innerHTML+= `meus recados: <button onclick='priva(1,1)'>${pa1}</button><br>`}else if(n==2){janela.innerHTML+= `meus recados: <button onclick='priva(1,2)'>${pa1}</button><br>`}
		if (n==0){janela.innerHTML+= `visitantes: <button onclick='priva(2)'>${pa2}</button><br>`}else if (n==1){janela.innerHTML+= `visitantes: <button onclick='priva(2,1)'>${pa2}</button><br>`}else if (n==2){janela.innerHTML+= `visitantes: <button onclick='priva(2,2)'>${pa2}</button><br>`}
			document.body.appendChild(janelafundo)
		
		
	}

	function fechajanela(){
		
		let janela= document.getElementById("fechajanela")
		
		document.body.removeChild(janela)
		
		
	}
	
	function priva(p,n=0){
		
		if ((localStorage.pa==1) && (p==1)){
			
			
			localStorage.pa = 0
			
			
			
		}else if (p==1){
		
		
		localStorage.pa = 1
		
		
		
	}
		
		if ((localStorage.pb==1) && (p==2)) {
			
			
			localStorage.pb = 0
			
			
		}else if (p==2){
			
			localStorage.pb = 1
			
			
		}
		
		if (n==0){
			
			location.href= "function/priva.php?p=" + p
		
		}else if (n==1){
			
			location.href= "../function/priva.php?p=" + p
			
			
		}else if (n==2){
			
			location.href= "../../function/priva.php?p=" + p
			
			
		}
			
			
		
		
		
	}
	
	function usuario(n){
		
		localStorage.num= n
		
		
	}
	
	function preto(i=0){
		
			
			localStorage.clase= "p"
			localStorage.bloco= "#9E1B11"
			if (i==0){localStorage.caixa ="#BF9E4B"}else{localStorage.caixa ="#995949"}
			localStorage.fundo= "#000033"
			localStorage.cabeça= "#2F4BA1"
		
		if (i==1){
			location= location
			
		}else{
			location= location + "?mode=1"
			
		}
		
		
	}
	
	function original(i=0){
		
		localStorage.clase= 0
		localStorage.bloco= "#DD2519"
		localStorage.caixa ="#FFD463"
		localStorage.fundo =""
		localStorage.cabeça= "#4169E1"
		localStorage.carrega= 1
		location= location 
		
		
	}

	function carrega(){
		
		if (localStorage.carrega==1){
			location.href= "userdefault.php" 
			localStorage.carrega=0
			
		}
		
		
		
	}
	
	
	function perfil(i=0,n=0){
		
		if (i==1){
			
			location.href= "../configdefault.php"
				
		}else if (i==2){
			
			
			location.href= "../../configdefault.php"
			
			
		}else{
			
			usuario(n)
			location.href= "configdefault.php"
		
		}
	}

	function conta(n=0){
		
		if (n==0){
		
			location.href= "conta.php"
		
	}else if(n==1){
		
		location.href= "../conta.php"
		
	}else if(n==2){
		
		location.href= "../../conta.php"
		
	}
		
	}

	function sair(i=0){
		
		if (i==1){
			
			location.href=location + "?login=off"
			
			
		}else{
		
			location.href=location + "&login=off"
			
		}
		
		
	}