<h1 class="h2">پیام</h1>
<div class="row">
    <div class="col">
        <div class="card text-center">
            <div class="card-header">
                {{ $message->title }}
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $message->sender }}</h5>
              <p class="card-text">{{ $message->body }}</p>
              
            </div>
            <div class="card-footer">
                <a href="{{ route('messages') }}" class="btn btn-primary">بازگشت</a>
                <a href="{{ route('delete-message',$message->id) }}" class="btn btn-danger">حذف</a>
            </div>
          </div>
    </div>

</div>
