

<form action="{{ route('update-categories',$slider->id ) }}" method="POST">
    <div class="modal fade" id="modal-{{ $slider->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">بروز رسانی</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="col-form-label">نام عکس:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="link" class="col-form-label">لینک:</label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="col-form-label">عکس:</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
    
    
                        <div class="mb-3">
                            <label for="text" class="col-form-label">متن:</label>
                            <textarea class="form-control" id="text" name="text" rows="4">{{ $slider->text }}</textarea>
                        </div>
            
                </div>
                <div class="modal-footer">
                    <button  type="submit" class="btn btn-success">بروزرسانی</button>
                    <a href="{{ route('delete-categories', $slider->id ) }}" type="button" class="btn btn-danger">حذف</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </form>

