@foreach ($services as $service)
    <div class="modal fade" id="deleteSliderModal{{ $service->id }}" tabindex="-1"
        aria-labelledby="deleteSliderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSliderModalLabel"> Delete Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <form action="{{ route('service.destroy', $service->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id" value="{{ $service->id }}">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="confirmDelete">delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
