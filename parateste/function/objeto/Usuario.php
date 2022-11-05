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
				if (file_exists("friend/". $this->getid() ."/3-f")){unlink("friend/". $this->getid() ."/3-f");}
				if (file_exists("friend/". $this->getid() ."/3-m")){unlink("friend/". $this->getid() ."/3-m");}
				if (file_exists("friend/". $this->getid() ."/3-o")){unlink("friend/". $this->getid() ."/3-o");}
				copy("../other/exemplo/exemplo.txt","friend/". $this->getid() ."/3-$genero");
				
				
				
			}elseif (!empty($_POST['outro'])){
				
				
				$id=$_SESSION['id'];
				$outro= $_POST['outro'];
				
				$change= $this->cone->prepare("UPDATE pessoa SET sexo = ? , modi = ?  WHERE pessoa . id = ? ");
				$change->bind_param("ssi",$genero,$data,$id);
				$change->execute();
				if (file_exists("friend/". $this->getid() ."/3-f")){unlink("friend/". $this->getid() ."/3-f");}
				if (file_exists("friend/". $this->getid() ."/3-m")){unlink("friend/". $this->getid() ."/3-m");}
				copy("../other/exemplo/exemplo.txt","friend/". $this->getid() ."/3-o");
				$abrir=fopen("friend/". $this->getid() ."/3-o","w+");
				fwrite($abrir,$outro);
				fclose($abrir);
				
			}
			
			
			
			
		}
		
		
		if ($_GET['true']==2){
			
			$id=$_SESSION['id'];
			
				if (!empty($_POST['nome'])){$nome=$_POST['nome'];$_SESSION['nome']=$_POST['nome'];}else{$nome=$_SESSION['nome'];}
				if (!empty($_POST['sobrenome'])){$sobrenome=$_POST['sobrenome'];$_SESSION['sobrenome']=$_POST['sobrenome'];}else{$sobrenome=$_SESSION['sobrenome'];}
			
					
			
			$update=$this->cone->prepare("SELECT * FROM pessoa WHERE id = ?");
			$update->bind_param("i",$id);
			$update->bind_result($idu,$nou,$sobreu,$emailu,$senhau,$sexou,$creu,$modu,$tipou);
			$update->execute();
			
			
				while($update->fetch()){
				
					$tipou=str_replace("DBWM0000","D+WM0000",$tipou);
					$this->settipo($tipou);
					
				}
					
					$change= $this->cone->prepare("UPDATE pessoa SET nome = ? ,sobrenome = ?, modi = ?, tipo = ? WHERE pessoa . id = ?");
					$change->bind_param("ssssi",$nome,$sobrenome,$data,$tipou,$id);
					$change->execute();
			
			
			
			
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
		
		
	function getnome(){
			
			return $this->nome;
			
			
		}
		
	function getsobrenome(){
			
			return $this->sobrenome;
			
			
		}
		
	function getid(){
			
			
			return $this->id;
			
		}
		
	function getativo(){
			
			return $this->ativo;
			
			
		}
		
	function getverificado(){
			
			return $this->verificado;
			
			
		}
		
	function gettipo(){
			
			
			return $this->tipo;
			
		}
	
		
		
		
	}


//a linha de baixo apenas teste dever apagada na versão final
		
		
		
		
		//print_r($p1);








?>