<?php

	 abstract class Pessoa{
		
		protected $nome;
		protected $sobrenome;
		protected $id;
		protected $ativo;
		protected $verificado;
		protected $tipo;
		
		
		
	abstract function setnome($nome);
		
	abstract function setsobrenome($sobrenom);
		
	abstract function setid($id);
		
	abstract function setativo($ativo);
		
	abstract function setverificado($verificado);
		
	abstract function settipo($tipo);
		
		
	abstract function getnome();
		
	abstract function getsobrenome();
		
	abstract function getid();
		
	abstract function getativo();
		
	abstract function getverificado();
		
	abstract function gettipo();
		
		
		
		
	}









?>