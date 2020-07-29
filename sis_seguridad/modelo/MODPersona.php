<?php
/***
 Nombre: 	MODPersona.php
 Proposito: Clase de Modelo, que contiene la definicion y llamada a funciones especificas relacionadas 
 a la tabla tpersona del esquema SEGU
 Autor:		Kplian    
 Fecha:		04/06/2011
 * 
 SSUE            FECHA:         EMPRESA     AUTOR               DESCRIPCION  
  #40            31-07-2019     ETR		     MZM                Adicion de campos matricula, historia_clinica en tabla con sus correspondientes cambios en funciones. Adicion de campo fecha_nacimiento a vista
 #55            02-09-2019     ETR		     MZM                Adicion de campos abreviatura_titulo
 #59 			09.09.2019		ETR			MZM					Adicion de campo profesion
 #88           02/12/2019       ETR         APS                 modificación de campo direccion, ocultar profesion, editar grupo sanquineo.
 */ 
class MODPersona extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
		
	} 
	
	function listarPersona(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_persona_sel';// nombre procedimiento almacenado
		$this->transaccion='SEG_PERSON_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
	
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_persona','integer');
		$this->captura('ap_materno','varchar');
		$this->captura('ap_paterno','varchar');
		$this->captura('nombre','varchar');
		$this->captura('nombre_completo1','text');
		$this->captura('nombre_completo2','text');
		$this->captura('ci','varchar');
		$this->captura('correo','varchar');
		$this->captura('celular1','varchar');
		$this->captura('num_documento','integer');
		$this->captura('telefono1','varchar');
		$this->captura('telefono2','varchar');
		$this->captura('celular2','varchar');

		$this->captura('fecha_nacimiento','date');
		$this->captura('genero','varchar');
		$this->captura('direccion','varchar');	//#88
		$this->captura('tipo_documento','varchar');
		$this->captura('expedicion','varchar');

		

		//Ejecuta la funcion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		return $this->respuesta;

	}
	
	function listarPersonaFoto(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_persona_sel';// nombre procedimiento almacenado
		$this->transaccion='SEG_PERSONMIN_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
	
		//Definicion de la lista del resultado del query
		
		//creamos variables de sesion para descargar la fotos
		$_SESSION["FOTO"]=array();
	
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_persona','integer');
		$this->captura('ap_materno','varchar');
		$this->captura('ap_paterno','varchar');
		$this->captura('nombre','varchar');
		$this->captura('nombre_completo1','text');
		$this->captura('nombre_completo2','text');
		$this->captura('ci','varchar');
		$this->captura('correo','varchar');
		$this->captura('celular1','varchar');
		$this->captura('num_documento','integer');
		$this->captura('telefono1','varchar');
		$this->captura('telefono2','varchar');
		$this->captura('celular2','varchar');
		$this->captura('direccion','varchar');
		$this->captura('extension','varchar');
		$this->captura('tipo_documento','varchar');
		$this->captura('expedicion','varchar');

		//nombre varialbe de envio, tipo dato, columna que serra el nombre foto retorno, ruta para guardar archivo, crear miniatura, almacenar en sesion, nombre variale sesion
		
		$this->captura('foto','bytea','id_persona','extension','sesion','foto');
		//$this->captura('foto','bytea','id_persona','extension','archivo','../../sis_seguridad/control/foto_persona/');
		//$this->captura('foto','bytea','id_persona','extension','archivo','./');
		
		 //#40(I)-MZM
		$this->captura('matricula','varchar');
		$this->captura('historia_clinica','varchar');
		$this->captura('fecha_nacimiento','date');
		$this->captura('genero','varchar');
		$this->captura('grupo_sanguineo','varchar');    //#88
		//#40(F)
		$this->captura('abreviatura_titulo','varchar');

		//#55 - 02.09.2019
		
		$this->captura('profesion','varchar'); //#59 - 09.09.2019
		$this->captura('nombre_archivo_foto','text');
		$this->captura('sobrenombre','varchar');
		$this->captura('cualidad_1','varchar');
		$this->captura('cualidad_2','varchar');
		//Ejecuta la funcion
		$this->armarConsulta();
		$this->ejecutarConsulta();


		return $this->respuesta;

	}
	
	function obtenerPersonaFoto(){
        //Definicion de variables para ejecucion del procedimiento
        $this->procedimiento='segu.ft_persona_sel';// nombre procedimiento almacenado
        $this->transaccion='SEG_OPERFOT_SEL';//nombre de la transaccion
        $this->tipo_procedimiento='SEL';//tipo de transaccion
        $this->setCount(false);
        
        
        $this->setParametro('id_usuario','id_usuario','integer');
        //defino varialbes que se captran como retornod e la funcion
        $this->captura('id_persona','integer');
        $this->captura('extension','varchar');
        //nombre varialbe de envio, tipo dato, columna que serra el nombre foto retorno, ruta para guardar archivo, crear miniatura, almacenar en sesion, nombre variale sesion         
       // $this->captura('foto','bytea','id_persona','extension','sesion','foto');
        $this->captura('foto','bytea','id_persona','extension','archivo','../../sis_seguridad/control/foto_persona/');
        //$this->captura('foto','bytea','id_persona','extension','archivo','./');
        
        
        //Ejecuta la funcion
        $this->armarConsulta();
        $this->ejecutarConsulta();

        return $this->respuesta;

    }
	
	
	function insertarPersona(){
		
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_persona_ime';// nombre procedimiento almacenado
		$this->transaccion='SEG_PERSON_INS';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		
		
		//Define los parametros para la funcion	
			
		$this->setParametro('ap_materno','ap_materno','varchar');
		$this->setParametro('ap_paterno','ap_paterno','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('ci','ci','varchar');
		$this->setParametro('correo','correo','varchar');
		$this->setParametro('celular1','celular1','varchar');
		$this->setParametro('telefono1','telefono1','varchar');
		$this->setParametro('telefono2','telefono2','varchar');
		$this->setParametro('celular2','celular2','varchar');
		$this->setParametro('direccion','direccion','varchar');  //#88

		$this->setParametro('tipo_documento','tipo_documento','varchar');
		$this->setParametro('expedicion','expedicion','varchar');
		//#40 - MZM 
		$this->setParametro('matricula','matricula','varchar');
		$this->setParametro('historia_clinica','historia_clinica','varchar');
		$this->setParametro('fecha_nacimiento','fecha_nacimiento','date');
		$this->setParametro('genero','genero','varchar');
		$this->setParametro('grupo_sanguineo','grupo_sanguineo','varchar');  //#88
		//#40 (fin)
		//#55 - 02.09.2019
		$this->setParametro('abreviatura_titulo','abreviatura_titulo','varchar');
		
		$this->setParametro('profesion','profesion','varchar'); //#59 - 09.09.2019
		$this->setParametro('sobrenombre','sobrenombre','varchar');
		$this->setParametro('cualidad_1','cualidad_1','varchar');
		$this->setParametro('cualidad_2','cualidad_2','varchar');
		//Ejecuta la instruccion
		$this->armarConsulta();
		
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function modificarPersona(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_persona_ime';// nombre procedimiento almacenado
		$this->transaccion='SEG_PERSON_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		
		//apartir del tipo  del archivo obtiene la extencion
	

		
		//Define los parametros para la funcion	
		$this->setParametro('id_persona','id_persona','integer');	
		$this->setParametro('ap_materno','ap_materno','varchar');
		$this->setParametro('ap_paterno','ap_paterno','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('ci','ci','varchar');
		$this->setParametro('correo','correo','varchar');
		$this->setParametro('celular1','celular1','varchar');
		$this->setParametro('telefono1','telefono1','varchar');
		$this->setParametro('telefono2','telefono2','varchar');
		$this->setParametro('celular2','celular2','varchar');
		$this->setParametro('direccion','direccion','varchar'); //#88
		
		$this->setParametro('tipo_documento','tipo_documento','varchar');
		$this->setParametro('expedicion','expedicion','varchar');
		//#40 - MZM 
		$this->setParametro('matricula','matricula','varchar');
		$this->setParametro('historia_clinica','historia_clinica','varchar');
		$this->setParametro('fecha_nacimiento','fecha_nacimiento','date');
		$this->setParametro('genero','genero','varchar');
		$this->setParametro('grupo_sanguineo','grupo_sanguineo','varchar');//#88
		//#40 (fin)
		//#55 - 02.09.2019
		$this->setParametro('abreviatura_titulo','abreviatura_titulo','varchar');
		$this->setParametro('profesion','profesion','varchar');//#59 - 09.09.2019
		$this->setParametro('sobrenombre','sobrenombre','varchar');
		$this->setParametro('cualidad_1','cualidad_1','varchar');
		$this->setParametro('cualidad_2','cualidad_2','varchar');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function eliminarPersona(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='segu.ft_persona_ime';
		$this->transaccion='SEG_PERSON_ELI';
		$this->tipo_procedimiento='IME';
			
		//Define los parametros para la funcion
		$this->setParametro('id_persona','id_persona','integer');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function subirFotoPersona(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_persona_ime';// nombre procedimiento almacenado
		$this->transaccion='SEG_UPFOTOPER_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion

		//Define los parametros para la funcion	
		$this->setParametro('id_persona','id_persona','integer');	
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('nombre_archivo_foto', 'nombre_archivo_foto','text');
		//$this->setParametro('foto','foto','bytea',false,1024,false,array("csv"));
		
		
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function validarPersona(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_persona_ime';
		$this->transaccion='SEG_PERSONVAL_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_persona','id_persona','int4');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('ci','ci','varchar');
		$this->setParametro('tipo_documento','tipo_documento','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	
}
?>
