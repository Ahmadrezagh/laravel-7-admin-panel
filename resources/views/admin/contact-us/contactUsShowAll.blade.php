@extends('admin.layouts.index')
@section('title' , 'Show Tickets')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th style="width: 125px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contacts as $contact)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customCheck2">
                                                        <label class="custom-control-label"
                                                               for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td><a href="javascript: void(0);"
                                                       class="text-body font-weight-bold">{{ $contact->id }}</a>
                                                </td>
                                                <td>
                                                    {{ $contact->name }}
                                                </td>
                                                <td>
                                                    {{ $contact->email }}
                                                </td>
                                                <td>
                                                    {{ $contact->subject }}
                                                </td>
                                                <td>
                                                    {{ $contact->message }}
                                                </td>
                                                <td>
                                                    @if($contact->status == 0)
                                                        <h5><span class="badge badge-danger">Not Checked</span></h5>
                                                    @else
                                                        <h5><span class="badge badge-info">Checked</span></h5>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('contact-us.show.one', $contact->id) }}"
                                                       class="action-icon"> <i
                                                            class="mdi mdi-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

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
        $('.delete_category').click(function () {
            var btn = $(this);
            var id = btn.data('id');
            var name = btn.data('name');
            var title = 'Are you sure you want to delete the Role?';
            var text = 'Delete Role :  "' + name + '"';
            var deleted_text = 'Role  ' + name + 'Deleted ';
            delete_row(title, text, deleted_text, base_url + 'category/post/delete', {id: id}, function () {
                $('tr[data-id="' + id + '"]').fadeOut();
            });
        });

        $('#customFile').on('change', function () {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection
