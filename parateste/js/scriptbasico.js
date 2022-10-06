
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
		
		let cabeca= document.getElementsByClassName("cabeça")[0]
			
			cabeca.style.backgroundColor= localStorage.cabeça
			document.body.style.backgroundColor= localStorage.fundo
		
		
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
			op[0].setAttribute('onclick','preto()')
			op[0].innerText= "modo dark"
			op[1].setAttribute("value","config")
			op[1].setAttribute("onclick","perfil()")
			op[1].innerHTML= "configuração"
			
			if (localStorage.fundo){
				
				op[0].removeAttribute("onclick","preto()")
				op[0].setAttribute("onclick","original()")
				op[0].innerHTML= "modo light"
				
			}
			
			li.removeChild(butao)
			lista.appendChild(opcao)
			li.appendChild(lista)
			
			let voltar= document.getElementById('voltar')
			
			
		
		if (num==1){
			
			localStorage.num= 1
			
			
		}else if (num==2){
			
			localStorage.num= 2
			
		}
		
		
	}
	
	function usuario(n){
		
		localStorage.num= n
		
		
	}
	
	function preto(){
		
			localStorage.bloco= "#9E1B11"
			localStorage.caixa ="#BF9E4B"
			localStorage.fundo= "#000033"
			localStorage.cabeça= "#2F4BA1"
			location= location
		
		
	}
	
	function original(){
		
		localStorage.bloco= "#DD2519"
		localStorage.caixa ="#FFD463"
		localStorage.fundo =""
		localStorage.cabeça= "#4169E1"
		location= location
		
		
	}
	
	
	function perfil(){
		
		location.href= "configdefault.php"
		
	}