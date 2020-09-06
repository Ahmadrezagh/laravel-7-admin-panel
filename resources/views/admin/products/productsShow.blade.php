@extends('admin.layouts.index')
@section('title' , 'Show All Products')


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
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Products</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="form-inline" method="get">
                                        <div class="form-group">
                                            <label for="inputPassword2" class="sr-only">Search</label>
                                            <input name="search" type="search" class="form-control" id="inputPassword2"
                                                   value="{{request()->get('search')}}" placeholder="Search...">
                                        </div>
                                        <div class="form-group mx-sm-3">
                                            <label for="status-select" class="mr-2">Sort By</label>
                                            <select name="sort" class="custom-select" id="filter-select">
                                                <option selected="" value="">All</option>
                                                <option value="en_name">English Name</option>
                                                <option value="category">Category</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            <span class="fe-search"></span>
                                            Search
                                        </button>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-lg-right mt-3 mt-lg-0">
                                        <a href="{{ route('product.create') }}"
                                           class="btn btn-danger waves-effect waves-light"><i
                                                class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                                    </div>
                                </div><!-- end col-->
                            </div> <!-- end row -->
                        </div> <!-- end card-box -->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-6 col-xl-3" data-id="{{ $product->id }}">
                            <div class="card-box product-box">

                                <div class="product-action">
                                    <a href="{{ route('product.edit' , $product->id) }}"
                                       class="btn btn-success btn-xs waves-effect waves-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                    <button
                                        type="button"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-toggle="tooltip" title="" data-original-title="Delete"
                                        class="btn btn-danger btn-xs waves-effect waves-light delete_product">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>

                                <div>
                                    <img src="{{ URL::to('/') }}/storage/product-images/{{ $product->coverImage }}"
                                         alt="product-pic" class="img-fluid">
                                </div>

                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <h5 class="font-16 mt-0 sp-line-1"><a
                                                    href="ecommerce-prduct-detail.html"
                                                    class="text-dark">{{ $product->name }}</a>
                                            </h5>
                                            <div class="text-warning mb-2 font-13">
                                                @if(empty($product->category->name))
                                                    null
                                                @else
                                                    {{ $product->category->name }}
                                                @endif
                                            </div>
                                            <h5 class="m-0"><span
                                                    class="text-muted"> {{ $product->tiny_description }}</span></h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="product-price-tag small">
                                                {{ $product->price }}
                                            </div>
                                            <h5><span
                                                    class="small text-muted">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->isoFormat('MMMM DD YYYY') }} </span>
                                            </h5>
                                        </div>
                                    </div> <!-- end row -->
                                </div> <!-- end product info-->
                            </div> <!-- end card-box-->
                        </div>
                @endforeach<!-- end col-->

                </div>
                <!-- end row-->


                <div class="row">

                </div>
                <!-- end row-->

            </div> <!-- container -->

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.delete_product').click(function () {
            var btn = $(this);
            var id = btn.data('id');
            var name = btn.data('name');
            var title = 'Are you sure you want to delete the Product?';
            var text = 'Delete Product :  "' + name + '"';
            var deleted_text = 'Product  ' + name + 'Deleted ';
            delete_row(title, text, deleted_text, base_url + 'product/post/delete', {id: id}, function () {
                $('div[data-id="' + id + '"]').fadeOut();
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
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="images[]"][value="' + name + '"]').remove()
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
