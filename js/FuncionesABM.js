$(document).ready(function(){

	MostrarGrilla();
}); //muestra grilla toto el tiempo


function MostrarGrilla()
{
	var pagina= "./nexo.php";
	$.ajax({
		type:'POST',
		url:pagina,
		data: {queHacer:"mostrarLista"},
		datatype:"html",
		async: true
	})
	.then(
	function(exito){
		$("#GrillaPersonas").html(exito)
	},
	function(error){
		//alert("algo pasa");
	});
}


function AgregarPersona()
{ 
	
	var pagina= "./nexo.php";
	var nombre=$("#Nombre").val();
	var apellido=$("#Apellido").val();
	var dni=$("#dni").val();
	

	var persona={};

	persona.nombre= nombre;
	persona.apellido=apellido;
	persona.dni=dni;
	
		if(persona.nombre==""){
		alert("Debe Ingresar Nombre");
		return;
	}
	if(persona.apellido==""){
		alert("Debe Ingresar Apellido");
		return;
	}
	if(persona.dni==""){
		alert("Debe Ingresar Dni");
		return;
	}

   $.ajax({url:pagina,type:"post",data:{queHacer:"Agregar",persona:persona}})
   .then(function(exito){
   
   //	alert(exito);
  // 	alert("Ingresado Exitosamente!");
	 //  	$("#principal").html(exito);
   },function(error){

   });
}

function BorrarPersona(persona)
{
	if(!confirm("Desea Eliminar la persona"+persona.nombre+" "+persona.apellido+"??"))
	{return;}
	var pagina = "./nexo.php"

   $.ajax({
   	url:pagina,
   	type:"post",
   	datatype:"json",
   	data:{queHacer:"eliminar",persona:persona}}).then
   (function(exito){
   //alert(exito);
   //	alert(exito);
   //	alert("Eliminado Exitosamente!");
	
   },function(error){

   });

   MostrarGrilla();
}
function Modificar(persona)
{
		var pagina= "./nexo.php";
	$("#Nombre").val(persona.nombre);
	$("#Apellido").val(persona.apellido);
	$("#dni").val(persona.dni);
	$("#hdnQueHacer").val("modificar");

	$.ajax({
   	url:pagina,
   	type:"post",
   	datatype:"json",
   	data:{queHacer:"eliminar",persona:persona}}).then
   (function(exito){
  // alert(exito);
   //	alert(exito);
   //	alert("Eliminado Exitosamente!");
	
   },function(error){

   });
}