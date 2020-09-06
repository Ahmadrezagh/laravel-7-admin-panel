@extends('admin.layouts.index')
@section('title' , 'Add Discount Code')
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
                            <h4 class="mb-3 header-title">Add New Coupon</h4>

                            <form action="{{ route('admin.product.coupons.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Code</label>
                                    <input
                                        type="text"
                                        name="code"
                                        class="form-control @error('code') is-invalid @enderror"
                                        placeholder="Enter Coupon Code"
                                        value="{{ old('code') }}">
                                    @error('code')
                                    <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Percent</label>
                                    <input
                                        type="text"
                                        name="percent"
                                        class="form-control @error('percent') is-invalid @enderror"
                                        placeholder="Enter Percent"
                                        value="{{ old('percent') }}">
                                    @error('percent')
                                    <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Usable Number</label>
                                    <input
                                        type="text"
                                        name="usable_number"
                                        placeholder="Default Unlimited"
                                        class="form-control @error('usable_number') is-invalid @enderror"
                                    value="{{ old('usable_number') }}">
                                    @error('usable_number')
                                    <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="example-date">Expire Time</label>
                                    <input class="form-control @error('expire_time') is-invalid @enderror"
                                           id="example-date" type="date" name="expire_time">
                                    @error('expire_time')
                                    <small class="form-text text-muted alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light float-right">
                                    Create
                                </button>
                            </form>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <div class="col-lg-6">
                    <div class="card-box">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Code</th>
                                    <th>Percent</th>
                                    <th>Expire Time</th>
                                    <th>Usable Number</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coupons as $coupon)
                                    {{--                                @if($admin->id != 1 )--}}
                                    <tr data-id="{{ $coupon->id }}">
                                        <td>{{ $coupon->id }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->percent }}</td>
                                        <td>{{ $coupon->expire_time }}</td>
                                        @if($coupon->usable_number == null)
                                            <td>Unlimited Number</td>
                                        @else
                                            <td>{{ $coupon->usable_number }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('product.coupons.edit',$coupon->id) }}"
                                               class="badge badge-info">
                                                <i class="fe-edit"></i> Edit</a>

                                            <button type="button"
                                                    class="badge badge-danger waves-effect delete_coupon"
                                                    data-id="{{ $coupon->id }}" data-name="{{ $coupon->name }}"
                                                    data-toggle="tooltip" title="" data-original-title="Delete">
                                                <i class="fe-trash"></i> Delete
                                            </button>
                                        </td>

                                    </tr>
                                    {{--                                @endif--}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $coupons->links() }}
                    </div>
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
        $('.delete_coupon').click(function () {
            var btn = $(this);
            var id = btn.data('id');
            var name = btn.data('name');
            var title = 'Are you sure you want to delete the Coupon?';
            var text = 'Delete Coupon :  "' + name + '"';
            var deleted_text = 'Coupon  ' + name + 'Deleted ';
            delete_row(title, text, deleted_text, base_url + 'admin/product/coupon/delete', {id: id}, function () {
                $('tr[data-id="' + id + '"]').fadeOut();
            });
        });
    </script>


@endsection
