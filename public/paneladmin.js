var futuroJSON= [
    ['Lucas', 'Lucas@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Marían', 'Marían@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Juan', 'Juan@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Pilar', 'Pilar@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Rocio', 'Rocio@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Manuel', 'Manuel@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Julían', 'Julían@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Oscar', 'Oscar@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Irene', 'Irene@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Pepe', 'Pepe@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Juana', 'Juana@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Martín', 'Martín@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Celeste', 'Celeste@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Daniel', 'Daniel@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Rubén', 'Rubén@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Mercedes', 'Mercedes@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Inza', 'Inza@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Patricia', 'Patricia@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Lara', 'Lara@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Mere', 'Mere@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Pablo', 'Pablo@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Lucía', 'Lucía@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>'],
    ['Monica', 'Monica@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
];
 
var futuroJSON2= [
    ['Lucas', 'Lucas@gmail.com', '1','<button class="btn btn-danger">Bloquear</button>'],
    ['Marían', 'Marían@gmail.com', '0','<button class="btn btn-danger">Bloquear</button>']
];
$(document).ready(function () {
    
  
   
   $.ajax({
        url:   '/procesadoadmin',
        type:  'post',
        success:  function (response) {
            var usuariosJSON= response.data;
            console.log(usuariosJSON[0]['nombre']);
            var datos  = [];
            var objeto = {};

            for(var i= 0; i < usuariosJSON.length; i++) {

                var nombre = usuariosJSON[i];
                if(usuariosJSON[i]['nombre']!='administrador'){
                    datos.push(
                        [''+usuariosJSON[i]['nombre']+'', ''+usuariosJSON[i]['email'],
                        '<button class="btn btn-danger" onclick='+'location.href="/delete/'
                        + usuariosJSON[i]['email']+'" type="button"> Eliminar a '+usuariosJSON[i]['nombre'] +'</button>']
                    );  
                }
                
            }

            objeto = datos;
            console.log(futuroJSON2);
            console.log(objeto);
            $('#example').DataTable({
                data: objeto,
                "bLengthChange": false,
                columns: [
                    { title: 'Nombre' },
                    { title: 'Email' },
                    { title: 'Eliminar' }
                ],
            })

        }
    });
   
});

/*
LLAMADA AJAX AL CONTROLADOR
    $.ajax({
                data:  parametros,
                url:   'controlador.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });

*/