<a href="{{ route($resourceName . '.show', $model->id) }}" class="btn btn-sm btn-info">Show</a>
<a href="{{ route($resourceName . '.edit', $model->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route($resourceName . '.destroy', $model->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
