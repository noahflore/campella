	
	function responde(i,id){
		
		let res= document.getElementById("res"+ i)
		let responde=document.getElementById("responde"+ i)
		let novo= document.createElement("Textarea")
		let formu=document.createElement("form")
		let butao=document.createElement("input")
		
		
			butao.setAttribute("type","submit")
			butao.setAttribute("value","enviar!")
			formu.setAttribute("method","post")
			formu.setAttribute("class","resjs")
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
		let fundopopup= document.createElement("div")
		
		
			fundopopup.setAttribute("style","background-color:black;position:fixed;top:0%;left:0%")
			fundopopup.setAttribute("onclick","fechapopup()")
			fundopopup.setAttribute("id","fechapopup")
			popup.setAttribute("id","fechar")
			popup.setAttribute("style","position: fixed; top: 50%; right: 50%; background-color: white;")
			
			
			
				
				popup.innerHTML= "<b>faça uma doação</b><br> aceitamos qualquer valor desde 1 R$ até 1 mil<br> sua ajuda vai se bem-vindo<br><br><b>pix</b>  7aae2781-3466-44e6-bbc7-5b93ef69eb20<br><b>transferencia bancaria</b>  323 Mercado Pago<br>agencia 0001<br><b>conta</b>1902097335-0<br><b>nome do  proprietario</b>giovanne<br>escolha quais forma de pagamento acima !<br>escreva um comemtario ao enviar<br> após isso preencha esse campo<br>"
				
				
				fundopopup.appendChild(popup)
				res.removeChild(filho)
				res.appendChild(fundopopup)
				
				
		
		
	}

	function fechapopup(){
		
		let pop= document.getElementById("fechapopup")
		let res= document.getElementById("filho")
		
		res.removeChild(pop)
		
		
		
	}