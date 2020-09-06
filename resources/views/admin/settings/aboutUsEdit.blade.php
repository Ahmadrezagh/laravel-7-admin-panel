@extends('admin.layouts.index')
@section('title' , 'Edit About-Us')

@section('content')
    <div class="content-page">
        <div class="content mt-3">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @include('admin.message')
                        </div>
                        <h4 class="mb-3 header-title">About Us Edit</h4>
                        <form action="{{ route('settings.update' , getSettingId('About_Us')) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <label for="product-summary">About Us Text (English)</label>
                                        <textarea class="ckeditor" name="en_value" style="width: 450px"
                                                  id="en_editor" placeholder="English Value">
                                            @if(is_array(getSetting('About_Us')))
                                                {{ getSetting('About_Us','en') }}
                                            @elseif(!is_array(getSetting('About_Us')))
                                            {{ getSetting('About_Us') }}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <label for="product-summary">About Us Text (Arabic)</label>
                                        <textarea class="ckeditor" name="ar_value" style="width: 450px"
                                                  id="en_editor" placeholder="Arabic Value">
                                            @if(is_array(getSetting('About_Us')))
                                                {{ getSetting('About_Us','ar') }}
                                            @elseif(!is_array(getSetting('About_Us')))
                                            {{ getSetting('About_Us') }}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Edit
                            </button>


                        </form>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>
        $('textarea').ckeditor();
    </script>
@endsection
