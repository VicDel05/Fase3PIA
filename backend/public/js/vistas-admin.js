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

    $('#regProd').submit(function(e) {
      e.preventDefault();
  
      const codigo = $('#txtcodigo').val();
      const nombre = $('#txtnombreP').val();
      const descripcion = $('#txtdescrip').val();
      const categoria = $('#opccategoria').val();
      const cantidad = $('#txtcantidad').val();
      const precio = $('#txtprecio').val();
      const imagen = $('#txtimg').val();
  
      $.ajax({
        url: 'http://localhost:3000/registroproducto',
        type: 'POST',
        data: { codigo:codigo, nombre:nombre, descripcion:descripcion, categoria:categoria, cantidad:cantidad, precio:precio, imagen:imagen },
        success: function(response) {
          // Mostrar el modal de confirmación
          $('#exampleModal').modal('show');
          // Limpiar el formulario
          $('#txtcodigo').val('');
          $('#txtnombreP').val('');
          $('#txtdescrip').val('');
          $('#opccategoria').val('');
          $('#txtcantidad').val('');
          $('#txtprecio').val('');
          $('#txtimg').val('');
        },
        error: function() {
          alert('Error al registrar el producto');
        }
      });
    });
  
    $('#exampleModal').on('shown.bs.modal', function () {
        $('#modal-image').addClass('zoom-out');
      });
  
      $('#exampleModal').on('hidden.bs.modal', function () {
        $('#modal-image').removeClass('zoom-out');
      });


});