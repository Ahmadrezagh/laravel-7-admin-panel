@extends('admin.layouts.index')
@section('title' , 'Unit Index')
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
                            <h4 class="mb-3 header-title">Add New Unit</h4>

                            <form action="{{ route('unit.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name (english)</label>
                                    <input
                                        type="text"
                                        name="en_name"
                                        class="form-control @error('en_name') is-invalid @enderror"
                                        placeholder="Enter Your Full Name"
                                        value="{{ old('en_name') }}">
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
                                        value="{{ old('ar_name') }}">
                                    @error('ar_name')
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
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>English Name</th>
                                <th>Arabic Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($units as $unit)
                                <tr data-id="{{ $unit->id }}">
                                    <td>{{ $unit->translate('en')->name }}</td>
                                    <td>{{ $unit->translate('ar')->name }}</td>
                                    <td>
                                        <a href="{{ route('unit.edit',$unit->id) }}"
                                           class="badge badge-info">
                                            <i class="fe-edit"></i> Edit</a>

                                            <button type="button"
                                                    class="badge badge-danger waves-effect delete_admin"
                                                    data-id="{{ $unit->id }}" data-name="{{ $unit->name }}"
                                                    data-toggle="tooltip" title="" data-original-title="Delete">
                                                <i class="fe-trash"></i> Delete
                                            </button></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $units->links() }}
                </div>
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


@endsection
