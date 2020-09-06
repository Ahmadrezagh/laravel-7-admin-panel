@extends('admin.layouts.index')
@section('title' , 'Edit Head Blocks')

@section('content')
    <div class="content-page">
        <div class="content mt-3">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @include('admin.message')
                        </div>
                        <h4 class="mb-3 header-title">Block Edit</h4>
                        <form action="{{ route('settings.update' , getSettingId('Quick_Shopping')) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <label for="product-summary">Quick Shopping (English)</label>
                                        <textarea class="ckeditor" name="en_value" style="width: 450px"
                                                  id="en_editor" placeholder="English Value">
                                            @if((is_array(getSetting('Quick_Shopping'))))
                                                {{ getSetting('Quick_Shopping','en') }}
                                            @elseif(!is_array(getSetting('Quick_Shopping')))
                                            {{ getSetting('Quick_Shopping') }}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <label for="product-summary">Quick Shopping (Arabic)</label>
                                        <textarea class="ckeditor" name="ar_value" style="width: 450px"
                                                  id="en_editor" placeholder="English Value">
                                            @if(is_array(getSetting('Quick_Shopping')))
                                                {{ getSetting('Quick_Shopping','ar') }}
                                            @elseif(!is_array(getSetting('Quick_Shopping')))
                                            {{ getSetting('Quick_Shopping') }}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Edit
                            </button>


                        </form>
                        <form action="{{ route('settings.update' , getSettingId('Charity')) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <label for="product-summary">Charity (English)</label>
                                        <textarea class="ckeditor" name="en_value" style="width: 450px"
                                                  id="en_editor" placeholder="English Value">
                                            @if((is_array(getSetting('Charity'))))
                                                {{ getSetting('Charity','en') }}
                                            @elseif(!is_array(getSetting('Charity')))
                                            {{ getSetting('Charity') }}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <label for="product-summary">Charity (Arabic)</label>
                                        <textarea class="ckeditor" name="ar_value" style="width: 450px"
                                                  id="en_editor" placeholder="English Value">
                                            @if(is_array(getSetting('Charity')))
                                                {{ getSetting('Charity','ar') }}
                                            @elseif(!is_array(getSetting('Charity')))
                                            {{ getSetting('Charity') }}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Edit
                            </button>


                        </form>
                        <form action="{{ route('settings.update' , getSettingId('Delivery')) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <label for="product-summary">Delivery (English)</label>
                                        <textarea class="ckeditor" name="en_value" style="width: 450px"
                                                  id="en_editor" placeholder="English Value">
                                            @if((is_array(getSetting('Delivery'))))
                                                {{ getSetting('Delivery','en') }}
                                            @elseif(!is_array(getSetting('Delivery')))
                                            {{ getSetting('Delivery') }}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <label for="product-summary">Delivery (Arabic)</label>
                                        <textarea class="ckeditor" name="ar_value" style="width: 450px"
                                                  id="en_editor" placeholder="English Value">
                                            @if(is_array(getSetting('Delivery')))
                                                {{ getSetting('Delivery','ar') }}
                                            @elseif(!is_array(getSetting('Delivery')))
                                            {{ getSetting('Delivery') }}
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
