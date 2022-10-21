		
	
			function root(){
				let root= document.getElementById('root')
				let res= document.getElementById('res')
				let op= document.createElement('select')
				let campo= document.createElement('form')
				let enviar= document.createElement('input')
				
				
				
					enviar.setAttribute('type','submit')
					enviar.setAttribute('value','enviar')
					campo.setAttribute('method','post')
					campo.setAttribute('action','gerakey.php')
					campo.setAttribute('id','campo')
					campo.style.display='inline'
					op.setAttribute('name','link')
					for (let i=1; i<=4; i++){
						let li= document.createElement('option')
						li.innerText= "gera chaves"
						li.setAttribute('value',i)
						op.appendChild(li)
						
					}
					
					res.removeChild(root)
					res.appendChild(campo)
					campo.appendChild(op)
					campo.appendChild(enviar)
					
					
				
				
				
				
			}
			
			function sair(){
				
				
				let campo= document.getElementById('campo')
				let bo= document.createElement('Button')
				bo.setAttribute('id','root')
				bo.setAttribute('onclick','root()')
				bo.innerText='root'
				res.removeChild(campo)
				res.appendChild(bo)
				
				
				
				
				
				
				
			}