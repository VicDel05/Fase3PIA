$(document).ready(function() {
    $("#createUserForm").submit(function(e) {
      e.preventDefault();
      
    const nombre = $("#txtnombre").val();
    const apeillidop = $("#txtapellidop").val();
    const apeillidom = $("#txtapellidom").val();
    const correo = $("#txtcorreo").val();
    const contrasena = $("#txtpass").val();
    const rol = $("#rol").val();

    $.ajax({
        url: "http://localhost:3000/registro",
        type: "POST",
        data: {
          nombre: nombre,
          apeillidop: apeillidop,
          apeillidom: apeillidom,
          correo: correo,
          contrasena: contrasena,
          rol: rol 
        },
        success: function(response) {
          $('#adModal').modal('show');
          $("#txtnombre").val('');
          $("#txtapellidop").val('');
          $("#txtapellidom").val('');
          $("#txtcorreo").val('');
          $("#txtpass").val('');
          $("#rol").val('');
          console.log("Usuario registro");
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
});