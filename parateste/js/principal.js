
		
	function responde(id,di){
		
		
		
		
		if (di=="d"){
			var momento= document.getElementById(id)
			var texto= document.getElementById('di'+id)}
		else if(di=="b"){
			var momento= document.getElementById('b'+id)
			var texto= document.getElementById('di'+id)
			
			
		}else if(di=="t"){
			var momento= document.getElementById('t'+id)
			var texto= document.getElementById('di'+id)
			
			
		}else if(di=="c"){
			var momento= document.getElementById('c'+id)
			var texto= document.getElementById('di'+id)
			
			
		}
		var res= `[quote=${momento.innerText}]  [/quote]`
		///alert(texto.value)
		
		texto.value=res
		texto.focus()
		
		
		
		
		
	}
	
	function subi(){
		
		let subi= document.getElementById("descer")
		
		subi.focus()
		
		
		
	}


	function desce(){
		
		let desce= document.getElementById("subir")
		
		desce.focus()
		
		
		
	}

