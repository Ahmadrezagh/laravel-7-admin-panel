@extends('admin.layouts.index')
@section('title' , 'Add Product')


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
                        <h4 class="mb-3 header-title">Add New Product</h4>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
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
                                                           value="{{ old('en_name') }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="product-name">Manufacturing Country (English)<span
                                                            class="text-danger">*</span></label>
                                                    <input name="en_country" type="text" id="product-name"
                                                           class="form-control @error('en_country') is-invalid @enderror"
                                                           value="{{ old('en_country') }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="product-summary">Summary Description (English)</label>
                                                    <textarea name="en_tiny_description" class="form-control"
                                                              id="product-summary"
                                                              rows="2"
                                                              placeholder="Please enter summary Description (English)">
                                                        {{ old('en_tiny_description') }}
                                                    </textarea>
                                                </div>

                                                <label for="product-summary">Full Description (English)</label>
                                                <textarea class="ckeditor" name="en_description" style="width: 450px"
                                                          id="en_editor" placeholder="English Description">
                                                    {{ old('en_description') }}
                                                </textarea>
                                            </div>
                                            <!-- End English Tab -->
                                            <!-- end about me section content -->

                                            <div class="tab-pane " id="arabic">

                                                <div class="form-group mb-3">
                                                    <label for="product-name">Product Name (Arabic)<span
                                                            class="text-danger">*</span></label>
                                                    <input name="ar_name" type="text" id="product-name"
                                                           class="form-control @error('ar_name') is-invalid @enderror"
                                                           placeholder="على سبيل المثال: تفاح"
                                                           value="{{ old('ar_name') }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="product-name">Manufacturing Country (Arabic)<span
                                                            class="text-danger">*</span></label>
                                                    <input name="ar_country" type="text" id="product-name"
                                                           class="form-control @error('ar_country') is-invalid @enderror"
                                                           value="{{ old('ar_country') }}">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="product-summary">Summary Description (Arabic)</label>
                                                    <textarea name="ar_tiny_description" class="form-control"
                                                              id="product-summary"
                                                              rows="2"
                                                              placeholder="الرجاء إدخال وصف موجز">
                                                        {{ old('ar_tiny_description') }}
                                                    </textarea>
                                                </div>

                                                <label for="product-summary">Full Description (Arabic)</label>
                                                <textarea class="ckeditor" name="ar_description" style="width: 450px"
                                                          id="ar_editor" placeholder="Arabic Description">
                                                    {{ old('ar_description') }}
                                                </textarea>
                                            </div>
                                        </div> {{--End Arabic Tab--}}


                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="card-box">

                                        <div class="form-group mb-3">
                                            <label for="product-price">Price <span class="text-danger">*</span></label>
                                            <input name="price" type="text"
                                                   class="form-control @error('price') is-invalid @enderror"
                                                   id="product-price"
                                                   placeholder="Enter Price"
                                                   value="{{ old('price') }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="product-discount">Discount</label>
                                            <input name="discount" type="text"
                                                   class="form-control @error('discount') is-invalid @enderror"
                                                   id="product-discount"
                                                   placeholder="Discount percentage between 0 and 100%"
                                                   value="{{ old('discount') }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="product-category">Units <span
                                                    class="text-danger">*</span></label>
                                            <select name="units"
                                                    class="form-control select2 @error('units') is-invalid @enderror"
                                                    id="product-category" required>
                                                <option value="0">Select</option>
                                                @foreach($units as $unit)
                                                    <option value="{{ $unit->id }}"
                                                            @if (old('units') == $unit->id) selected="selected" @endif>{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="product-category">Categories <span class="text-danger">*</span></label>
                                            <select name="categories"
                                                    class="form-control select2 @error('categories') is-invalid @enderror"
                                                    id="product-category">
                                                <option value="0">Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                            @if (old('categories') == $category->id) selected="selected" @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="mb-2">Status: </label>
                                            <br>
                                            <div class="checkbox form-check-inline">
                                                <input type="checkbox" id="isActive" value="0"
                                                       name="isActive" @if(old('isActive')) checked @endif>
                                                <label for="isActive">Deactivate Product </label>
                                            </div>
                                            <br>
                                            <div class="checkbox form-check-inline">
                                                <input name="isVip" type="checkbox" value="1" id="idVip"
                                                       @if(old('isVip')) checked @endif>
                                                <label for="idVip">VIP Product </label>
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
                                                        id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>

                                        </div>

                                        <label for="product-meta-title">Images</label>
                                        <div class="needsclick dropzone" id="document-dropzone">
                                        </div>

                                        {{--                                    </div> <!-- end col-->--}}

                                        {{--                                    <div class="card-box">--}}

                                    </div><!-- end card-box -->

                                </div> <!-- end col-->

                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Add Product
                            </button>


                        </form>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">

        $('.delete_admin').click(function () {
            var btn = $(this);
            var id = btn.data('id');
            var name = btn.data('name');
            var title = 'Are you sure you want to delete the Admin?';
            var text = 'Delete Admin :  "' + name + '"';
            var deleted_text = 'Admin  ' + name + 'Deleted ';
            delete_row(title, text, deleted_text, base_url + 'unit/post/delete', {id: id}, function () {
                $('tr[data-id="' + id + '"]').fadeOut();
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>
        $('textarea').ckeditor();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <script type="text/javascript">


        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('product.images.store') }}',
            maxFilesize: 1, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                var name = uploadedDocumentMap[file.name];
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
            init: function () {
                    @if(isset($project) && $project->document)
                var files =
                {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
@endsection
