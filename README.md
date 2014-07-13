TPV CECA PARA LARAVEL 4.2
=========================

Historia
--------

Viendo que la pasarela de pago para [ceca](https://github.com/ssheduardo/ceca) no tenía un paquete para ser usado comodamente en Laravel 4.2, y poder hacer que sea aún más fácil de usar y sobre todo el proporcionar un granito de arena a la comunidad.


Introducción
------------
La clase CECA sirve para generar el formulario que se comunicará con la pasarela de pagos que usan utilizan bancos y cajas: [Caja badajoz, Caja Círculo, Caja de Burgos, CajaSur, Caja Granada, Caja de guadalajara, Caja Rioja, Caixa Laietana, Caja Murcia, CajAstur, Sanostra, La Caja de Canarias, CAN (Caja navarra), Caja Canarias, Caja Cantabria, Caja Segovia, CaixaNova, IberCaja, CAM, Caixa Galicia, Caja de Ávila, BBK, Caja Vital Kutxa, Caja de Extremadura, Kutxa, Caja duero, CCM, Cajasol.]


Si lo usas en algún proyecto y te fue de utilidad estaré más que contento de poder aportar un granito de arena en que tu proyecto salga adelante.

Requerimientos
--------------
Laravel 4.2

Créditos
--------
	Paquete creado por Eduardo Diaz, Madrid 2014
	Twitter: @eduardo_dx


Instalación
-----------
**Paso 1:** Agregar a nuestro composer.json dentro del apartado **require** el repositorio "ubublog/laravel-ceca": "dev-master"

	"require": {
	    ...
        "ubublog/laravel-ceca": "dev-master"
    },

**Paso 2:** Realizar un **composer update** para que nos descargue el paquete

	composer update

**Paso 3:** Agregar nuestro Service Provider, para eso abrimos el archivo app/config/app.php

    'providers' => array(
        ...
        'Ubublog\Ceca\CecaServiceProvider',
    );

**Nota: No se define un Alias, ya esta incluido por defecto y se llama Ceca**

Uso
---

	try{
		Ceca::setEntorno();
        Ceca::setMerchantID('xxxxxx');
        Ceca::setClaveEncriptacion('xxxxxx');
        Ceca::setAcquirerBIN('xxxxxx');
        Ceca::setUrlOk('http://www.url.com/respuesta_ok.php');
        Ceca::setUrlNok('http://www.url.com/respuesta_nok.php');
        Ceca::setNumOperacion('A00'.date('His'));
        Ceca::setImporte('43,81');
        Ceca::setSubmit('pay','Pagar');
        $form = Ceca::create_form();
	}
	catch (Exception $e){
		echo $e->getMessage();
		exit();
	}


    //$form se pasaría a la vista.

	//xxxxx -> reemplazar por los parámetros proporcionados por el banco

#####Opcional

	//Asignar nombre a name del formulario
	Ceca::setNameform('nombre_formulario');	

	//Asignar nombre a id del formulario
	Ceca::setIdform('id_formulario');	

	//Generar el input submit (si en caso no se usa javascript u otro)
	Ceca::setSubmit('nombre_submit','texto_del_boton');


#####Generamos el formulario

	//En el ejemplo anterior lo hemos usado
	$formulario = Ceca::create_form();

Con esto generamos el form para la comunicación con la pasarela de pagos.
Solo queda agregar un `input submit personalizado` o por medio de `javascript` para realizar el submit.

#####Redirección automática

	//Incluyo este método de sermepa a esta clase, gracias a jaumecornado (github)
	Podemos forzar la redirección sin pasar por el método create_form()
	Ceca::launchRedirection(); 
	
	[Esto método llamaría a create_form y lanzaría el submit por javacript, no hace falta agregar el método setSubmit()]

>**Nota:**
	Por defecto se conecta por la pasarela de pruebas, para cambiar a un entorno real usar el método: **setEntorno('produccion')**.

