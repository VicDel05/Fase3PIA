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
          console.log(response);
          $("#createUserForm")[0].reset();
          $("#adModal").modal("show");
          console.log("Usuario registro");
          //$("#usersTable").DataTable().ajax.reload();
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
});