
<!-- Modal -->
<div class="modal fade" id="modProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        <input type="hidden" id="id" name="id">
                <div class="mb-3">
                    <label for="txtcodigo" class="form-label">Código del producto (5 caracteres)</label>
                    <input type="text" class="form-control" id="txtcodigo" placeholder="LP244" name="codigo">
                </div>
                <div class="mb-3">
                    <label for="txtnombreP" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" id="txtnombreP" placeholder="Pluma" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="txtdescrip" class="form-label">Descripcion del producto</label>
                    <textarea class="form-control" id="txtdescrip" rows="3" name="descripcion"></textarea>
                </div>
                <div class="mb-3">
                    <label for="opccategoria" class="form-label">Categoria del producto</label>
                    <select id="opccategoria" class="form-select" name="categoria">
                    <option value="1">Cuadernos y libretas</option>
                    <option value="2">Hojas y Papeles</option>
                    <option value="3">Carpetas y Archivadore</option>
                    <option value="4">Bolígrafos y Plumas</option>
                    <option value="5">Lápices y Portaminas</option>
                    <option value="6">Rotuladores, Marcadores y Plumones</option>
                    <option value="7">Crayones y Ceras</option>
                    <option value="8">Grapadoras y Perforadoras</option>
                    <option value="9">Clips, cintas y Sujetapapeles</option>
                    <option value="10">Tijeras y Cúteres</option>
                    <option value="11">Organizadores y Carpetas</option>
                    <option value="12">Pinturas</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="txtcantidad" class="form-label">Cantidad del piezas en inventario</label>
                    <input type="text" class="form-control" id="txtcantidad" placeholder="10" name="cantidad">
                </div>
                <div class="mb-3">
                    <label for="txtprecio" class="form-label">Precio del producto</label>
                    <input type="text" class="form-control" id="txtprecio" placeholder="$35" name="precio">
                </div>
                <div class="mb-3">
                    <label for="txtimg" class="form-label">Imagen del producto</label>
                    <input type="text" class="form-control" id="txtimg" placeholder="URL" name="imagen">
                </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>