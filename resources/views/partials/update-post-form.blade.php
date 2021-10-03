<form class="row g-3" action="{{ route('update-post',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <label for="title" class="form-label">عنوان پست:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
    </div>

    <div class="col-md-6">
        <label for="post-type" class="form-label">نوع پست:</label>
        <select class="form-select" aria-label="Default select example" id="post-type" name="post-type">
            <option {{ $post->status == 'vip' ? 'selected' : '' }}  value="vip">ویژه</option>
            <option {{ $post->status == 'pub' ? 'selected' : '' }} value="pub">عمومی</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="tags" class="form-label">تگ ها:</label>
        <input type="text" class="form-control" id="tags" name="tags" value="{{ $stringTags }}">
    </div>

    <div class="col-md-6 ">
        <label for="formFile" class="form-label">عکس پست:</label>
        <input class="form-control" type="file" id="formFile" name="image">
    </div>

    <div class="col-md-6">
        <label for="category" class="form-label">دسته بندی :</label>
        <select class="form-select js-example-basic-multiple" name="categories[]" id="category" multiple="multiple">
            @foreach ($categories as $category )
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
    </div>
    <div class="col-md-12">
        <textarea id="basic-example test" name="body">{{ $post->body }}</textarea>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">ذخیره</button>
        <a href="{{ route('delete-post',$post) }}" class="btn btn-danger">حذف</a>
    </div>
</form>
