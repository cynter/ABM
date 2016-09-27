<?php 
		class Persona
		{
			//Atributos
			private $nombre;
			private $apellido;
			private $dni;

			//Get y Set

			public function GetNombre()
			{

				return $this->nombre;
			}
			public function GetApellido()
			{
				return $this->apellido;

			}
			public function GetDni()
			{

				return $this->dni;
			}

			public function SetNombre($valor)
			{
				$this->Nombre=$valor;
			}
			public function SetApellido($valor)
			{
				$this->Apellido=$valor;
			}
			public function SetDni($valor)
			{
				$this->dni=$valor;
			}

		

			public function __construct($nombre,$apellido,$dni)
			{
					$this->nombre=$nombre;
					$this->apellido=$apellido;
					$this->dni=$dni;
				/*if($Nombre !== NULL && $Apellido !==NULL)
				{
					$this->nombre=$Nombre;
					$this->apellido=$Apellido;
					$this->dni=$dni;

				}*/
			}

			public function ToString()
			{
				return $this->nombre."-".$this->apellido."-".$this->dni."\n";
			}


			public static function Guardar($objeto)
			{

				$Archivo= fopen("Personas.txt","a");

				fwrite($Archivo,$objeto->ToString());

				fclose($Archivo);
			}

			public static function TraerTodasLasPersonas ()
			{		$listaDePersonas = array ();
					$miArchivo=fopen("./Personas.txt","r");

					while(!feof($miArchivo))
					{
						$renglon=fgets($miArchivo);
						$Persona= explode("-",$renglon);
						$Persona[0]=trim($Persona[0]);
						//$Persona[1]=trim($Persona[1]);
						if($Persona[0] !="" && $Persona[1] !="" )
						{
							$listaDePersonas[]= new Persona($Persona[0],$Persona[1],$Persona[2]);

						}
						
						

					}
					fclose($miArchivo);
					return $listaDePersonas;
			}

			public static function Eliminar($Dni)
			{
				
				$listaDePersonasLeidas = Persona::TraerTodasLasPersonas();
				$listaDePersonas= array();

				for($i=0;$i<count($listaDePersonasLeidas);$i++)
				{ 
						if($listaDePersonasLeidas[$i]->dni == $Dni){continue;}
						$listaDePersonas[$i]=$listaDePersonasLeidas[$i];
				}

				$miArchivo= fopen("./Personas.txt","w");
				foreach ($listaDePersonas as $item ) {
					fwrite($miArchivo,$item->ToString());
				}

				fclose($miArchivo);


			}

			public static function Modificar($pers)
			{
				
				$listaDePersonasLeidas = Persona::TraerTodasLasPersonas();
				$listaDePersonas= array();

				for($i=0;$i<count($listaDePersonasLeidas);$i++)
				{ 
						if($listaDePersonasLeidas[$i]->dni == $Dni){continue;}
						$listaDePersonas[$i]=$listaDePersonasLeidas[$i];
				}
				array_push($listaDePersonas,$pers);
				//var_dump($listaDePersonas);
				$miArchivo = fopen("archivos/productos.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeProductos AS $item){
			$cant = fwrite($miArchivo, $item->ToString());
			
			}
			fclose($miArchivo);
			}
		}
 ?>