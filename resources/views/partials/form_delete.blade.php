<form action="{{ $url }}" method="post" class="horizontal-form">
    @csrf 
    @method('DELETE')
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
</form>