$("#dpto").on('change', function () {
  var dpto = $("#dpto").val();

  $.ajax({

    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

    type: "POST",
    data: {
      dpto: dpto
    },
    url: "consultarMun",
    success: function (r) {

      $('#munc').html(r);

    }
  });

});


function abrirModal(id) {

  $.ajax({

    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

    type: "GET",
    data: {
      id: id
    },
    url: "consultarTercero",
    success: function (r) {
      var datos = JSON.parse(r);

      // console.log(datos[0]['id']);

      $('#tipodoc').val(datos[0]['tipoidentificacion']);
      $('#idt').val(datos[0]['id']);
      $('#numdoc').val(datos[0]['numeroidentificacion']);
      $('#tipotercero').val(datos[0]['tipotercero']);
      $('#nombre1').val(datos[0]['nombre1']);
      $('#nombre2').val(datos[0]['nombre2']);
      $('#apellido1').val(datos[0]['apellido1']);
      $('#apellido2').val(datos[0]['apellido2']);
      $('#dpto').val(datos[0]['iddepartamento']);

      var dpto = datos[0]['iddepartamento'];
      $.ajax({

        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

        type: "POST",
        data: {
          dpto: dpto
        },
        url: "consultarMun",
        success: function (r) {

          $('#munc').html(r);
          $('#munc').val(datos[0]['idmunicipio']);

        }
      });

      

      $('#verTercero').modal('show');


    }
  });



}


function eliminarTercero(id){

  let eliminar = confirm("¿Desea aliminar este tercero?");

  if(eliminar){

    var id = id;

    $.ajax({

      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

      type: "POST",
      data: {
        id: id
      },
      url: "eliminarDatos",
      success: function (r) {
        window.location.href ="gestionar";
      }
    });

  }

}