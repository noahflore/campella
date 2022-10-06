	
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