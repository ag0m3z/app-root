/*!
 *
 *  Hockma Soluciones app.js
 * ================
 * 
 * @Author  Alejandro Gomez
 * @Tema AdminLTE v2
 */

//Variables Generales
var _usuario = '',
    _password = '',
    _nickname = '',
    _titulo = 'Hockma Soluciones',
    _UrlApi = '',
    _Key = '',
    _UrlMetodo = '',
    _enableConsole = true,
    MyConsole = function(logconsole){
      if(_enableConsole){
        console.log(logconsole);
      }
    },
    axiosError = function(objectError){

      if (objectError.response.status === 0) {
        MyAlert('Not connect: Verify Network.');
      } else if (objectError.response.status == 404) {
          MyAlert('Requested page not found [404]');
      } else if (objectError.response.status == 500) {
          MyAlert('Internal Server Error [500].');
      }else if(objectError.response.status == 405){
          MyAlert("Metodo no Soportado [405]");
      } else if (objectError.response.statusText === 'parsererror') {
          MyAlert('Requested JSON parse failed.');
      } else if (objectError.response.statusText === 'timeout') {
          MyAlert('Time out error.');
      } else if (objectError.response.statusText === 'abort') {
          MyAlert('Ajax request aborted.');
      } else {
          MyAlert('Uncaught Error: ' + objectError.response.data.message + ' <br> Codigo: '+objectError.response.status);
      }

    },
    MyAlert = function(message,size = 'small'){  
      bootbox.alert({
        size: size,
        message: message
      });
    };

/**
* Extraer Configuracion del Sistema
*/
  $.getJSON('app/config/config.json',function(response){

    if(response.result){
      if(response.data.titulo == ""){
          $("title").text(_titulo);
      }else{
        $("title").text(response.data.titulo);
        _UrlApi = response.data.webapi.url;
      }
    }

  });

/**
* ===================================
*  METODOS PARA EL API REST
* =================================== 
*/
  $('.sidebar-menu li').click(
    function () {
      $(".sidebar-menu li").removeClass("active");
      $(this).addClass("active");
  });

//Boton de Login para iniciar la sesion
$("#btnLogin").on('click',function(){

_usuario = $("#textUsuario").val(),
_password = $("#textPassword").val();

if($.trim(_usuario)==""){
  MyAlert('Ingrese su usuario');

}else if($.trim(_password)==""){
  MyAlert('Ingresa la contraseña');

}else{

axios.post(
  _UrlApi+"getRequestAuth",
  {
    usuario:_usuario,
    password:_password
  },
).then(function(response){
    
    MyConsole(response);

    if(response.data.result){
      
      axios({
        url:'app/controller/ControllerLogin.php',
        method:"post",
        data: {
            key:response.data.data.key,
            idusuario:response.data.data.idusuario,
            idestatus:response.data.data.idestatus,
            nombre:response.data.data.nombre,
            usuario:response.data.data.usuario
        }
      }).then(function(data){

        MyConsole(data);

        localStorage.removeItem('token-app');

        if(data.data.result){

          localStorage.setItem('token-app',response.data.data.key);
          location.reload();

        }else{
          MyAlert(data.data.message);
        }

      }).catch(function(error){
        MyConsole(error);
        axiosError(error);
      });

    }else{
      MyAlert(response.data.message);
    }

}).catch(function(error){
    axiosError(error);
});

}
});

//Funcion para salir del sistema
$("#menu_salir").on('click',function(e){

var config = {
method:'post',
responseType:'json'
};

axios.post(
  'app/controller/ControllerSalir.php',
  {
    idbtn:1
  },
  config
  ).then(function(response){

  if(response.data.result){
      location.reload();
  }else{
    MyAlert(response.data.message);
  }

  }).catch(function(error){

  axiosError(error);

  });
});

//Funcion para mostrar las mesas
$("#menu_mesas").on('click',function(e){

  $('#app-root').load('app/view/mesas/ViewMesas.php');

});

$("#btnAbrirMesa").on('click',function(e){
  MyAlert("Boton Abrir Mesa");
});


//Funcion para listar las mesas
function getListarMesas(){

  axios(
    {
      url:_UrlApi+'getMesas/60/0',
      method:'post',
      data:{},
      headers:{
        key:localStorage.getItem('token-app')
      }
    }
  )
  .then(function(response){
    MyConsole(response);
    /**
     * @Todo
     * Falta Listar las mesas retornadas por el api
     * 
     **/ 
  })
  .catch(function(error){
    axiosError(error);
  });

  alert(123);
}