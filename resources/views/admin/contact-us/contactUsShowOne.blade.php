@extends('admin.layouts.index')
@section('title')
    Show Ticket {{ $contact->subject }}
@endsection
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h2>Content Contact-us {{ $contact->id }}</h2>
                        <div class="table-responsive">
                            <table class="table table-centered table-borderless table-striped mb-0">
                                <tbody>
                                <tr>
                                    <td style="width: 35%;">Name</td>
                                    <td>{{ $contact->name }}</td>
                                </tr>

                                <tr>
                                    <td style="width: 35%;">Email</td>
                                    <td>{{ $contact->email }}</td>
                                </tr>

                                <tr>
                                    <td style="width: 35%;">Subject</td>
                                    <td>{{ $contact->subject }}</td>
                                </tr>

                                <tr>
                                    <td style="width: 35%;">Message</td>
                                    <td>{{ $contact->message }}</td>
                                </tr>


                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive -->
                    </div>
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
