		
	
			function root(){
				let root= document.getElementById('root')
				let res= document.getElementById('res')
				let check= document.getElementById('check')
				let op= document.createElement('select')
				let campo= document.createElement('form')
				let enviar= document.createElement('input')
				let li=[]
				
				
					
					check.removeAttribute('onmouseout')
					check.setAttribute('onmouseout','sair(1)')
					enviar.setAttribute('type','submit')
					enviar.setAttribute('value','enviar')
					campo.setAttribute('method','post')
					campo.setAttribute('action','gerakey.php')
					campo.setAttribute('id','campo')
					campo.style.display='inline'
					op.setAttribute('name','link')
					for (let i=1; i<=4; i++){
						li[i]= document.createElement('option')
						li[i].innerText= "gera chaves"
						li[i].setAttribute('value',i)
						op.appendChild(li[i])
						
					}
				
					li[2].innerText= "manu"
					
					res.removeChild(root)
					res.appendChild(campo)
					campo.appendChild(op)
					campo.appendChild(enviar)
					
					
				
				
				
				
			}
			
			function sair(ch){
				
				if  (ch==1){
				
				let campo= document.getElementById('campo')
				let bo= document.createElement('Button')
				
				
				
				check.removeAttribute('onmouseout')
				check.setAttribute('onmouseout','sair(0)')
				bo.setAttribute('id','root')
				bo.setAttribute('onclick','root()')
				bo.innerText='root'
				res.removeChild(campo)
				res.appendChild(bo)
				
				
				
				
				}
				
				
			}