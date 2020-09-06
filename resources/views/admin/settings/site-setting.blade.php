@extends('admin.layouts.index')
@section('title' , 'Site Setting')

@section('content')
    <div class="content-page" style="margin: 0">
        <div class="content mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @include('admin.message')
                            </div>
                            <h4 class="mb-3 header-title">تنظیمات وبسایت</h4>
                            <form action="{{ route('settings.update') }}" 
                                  method="post" enctype="multipart/form-data" >
                                @csrf
                        <input type="hidden" name="setting_name" value="{{$setting_name}}">
                                @foreach($settings as $setting)
                                @if(strpos($setting->name , 'img') > 0)
                                    <div class="form-group mt-3">
                                        <label>{{$setting->desc}}</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input value="{{$setting->value}}" type="file" class="custom-file-input" id="picture" name="{{$setting->name}}">
                                                <label class="custom-file-label" for="picture"> {{$setting->value}} </label>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label>{{ $setting->desc }}</label>
                                        <input
                                        type="text"
                                        name="{{$setting->name}}"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                placeholder="{{$setting->name}}"
                                        value="{{$setting->value}}">
                                    @error('Phone_number')
                                <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
                                        </div>
                                        
                                @endif
                                @endforeach
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    ویرایش
                                </button>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
        </div>
    </div>
@endsection
