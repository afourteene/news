@extends('layouts.front')
@section('content')
    <div class="featurette-divider">

    </div>

    <div class="container marketing">
        <div class="row ">
            
          



            <div class="col-md-6">
                <div class="text-center">
                    <h1>تماس با ما</h1>
                    <p> شما می توانید از طریق فرمی 
                        که مشاهده می کنید با اعضای وب سایت ما در تماس باشید.
                    </p>
                    <p>
                          برای این کار از قسمت تماس با یکی از مخاطبین را انتخاب نمایید ، این مخاطبین شامل : 
                    </p>
                    <p>ادمین</p>
                    <p>پشتیبان</p>
                    <p>نویسنده</p>
                    را انتخاب نمایید.
                </div>



            </div>


            <div class="col-md-6">

                <form class="row g-3 px-auto py-auto" method="POST" action="{{ route('send') }}">
                    @csrf
                    <div class="col-md-6">
                      <label for="email" class="form-label">ایمیل :</label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-6">
                      <label for="title" class="form-label">عنوان :</label>
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                   
                    
                   
                    <div class="col-md-6>
                      <label for="inputState" class="form-label">تماس با :</label>
                      <select id="inputState" class="form-select" name="to">
                        <option selected value="admin">ادمین</option>
                        <option value="support">پشتیبان</option>
                        <option value="author">نویسنده</option>
                      </select>
                    </div>
                    <div class="col-md-12">
                        <label for="body" class="form-label">متن پیام :</label>
                        <textarea  class="form-control" name="body" id="body" cols="50" rows="5"></textarea>
                      </div>
                   
                    <div class="col-md-12 ">
                      <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                  </form>

@include('partials.alert')
@include('partials.validation-errors')
            </div>

        </div>



    </div>
    <div class="featurette-divider">

    </div>

@endsection
