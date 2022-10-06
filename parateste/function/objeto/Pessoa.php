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
		
		
	abstract function getnome($nome);
		
	abstract function getsobrenome($sobrenome);
		
	abstract function getid($id);
		
	abstract function getativo($ativo);
		
	abstract function getverificado($verificado);
		
	abstract function gettipo($tipo);
		
		
		
		
	}









?>