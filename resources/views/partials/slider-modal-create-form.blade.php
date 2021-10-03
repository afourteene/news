<form action="{{ route('slider-create') }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="modal-create" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اسلایدر جدید</h5>
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
                        <textarea class="form-control" id="text" name="text" rows="4"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">ایجاد</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
