  <!-- Modal -->
  <div class="modal fade" id="modal-delete-{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="fs-5">Deseja realmente excluir o {{ $tipo }}:</p>
          <p class="fs-5"><strong>{{ $nome }}</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <form action="{{ route("$rota", $id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
