	
	function amigo(id){
		
		let res= document.getElementById("res")
		let remove= document.getElementById("add")
		let formu= document.createElement("form")
		let add= document.createElement("input")
		let block=document.createElement("input")
		let denuncia= document.createElement("input")
		
		
		
			formu.setAttribute("method","post")
			formu.setAttribute("action","../function/amigos.php?id=" + id)
			add.setAttribute("type","submit")
			add.setAttribute("value","add")
			add.setAttribute("name","friend")
			block.setAttribute("type","submit")
			block.setAttribute("value","block")
			block.setAttribute("name","friend")
			denuncia.setAttribute("type","submit")
			denuncia.setAttribute("value","denuncia")
			denuncia.setAttribute("name","friend")
			
			
			formu.appendChild(add)
			formu.appendChild(block)
			formu.appendChild(denuncia)
			res.removeChild(remove)
			res.appendChild(formu)
		
		
		
		
		
		
	}


		let resa= document.getElementById("resa")
		let mais= document.createElement("button")
		let idf= Number(resa.innerText)
		
		resa.innerText=""
		//console.log(Number(resa.innerText))
		
		mais.setAttribute("onclick",`desfaca(${idf})`)
		mais.innerText= "mais^"
		resa.appendChild(mais)


		function desfaca(id){
			
			let remove= document.createElement("input")
			let formremove= document.createElement("form")
			let block=document.createElement("input")
			let denuncia= document.createElement("input")
			
			
			formremove.setAttribute("method","post")
			formremove.setAttribute("action","../function/amigos.php?id=" + id)
			remove.setAttribute("type","submit")
			remove.setAttribute("value","remove")
			remove.setAttribute("name","friend")
			block.setAttribute("type","submit")
			block.setAttribute("value","block")
			block.setAttribute("name","friend")
			denuncia.setAttribute("type","submit")
			denuncia.setAttribute("value","denuncia")
			denuncia.setAttribute("name","friend")
			
			formremove.appendChild(remove)
			formremove.appendChild(block)
			formremove.appendChild(denuncia)
			resa.removeChild(mais)
			resa.appendChild(formremove)
			
			
			
			
		}
		
		function qualida(idf){
			
			let amor= document.getElementById("amor")
			let fogo= document.getElementById("fogo")
			let legal= document.getElementById("legal")
			let amoa= document.createElement("select")
			let fogoa= document.createElement("select")
			let legala= document.createElement("select")
			let op=[]
			let opb=[]
			let opc=[]
			let pre= document.createElement("form")
			let envia= document.createElement("input")
			let ico= document.getElementById("fotoi")
			
			
				for (let i=1; i<=4;i++){
					
					op[i]= document.createElement("option")
					opb[i]= document.createElement("option")
					opc[i]= document.createElement("option")
					op[i].setAttribute("value",i)
					opb[i].setAttribute("value",i)
					opc[i].setAttribute("value",i)
				if (i==1){
					
					op[i].innerText= "legal 0%"
					opb[i].innerText= "sexy 0%"
					opc[i].innerText= "amavel 0%"
				
				}else if (i==2){
					op[i].innerText= "legal 25%"
					opb[i].innerText= "sexy 25%"
					opc[i].innerText= "amavel 25%"
				
				}else if (i==3){
					op[i].innerText= "legal 50%"
					opb[i].innerText= "sexy 50%"
					opc[i].innerText= "amavel 50%"
				
				}else if (i==4){
					op[i].innerText= "legal 100%"
					opb[i].innerText= "sexy 100%"	
					opc[i].innerText= "amavel 100%"
				
				}	
					legala.appendChild(op[i])
					fogoa.appendChild(opb[i])
					amoa.appendChild(opc[i])
						
						
						
						
						
						
					
					
				}
			
				
			
				pre.setAttribute("method","post")
				pre.setAttribute("action","../function/qualida.php?id=" + idf)
				envia.setAttribute("type","submit")
				envia.setAttribute("value","enviar!")
				amoa.setAttribute("name","amo")
				legala.setAttribute("name","legal")
				fogoa.setAttribute("name","fogo")
				pre.appendChild(amoa)
				pre.appendChild(legala)
				pre.appendChild(fogoa)
				pre.appendChild(envia)
				ico.removeChild(amor)
				ico.removeChild(fogo)
				ico.removeChild(legal)
				ico.appendChild(pre)
			//isso precisa se atualizado
			
			
			
		}
	