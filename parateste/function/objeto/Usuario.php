<?php

	require_once "Pessoa.php";
	
	
	class  Usuario extends Pessoa{
		
		
	public	function __construct ($nome,$sobrenome,$id){
			
			
		
				
				$this->setnome($nome);
				$this->setsobrenome($sobrenome);
				$this->setid($id);
				$this->setativo(1);
				

			
			
		}
			
			
	function setnome($nome){
			
			$this->nome= $nome;
			
			
		}
		
	function setsobrenome($sobrenome){
			
			$this->sobrenome= $sobrenome;
			
			
		}
		
	function setid($id){
			
			
			$this->id= $id;
			
		}
		
	function setativo($ativo){
			
			$this->ativo= $ativo;
			
			
		}
		
	function setverificado($verificado){
			
			$this->verificado= $verificado;
			
			
		}
			
			
			
		
		
	function settipo($tipo){
			
			
			$this->tipo= $tipo;
			
		}
		
		
	function getnome($nome){
			
			return $this->nome;
			
			
		}
		
	function getsobrenome($sobrenome){
			
			return $this->sobrenome;
			
			
		}
		
	function getid($id){
			
			
			return $this->id;
			
		}
		
	function getativo($ativo){
			
			return $this->ativo;
			
			
		}
		
	function getverificado($verificado){
			
			return $this->verificado;
			
			
		}
		
	function gettipo($tipo){
			
			
			return $this->tipo;
			
		}
	
		
		
		
	}


//a linha de baixo apenas teste dever apagada na versão final
		
		
		$p1= new Usuario("giovanne","pedreira",1);
		
		print_r($p1);








?>