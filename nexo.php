<?php
		require_once("Clases/Persona.php");

$quehago=$_POST['queHacer'];

		switch ($quehago) {
			case 'Agregar':
				# ...
				$obj=$_POST['persona'];
				//var_dump($obj);
				$pers= new persona($obj["nombre"],$obj["apellido"],$obj["dni"]);

				
				persona::Guardar($pers);
				break;
					
			case 'mostrarLista':
			
				$ArrayDePersonas = Persona::TraerTodasLasPersonas();
				//var_dump($ArrayDePersonas);

				$plantilla='<table class="table">
					<thead style="background:rgb(14, 26, 112);color:#fff;">
						<tr>
							<th>  Nombre </th>
							<th>  Apellido    </th>
							<th>  Dni      </th>
							
						</tr> 
					</thead>';   	
				foreach ($ArrayDePersonas as $Personas) {
					//var_dump($Personas);
							$pers = array();
							$pers['nombre']= $Personas->GetNombre();
							$pers['apellido']= $Personas->GetApellido();
							$pers['dni']=$Personas->GetDni();
							$pers = json_encode($pers);

								$plantilla .= "<tr>
								<td>".$Personas->GetNombre()."</td>
								<td>".$Personas->GetApellido()."</td>
								<td>".$Personas->GetDni()."</td>

							<td><input type='button' value='Eliminar' class='MiBotonUTN' id='btnEliminar' onclick='BorrarPersona($pers)' />
									</td>
							<td><input type='button' value='Modificar'  id='btnModificar' onclick='Modificar($pers)' /></td>
								</tr>";
						}		
						$plantilla .= '</table>';		
		
		echo $plantilla;
		break;

				case 'eliminar':
				$obj = isset($_POST['persona']) ? json_decode(json_encode($_POST['persona'])) : NULL;
					
				persona::Eliminar($obj->dni);
				break;

		case 'modificar':
			$obj = isset($_POST['persona']) ? json_decode(json_encode($_POST['persona'])) : NULL;
			$pers= new persona($obj->nombre,$obj->apellido,$obj->dni);

			persona::modificar($pers);


		}



?>