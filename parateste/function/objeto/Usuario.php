<?php

	require_once "Pessoa.php";
	
	
	
	class  Usuario extends Pessoa{
		
		
	private	$cone;
	private $data;
		
	public	function __construct ($nome,$sobrenome,$id,$cone){
			
			$ano= date('Y');
			$mes= date('m');
			$dia= date('d');
			$hora= date('h');
			$minuto= date('i');

			$this->data= "$ano-$mes-$dia $hora:$dia:00";
			
		
				
				$this->setnome($nome);
				$this->setsobrenome($sobrenome);
				$this->setid($id);
				$this->setativo(1);
				$this->cone= $cone;
				
				$veri= $cone->prepare("SELECT * FROM pessoa WHERE id = ? and nome = ? and sobrenome = ?");
				$veri->bind_param("iss",$id,$nome,$sobrenome);
				$veri->bind_result($idu,$nomeu,$sobrenomeu,$emailu,$senhau,$sexou,$creu,$modiu,$diau,$tipou,$ipu);
				$veri->execute();
				$veri->store_result();
				$teste=$veri->affected_rows;
		
			while ($veri->fetch()){
				
				
				$this->settipo($tipou);
				
				if ($ipu==false){
					
					unset($veri);
					$ip= $_SERVER["REMOTE_ADDR"];
					$veri= $cone->prepare("UPDATE pessoa SET ip = ? WHERE pessoa . id = ?");
					$veri->bind_param("si",$ip,$id);
					$veri->execute();
					
					
				}
				
			}
		
				if ($teste>0){
					
					$this->setverificado(true);	
					
					
				}else{
					
					
					$this->setverificado(false);
					
					
				}
			
			
		}
	
		
		
	function configsql(){
		
		
		


		if (!empty($_POST['genero'])){
			
			$genero=$_POST['genero'];
			
			if (($genero== "f") || ($genero== "m")){
				
				$id=$_SESSION['id'];
				
				$change= $this->cone->prepare("UPDATE pessoa SET sexo = ? , modi = ?  WHERE pessoa . id = ? ");
				$change->bind_param("ssi",$genero,$this->data,$id);
				$change->execute();
				if (file_exists("friend/". $this->getid() ."/3-f")){unlink("friend/". $this->getid() ."/3-f");}
				if (file_exists("friend/". $this->getid() ."/3-m")){unlink("friend/". $this->getid() ."/3-m");}
				if (file_exists("friend/". $this->getid() ."/3-o")){unlink("friend/". $this->getid() ."/3-o");}
				copy("other/exemplo/exemplo.txt","friend/". $this->getid() ."/3-$genero");
				
				
				
			}elseif (!empty($_POST['outro'])){
				
				
				$id=$_SESSION['id'];
				$outro= $_POST['outro'];
				
				$change= $this->cone->prepare("UPDATE pessoa SET sexo = ? , modi = ?  WHERE pessoa . id = ? ");
				$change->bind_param("ssi",$genero,$this->data,$id);
				$change->execute();
				if (file_exists("friend/". $this->getid() ."/3-f")){unlink("friend/". $this->getid() ."/3-f");}
				if (file_exists("friend/". $this->getid() ."/3-m")){unlink("friend/". $this->getid() ."/3-m");}
				copy("other/exemplo/exemplo.txt","friend/". $id ."/3-o");
				$abrir=fopen("friend/". $this->getid() ."/3-o","w+");
				fwrite($abrir,$outro);
				fclose($abrir);
				
			}
			
			
			
			
		}
		
		
		if ($_GET['true']==2){
			
			$id=$_SESSION['id'];
			$data=$this->getdata();
			
			$nome=$_SESSION['nome'];
			$sobrenome=$_SESSION['sobrenome'];
			
			unlink("friend/". $id ."/1-". $nome);
			unlink("friend/". $id ."/2-". $sobrenome);
			
				if (!empty($_POST['nome'])){$nome=$_POST['nome'];$_SESSION['nome']=$_POST['nome'];}else{$nome=$_SESSION['nome'];}
				if (!empty($_POST['sobrenome'])){$sobrenome=$_POST['sobrenome'];$_SESSION['sobrenome']=$_POST['sobrenome'];}else{$sobrenome=$_SESSION['sobrenome'];}
				copy("other/exemplo/exemplo.txt","friend/". $id ."/1-". $nome);
				copy("other/exemplo/exemplo.txt","friend/". $id ."/2-". $sobrenome);
					
			
			$update=$this->cone->prepare("SELECT * FROM pessoa WHERE id = ?");
			$update->bind_param("i",$id);
			$update->bind_result($idu,$nou,$sobreu,$emailu,$senhau,$sexou,$creu,$modu,$diau,$tipou,$ipu);
			$update->execute();
			
			
				while($update->fetch()){
				
					$tipou=str_replace("DBWM0000","D+WM0000",$tipou);
					$this->settipo($tipou);
					
				}
			
				unset($update);
					
					$change= $this->cone->prepare("UPDATE pessoa SET nome = ? ,sobrenome = ?, modi = ?, tipo = ? WHERE pessoa . id = ?");
					$change->bind_param("ssssi",$nome,$sobrenome,$data,$tipou,$id);
					$change->execute();
			
			if (!empty($_POST['pais'])){
				
				$pais= $_POST['pais'];
					
					copy("other/exemplo/exemplo.txt","friend/". $id ."/pais.txt");
					$abrir=fopen("friend/". $id ."/pais.txt","w+");
					fwrite($abrir,$pais);
					fclose($abrir);
				
				
			}
			
			if (!empty($_POST['estado'])){
				
				$estado= $_POST['estado'];
					
					copy("other/exemplo/exemplo.txt","friend/". $id ."/estado.txt");
					$abrir=fopen("friend/". $id ."/estado.txt","w+");
					fwrite($abrir,$estado);
					fclose($abrir);
				
				
			}
			
			if (!empty($_POST['cidade'])){
				
				$cidade= $_POST['cidade'];
					
					copy("other/exemplo/exemplo.txt","friend/". $id ."/cidade.txt");
					$abrir=fopen("friend/". $id ."/cidade.txt","w+");
					fwrite($abrir,$cidade);
					fclose($abrir);
				
				
			}
			
			
			
			if (!empty($_POST['status'])){
				
					$status= $_POST['status'];
					
					copy("other/exemplo/exemplo.txt","friend/". $id ."/status.txt");
					$abrir=fopen("friend/". $id ."/status.txt","w+");
					fwrite($abrir,$status);
					fclose($abrir);
				
			}
			
			
		}
		
		
		
		
	}
		
		
	function bonusday(){
		
		$dia= date("d");
		$id=$this->getid();
		
		$sql= $this->cone->prepare("SELECT * FROM pessoa WHERE id = ? ");
		$sql->bind_param("i",$id);
		$sql->bind_result($idu,$nomeu,$sobrenomeu,$emaiu,$senhau,$sexou,$creu,$modiu,$diau,$tipou,$ipu);
		$sql->execute();
		
		while ($sql->fetch()){
			
			
			
			if ($dia!=$diau){
				
				unset($sql);
				$mil=1000;
				
				$bonus= $this->cone->prepare("SELECT * FROM kants WHERE id = ?");
				$bonus->bind_param("i",$id);
				$bonus->bind_result($ida,$qua,$che,$meno);
				$bonus->execute();
				
				while($bonus->fetch()){
					
					$mil+=$qua;
					
				}
				
				unset($bonus);
				
				$bonus=$this->cone->prepare("UPDATE kants SET quantidade = ? WHERE kants . id = ?");
				$bonus->bind_param("ii",$mil,$id);  				
				$bonus->execute();
				
				unset($bonus);
				
				$update= $this->cone->prepare("UPDATE pessoa SET dia = ? WHERE pessoa . id = ?");
				$update->bind_param("ii",$dia,$id);
				$update->execute();
				
				
			}
			
			
			
		}
			
		
		
		
		
	}//em desevolvimento
		
		
	function mostrar(){
		
		$id= $this->getid();
		
		$exibir= $this->cone->prepare("SELECT * FROM kants WHERE id = ?");
		$exibir->bind_param("i",$id);
		$exibir->execute();
		$exibir->bind_result($idu,$quau,$cheu,$meno);
		
		while ($exibir->fetch()){
			
			return $quau;
			
			
		}
		
		
		
		
		
	}
		
		
	function novasenha($senha,$pin){
		
		$id=$this->getid();
		
		$chave= $this->cone->prepare("SELECT * FROM kants WHERE id= ?");
		$chave->bind_param("i",$id);
		$chave->bind_result($idu,$quau,$check,$meno);
		$chave->execute();
		
		
		while($chave->fetch()){
			
			
			if (password_verify($pin,$check)){
				
				$senha= password_hash($senha,PASSWORD_DEFAULT);
				
				
			}else{ $no=1;}
			
			
			
		}
		
			if ($no!=1){
				unset($chave);
				$cha= $this->cone->prepare("UPDATE  pessoa SET senha = ? WHERE pessoa . id= ?");
				$cha->bind_param("si",$senha,$id);
				$cha->execute();
				
		
			}
		
		
	}
		
		
	function comprar($valor,$pin){
		
		$id= $this->getid();
		
		$exibir= $this->cone->prepare("SELECT * FROM kants WHERE id = ?");
		$exibir->bind_param("i",$id);
		$exibir->bind_result($idu,$quau,$check);
		$exibir->execute();
		
		while($exibir->fetch()){
			
			$true= password_verify($pin,$check);
			
			if (($quau>0) and ($quau>=$valor) and ($true)){
				
				unset($exibir);
				
				$com=$this->cone->prepare("UPDATE kants SET quantidade = ? WHERE kants . id = ?");
				$com->bind_param("ii",$valor,$id);
				$com->execute();
				
				
			}
			
			
		}
		
		
		
		
		
	}//precisa se testado
		
	
			
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
	
	function setdata($data){
		
		$this->data=$data;
		
	}
		
	function getdata(){
		
		return $this->data;	
		
	}
		
		
	}


		
		function boasvinda($valor,$pin,$id,$cone){
				

			$depo=$cone->prepare("INSERT INTO kants VALUE (?,?,?)");
			$depo->bind_param("iis",$id,$valor,$pin);
			$depo->execute();



		}









?>