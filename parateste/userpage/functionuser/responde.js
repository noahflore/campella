	
	function responde(i,id){
		
		let res= document.getElementById("res"+ i)
		let responde=document.getElementById("responde"+ i)
		let novo= document.createElement("Textarea")
		let formu=document.createElement("form")
		let butao=document.createElement("input")
		
		
			butao.setAttribute("type","submit")
			butao.setAttribute("value","enviar!")
			formu.setAttribute("method","post")
			formu.setAttribute("action","../function/recado.php?id="+ id)
			
			
		
			novo.setAttribute("cols","30")
			novo.setAttribute("rows","5")
			novo.setAttribute("name","texto")
			
			
			
			formu.appendChild(novo)
			formu.appendChild(butao)
		
			res.removeChild(responde)
			res.appendChild(formu)
			
			novo.focus()
		
		
		
		
		
	}
	
	
	function popup(){
		
		let res= document.getElementById("res")
		let filho= document.getElementById("filho")
		let popup=document.createElement("div")
		
		
			popup.setAttribute("id","fechar")
			popup.setAttribute("style","position: fixed; top: 50%; right: 50%; background-color: white; transform: translateY(-100px);")
			
			
				
				popup.innerHTML= "<b>faça uma doação</b><br> aceitamos qualquer valor desde 1 R$ até 1 mil<br> sua ajuda vai se bem-vindo<br><br>........<br><br>escolha quais forma de pagamento acima !<br>escreva um comemtario ao enviar<br> após isso preencha esse campo<br>"
				
				
				res.removeChild(filho)
				res.appendChild(popup)
				
				
		
		
	}