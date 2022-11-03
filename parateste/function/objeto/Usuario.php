<?php

	require_once "Pessoa.php";
	
	
	class  Usuario extends Pessoa{
		
		
	private	$cone;
		
	public	function __construct ($nome,$sobrenome,$id,$cone){
			
			
		
				
				$this->setnome($nome);
				$this->setsobrenome($sobrenome);
				$this->setid($id);
				$this->setativo(1);
				$this->cone= $cone;
				
				$veri= $cone->prepare("SELECT * FROM pessoa WHERE id = ? and nome = ? and sobrenome = ?");
				$veri->bind_param("iss",$id,$nome,$sobrenome);
				$veri->execute();
				$veri->store_result();
				$teste=$veri->affected_rows;
		
				if ($teste>0){
					
					$this->setverificado(true);	
					
					
				}else{
					
					
					$this->setverificado(false);
					
					
				}
			
			
		}
	
		
		
	function configsql(){
		
		
		$ano= date('Y');
		$mes= date('m');
		$dia= date('d');
		$hora= date('h');
		$minuto= date('i');

		$data= "$ano-$mes-$dia $hora:$dia:00";


		if (!empty($_POST['genero'])){
			
			$genero=$_POST['genero'];
			
			if (($genero== "f") || ($genero== "m")){
				
				$id=$_SESSION['id'];
				
				$change= $this->cone->prepare("UPDATE pessoa SET sexo = ? , modi = ?  WHERE pessoa . id = ? ");
				$change->bind_param("ssi",$genero,$data,$id);
				$change->execute();
				
				
				
				
			}elseif (!empty($_POST['outro'])){
				
				
				$id=$_SESSION['id'];
				
				$change= $this->cone->prepare("UPDATE pessoa SET sexo = ? , modi = ?  WHERE pessoa . id = ? ");
				$change->bind_param("si",$genero,$id);
				$change->execute();
				
				
			}
			
			
			
			
		}
		
		
		
		
		
		
		
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
		
		
		
		
		//print_r($p1);








?>