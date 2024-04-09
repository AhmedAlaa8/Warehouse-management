<form method="POST"
    action="{{ route('admin.storeProduct.destroy', $id) }}">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{{ $id }}">
    <button type="submit" class="btn btn-outline-danger ml-2">
        <i class="fas fa-trash"></i>
    </button>
</form>