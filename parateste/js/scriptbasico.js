
	if (localStorage.fundo){
		
		if (localStorage.num==1){
		
			let caixa= document.getElementsByClassName("caixa")[0]
			caixa.style.backgroundColor= localStorage.caixa
			
			
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
			op[0].setAttribute('value','modo dark')
			if (num==3){op[0].setAttribute('onclick','preto(1)');num=1}else{op[0].setAttribute('onclick','preto()')}
			op[0].innerText= "modo dark"
			op[1].setAttribute("value","config")
			op[1].setAttribute("onclick","perfil()")
			op[1].innerHTML= "configuração"
			op[2].setAttribute("onclick","janela()")
			op[2].innerText= "privacidade"
			op[3].innerText= "backup"
			
			if (localStorage.fundo){
				
				op[0].removeAttribute("onclick","preto()")
				op[0].setAttribute("onclick","original()")
				op[0].innerHTML= "modo light"
				
			}
			
			li.removeChild(butao)
			lista.appendChild(opcao)
			li.appendChild(lista)
			
			let voltar= document.getElementById('voltar')
			
			
		
				
				localStorage.num= num
				
			
			
			
			
			
		
		
	}
	
	function janela(){
		
		let janela= document.createElement("div")
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
		
		
			janela.setAttribute("style","background-color: white; position: fixed; top: 43%; right:50%;")
			janela.innerHTML= "<h2> o que você quer privar?</h2><br>"
			janela.innerHTML+= `meus recados: <button onclick='priva(1)'>${pa1}</button><br>`
			janela.innerHTML+= `visitantes: <button onclick='priva(2)'>${pa2}</button><br>`
			document.body.appendChild(janela)
		
		
	}
	
	function priva(p){
		
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
		location.href= "function/priva.php?p=" + p
		
		
		
		
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
			location= location
		
		
	}
	
	function original(){
		
		localStorage.clase= 0
		localStorage.bloco= "#DD2519"
		localStorage.caixa ="#FFD463"
		localStorage.fundo =""
		localStorage.cabeça= "#4169E1"
		location= location
		
		
	}
	
	
	function perfil(){
		
		location.href= "configdefault.php"
		
	}

	