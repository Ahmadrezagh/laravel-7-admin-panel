@extends('admin.layouts.index')
@section('title' , 'Index')
@section('head')
    <link href="{{ URL::to('/') }}/back/assets/libs/tablesaw/tablesaw.css" rel="stylesheet" type="text/css"/>

    <!-- App css -->
    <link href="{{ URL::to('/') }}/back/assets/css/app.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h3 class="mb-3">Users</h3>
                            <table class="tablesaw table mb-0" data-tablesaw-sortable data-tablesaw-sortable-switch>
                                <thead>
                                <tr>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">
                                        id
                                    </th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                        data-tablesaw-priority="3">name
                                    </th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">family</th>
                                    <th scope="col">email</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Count Orders</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Total Orders</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $id=1; ?>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->family }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->countOrders }}</td>
                                        <td>{{ $user->sumOrders }}</td>
                                    </tr>
                                    <?php $id++; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                        {{ $users->links() }}
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>

@endsection

@section('script')
    <!-- Tablesaw js -->
    <script src="{{ URL::to('/') }}/back/assets/libs/tablesaw/tablesaw.js"></script>

    <!-- Init js -->
    <script src="{{ URL::to('/') }}/back/assets/js/pages/tablesaw.init.js"></script>

@endsection
