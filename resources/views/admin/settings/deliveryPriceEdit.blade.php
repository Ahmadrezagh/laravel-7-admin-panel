@extends('admin.layouts.index')
@section('title' , 'Edit Delivery Price')

@section('content')
    <div class="content-page">
        <div class="content mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @include('admin.message')
                            </div>
                            <h4 class="mb-3 header-title">Delivery Price Edit</h4>
                            <form action="{{ route('settings.update.delivery.price' , getSettingId('deliveryPrice')) }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Price To Limit: </label>
                                    <input
                                        type="text"
                                        name="limitPrice"
                                        class="form-control @error('deliveryPrice') is-invalid @enderror"
                                        @if(is_array(getSetting('deliveryPrice')))
                                            value="{{ getSetting('deliveryPrice','limitPrice') }}"
                                        @elseif(!is_array(getSetting('deliveryPrice')))
                                        value="{{ getSetting('deliveryPrice') }}"
                                        @endif>
                                    @error('deliveryPrice')
                                    <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>The Cost Of The Courier: </label>
                                    <input
                                        type="text"
                                        name="deliveryPrice"
                                        class="form-control @error('deliveryPrice') is-invalid @enderror"
                                        @if(is_array(getSetting('deliveryPrice')))
                                            value="{{ getSetting('deliveryPrice','deliveryPrice') }}"
                                        @elseif(!is_array(getSetting('deliveryPrice')))
                                        value="{{ getSetting('deliveryPrice') }}"
                                        @endif>
                                    @error('deliveryPrice')
                                    <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
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
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>
        $('textarea').ckeditor();
    </script>
@endsection
