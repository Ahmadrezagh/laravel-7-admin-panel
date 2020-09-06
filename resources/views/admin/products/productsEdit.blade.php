@extends('admin.layouts.index')
@section('title')
    Show Product {{ $product->name }}
@endsection


@section('head')


    <style type="text/css">
        .dropzone {
            border: 2px dashed #999999;
            border-radius: 10px;
        }

        .dropzone .dz-default.dz-message {
            height: 171px;
            background-size: 132px 132px;
            margin-top: -101.5px;
            background-position-x: center;


        }

        .dropzone .dz-default.dz-message span {
            display: block;
            margin-top: 145px;
            font-size: 20px;
            text-align: center;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css"/>
@endsection




@section('content')
    <div class="content-page">
        <div class="content mt-3">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @include('admin.message')
                        </div>
                        <h4 class="mb-3 header-title">Edit Product <span
                                class="text-danger">{{ $product->name }}</span></h4>
                        <form action="{{ route('product.update' , $product->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-box">
                                        <ul class="nav nav-pills navtab-bg nav-justified">
                                            <li class="nav-item">
                                                <a href="#english" data-toggle="tab" aria-expanded="true"
                                                   class="nav-link active">
                                                    English
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#arabic" data-toggle="tab" aria-expanded="false"
                                                   class="nav-link">
                                                    Arabic
                                                </a>
                                            </li>
                                        </ul>

                                        {{--                                        English Tab--}}

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="english">
                                                <div class="form-group mb-3">
                                                    <label for="product-name">Product Name (English)<span
                                                            class="text-danger">*</span></label>
                                                    <input name="en_name" type="text" id="product-name"
                                                           class="form-control @error('en_name') is-invalid @enderror"
                                                           placeholder="e.g : Apple"
                                                           value="{{ $product->translate('en')->name }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="product-name">Manufacturing Country<span
                                                            class="text-danger">*</span></label>
                                                    <input name="en_country" type="text" id="product-name"
                                                           class="form-control @error('en_country') is-invalid @enderror"
                                                           value="{{ $product->translate('en')->country }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="product-summary">Summary Description (English)</label>
                                                    <textarea name="en_tiny_description" class="form-control"
                                                              id="product-summary"
                                                              rows="2"
                                                              placeholder="Please enter summary Description (English)">
                                                        {{ $product->translate('en')->tiny_description }}
                                                    </textarea>
                                                </div>

                                                <label for="product-summary">Full Description (English)</label>
                                                <textarea class="ckeditor" name="en_description" style="width: 450px"
                                                          id="en_editor" placeholder="English Description">
                                                    {{ $product->translate('en')->description }}
                                                </textarea>

                                            </div> <!-- end tab-pane -->
                                            <!-- end about me section content -->

                                            <div class="tab-pane " id="arabic">

                                                <div class="form-group mb-3">
                                                    <label for="product-name">Product Name (Arabic)<span
                                                            class="text-danger">*</span></label>
                                                    <input name="ar_name" type="text" id="product-name"
                                                           class="form-control @error('ar_name') is-invalid @enderror"
                                                           placeholder="على سبيل المثال: تفاح"
                                                           value="{{ $product->translate('ar')->name }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="product-name">Manufacturing Country<span
                                                            class="text-danger">*</span></label>
                                                    <input name="ar_country" type="text" id="product-name"
                                                           class="form-control @error('ar_country') is-invalid @enderror"
                                                           value="{{ $product->translate('ar')->country }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="product-summary">Summary Description</label>
                                                    <textarea name="ar_tiny_description" class="form-control"
                                                              id="product-summary"
                                                              rows="2"
                                                              placeholder="الرجاء إدخال وصف موجز">
                                                        {{ $product->translate('ar')->tiny_description }}
                                                    </textarea>
                                                </div>

                                                <label for="product-summary">Full Description (Arabic)</label>
                                                <textarea class="ckeditor" name="ar_description" style="width: 450px"
                                                          id="ar_editor" placeholder="Arabic Description">
                                                    {{ $product->translate('en')->description }}
                                                </textarea>


                                            </div>
                                        </div>


                                    {{--                                        Arabic Tab--}}

                                    <!-- end tab-pane -->
                                        <!-- end about me section content -->


                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="card-box">
                                        <div class="form-group mb-3">
                                            <label for="product-price">Price <span class="text-danger">*</span></label>
                                            <input name="price" type="text"
                                                   class="form-control @error('price') is-invalid @enderror"
                                                   id="product-price"
                                                   placeholder="Enter amount"
                                                   value="{{ $product->price }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="product-discount">Discount</label>
                                            <input name="discount" type="text"
                                                   class="form-control @error('discount') is-invalid @enderror"
                                                   id="product-discount"
                                                   placeholder="Discount percentage between 0 and 100%"
                                                   value="{{ $product->discount }}">
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="product-category">Units <span
                                                    class="text-danger">*</span></label>
                                            <select name="units"
                                                    class="form-control select2 @error('units') is-invalid @enderror"
                                                    id="product-category">
                                                <option>Select</option>
                                                @foreach($units as $unit)
                                                    <option @if($product->unit_id == $unit->id ) selected
                                                            @endif value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="product-category">Categories <span class="text-danger">*</span></label>
                                            <select name="categories"
                                                    class="form-control select2 @error('categories') is-invalid @enderror"
                                                    id="product-category">
                                                <option>Select</option>
                                                @foreach($categories as $category)
                                                    <option @if($product->category_id == $category->id ) selected
                                                            @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="mb-2">Status: </label>
                                            <br>
                                            <div class="checkbox form-check-inline">
                                                <input name="isNew" type="checkbox" value="1" id="isNew"
                                                       @if($product->isNew == 1 ) checked @endif>
                                                <label for="isNew">New Product </label>
                                            </div>
                                            <br>
                                            <div class="checkbox form-check-inline">
                                                <input type="checkbox" id="isActive" value="0"
                                                       name="isActive" @if($product->isActive == 0 ) checked @endif>
                                                <label for="isActive">Deactivate Product </label>
                                            </div>
                                            <br>
                                            <div class="checkbox form-check-inline">
                                                <input name="isVip" type="checkbox" value="1" id="isVip"
                                                       @if($product->isVip == 1 ) checked @endif>
                                                <label for="isVip">VIP Product </label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="product-meta-title">Info</label>
                                            <input name="info" type="text" class="form-control" id="product-meta-title"
                                                   placeholder="Enter Info For Product">
                                        </div>

                                        <div class="form-group mb-3">

                                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>
                                            <label>Cover Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input
                                                        type="file"
                                                        name="coverImage"
                                                        class="custom-file-input @error('coverImage') is-invalid @enderror"
                                                        id="customFile"
                                                        value="{{ $product->coverImage }}">
                                                    <label class="custom-file-label"
                                                           for="customFile">{{ $product->coverImage }}</label>
                                                </div>
                                            </div>

                                        </div>
                                        @if($product->images != null)
                                            <div class="row">
                                                @foreach(json_decode($product->images) as $image)
                                                    <span class="mr-2 mt-2"
                                                          data-name="{{ $image }}">
                                                <img class="card-box img-thumbnail"
                                                     src="{{ URL::to('/')}}/storage/product-images/{{ $image }}"
                                                     alt="--" style="height: 130px; width: 100px">
                                                <footer>
                                                    <a class="text-light btn btn-danger removeImage"
                                                       data-id="{{ $product->id }}"
                                                       data-name="{{ $image }}">Remove Image</a>
                                                </footer>
                                            </span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <br>
                                        <label for="product-meta-title">Images</label>
                                        <div class="needsclick dropzone" id="document-dropzone">
                                        </div>

                                        {{--                                    </div> <!-- end col-->--}}

                                        {{--                                    <div class="card-box">--}}
                                    </div><!-- end card-box -->

                                </div> <!-- end col-->

                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Edit Product
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <script>
        $('#customFile').on('change', function () {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
    <script>
        $(document).ready(function () {
            // keyup function looks at the keys typed on the search box
            $('.removeImage').on('click', function () {
                // the text typed in the input field is assigned to a variable
                var name = $(this).data('name');
                var productId = $(this).data('id');

                // call to an ajax function
                $.ajax({
                    // assign a controller function to perform search action - route name is search
                    url: "{{ route('product.image.delete') }}",
                    // data are sent the server
                    data: {name: name, id: productId},
                    // since we are getting data methos is assigned as GET
                    type: "get",
                    // if search is succcessfully done, this callback function is called
                    success: function (response) {
                        console.log(response);
                        // print the search results in the div called country_list(id)
                        $('span[data-name="' + name + '"]').fadeOut();
                    }
                })
                // end of ajax call
            });
        });
    </script>

    <script type="text/javascript">

        let index = 0;
        let remove = 0;
        let name_public = 'image';
        let numCallbackRuns = 0;
        var uploadedDocumentMap = {};
        var uploaded;
        Dropzone.options.documentDropzone = {
            url: '{{ route('product.images.store') }}',
            maxFilesize: 1, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input  type="hidden" name="images[]" value="' + response.name + '" >')
                uploadedDocumentMap[file.name] = response.name;
            },


            removedfile: function (file) {
                if (uploadedDocumentMap[file.name]) {
                    var name = uploadedDocumentMap[file.name];
                } else {
                    var name = '5e54cb0ba645b.png';
                }

                var token = $('[name=_token]').val();
                var dir = $('[name=dir]').val();


                $.ajax({
                    type: 'get',
                    headers: {'X-CSRF-Token': token},
                    url: '{{ route('product.image.delete') }}',
                    data: {name: name, dir: dir},
                    dataType: 'html'
                });

                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                availableImages = availableImages + 1;
            },
            {{--product: '{!! isset($product) ? json_encode($product) : '{}'  !!}',--}}
            init: function () {

                myDropzone = this;

                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: '{{route('product.image.show',$product->id)}}',

                    type: 'post',
                    data: {request: 'fetch'},

                    dataType: 'json',

                    success: function (response) {
                        // console.log(response);

                        // $.each(response, function (key, value) {
                        //
                        //     var mockFile = {name: value.name};
                        //
                        //     myDropzone.emit("addedfile", mockFile);
                        //
                        //     myDropzone.emit("thumbnail", mockFile, value.path);
                        //
                        //     myDropzone.emit("complete", mockFile);
                        //     $('form').append('<input  type="hidden" name="images[]" value="' + value.name + '" >')
                        //
                        //     uploaded[key] = value.name;
                        //
                        //
                        // });


                    }


                });
            }

        }
    </script>
@endsection
