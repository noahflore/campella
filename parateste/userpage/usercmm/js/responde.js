	
	function responde(d){
		
		var texto=document.getElementById('d'+d)
		var res=`[quote=${texto.innerHTML}]  [/quote]`
		var te=document.getElementById('res')
		
		te.value=res
		te.focus()
		
		
		
	}