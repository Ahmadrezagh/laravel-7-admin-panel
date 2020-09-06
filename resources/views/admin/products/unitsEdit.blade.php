@extends('admin.layouts.index')
@section('title')
    Edit Unit {{ $unit->name }}
@endsection
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
                            <h4 class="mb-3 header-title">Edit Unit</h4>

                            <form action="{{ route('unit.update' , $unit->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name (english)</label>
                                    <input
                                        type="text"
                                        name="en_name"
                                        class="form-control @error('en_name') is-invalid @enderror"
                                        placeholder="Enter Your Full Name"
                                        value="{{ $unit->translate('en')->name }}">
                                    @error('en_name')
                                    <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name (arabic)</label>
                                    <input
                                        type="text"
                                        name="ar_name"
                                        class="form-control @error('ar_name') is-invalid @enderror"
                                        placeholder="Enter Your Full Name"
                                        value="{{ $unit->translate('ar')->name }}">
                                    @error('ar_name')
                                    <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light float-right">
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
    <script type="text/javascript">
        // $('.verify-user').click(function() {
        //     var btn = $(this);
        //     var id = btn.data('id');
        //     var name = btn.data('name');
        //     var title = 'آیا برای تایید کاربر اطمینان دارید؟';
        //     var text = 'تایید  کاربر  با نام کاربری "'+name+'"';
        //     var deleted_text = 'تایید شد';
        //     alert_row(title, text, base_url + 'user/post/verify', {id: id}, function() {
        //         $('span[data-id="'+id+'"]').removeClass();
        //         $('span[data-id="'+id+'"]').addClass('fa fa-check');
        //     });
        // });
        $('.delete_admin').click(function () {
            var btn = $(this);
            var id = btn.data('id');
            var name = btn.data('name');
            var title = 'Are you sure you want to delete the Admin?';
            var text = 'Delete Admin :  "' + name + '"';
            var deleted_text = 'Admin  ' + name + 'Deleted ';
            delete_row(title, text, deleted_text, base_url + 'admin/post/delete', {id: id}, function () {
                $('tr[data-id="' + id + '"]').fadeOut();
            });
        });
    </script>


@endsection
