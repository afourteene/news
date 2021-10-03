
<form action="{{ route('update-categories',$category->id ) }}" method="POST">
<div class="modal fade" id="modal-{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">بروز رسانی</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="col-form-label">نام دسته بندی:</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $category->name }}">
                    </div>

        
            </div>
            <div class="modal-footer">
                <button  type="submit" class="btn btn-success">بروزرسانی</button>
                <a href="{{ route('delete-categories', $category->id ) }}" type="button" class="btn btn-danger">حذف</a>
            </div>
        </div>
    </div>
</div>
</div>
</form>