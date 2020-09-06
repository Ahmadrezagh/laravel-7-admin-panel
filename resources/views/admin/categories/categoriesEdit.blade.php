@extends('admin.layouts.index')
@section('title')
    دسته بندی {{ $category->name }}
@endsection

@section('page-titr')
    دسته بندی {{ $category->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.message')
                    <form class="myForm needs-validation categoryForm" action="{{ route('category.update' , $category->id) }}"
                          method="post" novalidate="">
                        @csrf
                        <div class="row justify-content-end">

                            <div class="col-md-12 mt-3">
                                <div class="input-field">
                                    <label for="firstname">
                                        <p class="m-0"> نام دسته بندی </p>
                                    </label>
                                    <input placeholder="نام دسته بندی" class="form-control" name="name" type="text"
                                           id="firstname" value="{{ $category->name }}" required="">
                                    <div class="valid-tooltip">
                                        نام معتبر می باشد
                                    </div>
                                    <div class="invalid-tooltip">
                                        لطفا نام را وارد کنید
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h5> دسته مادر</h5>
                                <div class="dropdown bootstrap-select rounded">
                                    <select class="selectpicker rounded"
                                            name="parent_id"
                                            data-style="btn-light"
                                            tabindex="-98">
                                        @if($category->parent_id == null)
                                            <option selected="" value="">انتخاب دسته مادر</option>
                                        @else
                                            <option selected="" value="{{ $category->id }}">
                                                {{ \App\Category::find($category->parent_id)->name }}
                                            </option>
                                        @endif
                                        @foreach($categories as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
