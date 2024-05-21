$(document).ready(function() {
    $('#form-coment').submit(function(e) {
      e.preventDefault();
  
      const comment = $('#txtcomentario').val();
  
      $.ajax({
        url: 'http://localhost:3000/comentario',
        type: 'POST',
        data: { comment: comment },
        success: function(response) {
          $('#txtcomentario').val("");
          // Mostrar el modal de confirmación
          $('#confirmationModal').modal('show');
          // Limpiar el formulario
         
        },
        error: function() {
          alert('Error al registrar el comentario');
        }
      });
    });

    $('#confirmationModal').on('shown.bs.modal', function () {
        $('#modal-image').addClass('zoom-out');
      });

      $('#confirmationModal').on('hidden.bs.modal', function () {
        $('#modal-image').removeClass('zoom-out');
      });
  });