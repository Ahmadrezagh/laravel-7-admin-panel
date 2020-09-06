@extends('admin.layouts.index')
@section('title' , 'داشبورد')
@section('page-titr' , 'داشبورد')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-4">
                        <div class="avatar-lg rounded-circle shadow-lg bg-primary border-primary border">
                            <i class="mdi mdi-video font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">50</span></h3>
                            <p class="text-muted mb-1 text-truncate">تعداد ویدیو های بلاگ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-4">
                        <div class="avatar-lg rounded-circle shadow-lg bg-success border-success border">
                            <i class="mdi mdi-play-box-outline font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">11</span></h3>
                            <p class="text-muted mb-1 text-truncate">تعداد بازدید ها</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-4">
                        <div class="avatar-lg rounded-circle shadow-lg bg-info border-info border">
                            <i class="mdi mdi-view-day font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">20</span></h3>
                            <p class="text-muted mb-1 text-truncate">تعداد کانال ها</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-4">
                        <div class="avatar-lg rounded-circle shadow-lg bg-blue border-blue border">
                            <i class="fe-users font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">2</span></h3>
                            <p class="text-muted mb-1 text-truncate">تعداد کاربران</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-12">
            <div class="card-box">
                <h4 class="header-title mb-3">آخرین ویویدهای آپلود شده</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-centered m-0">

                        <thead class="thead-light">
                        <tr>
                            <th>id کاربر</th>
                            <th>نام کاربر</th>
                            <th>نام ویدیو</th>
                            <th>زمان ویدیو</th>
                            <th>فرمت ویدیو</th>
                            <th>تاریخ آپلود</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-soft-pink">موردی یافت نشد</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->


        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title mb-3">آخرین تیکت های پشتیبانی</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-centered m-0">

                        <thead class="thead-light">
                        <tr>
                            <th colspan="2">کاربر</th>
                            <th>تاریخ</th>
                            <th>وضعیت</th>
                            <th>جزئیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="p-0">
                                <img src="{{ URL::to('/') }}/back/assets/images/users/user-1.jpg" alt="contact-img" title="contact-img"
                                     class="rounded-circle avatar-sm">
                            </td>

                            <td>
                                <h5 class="m-0 font-weight-normal">mohammad mortezaie</h5>
                                <p class="mb-0 text-muted"><small>test</small></p>
                            </td>

                            <td>
                                5 اسفند 1398 ساعت 16:48
                            </td>


                            <td>
                                <span class="p-1 badge bg-pink text-white shadow-none">پاسخ کاربر</span>
                            </td>

                            <td>
                                <a href="http://hifitapp.com/admin/support/1" data-toggle="tooltip" title=""
                                   class="btn btn-xs btn-secondary" data-original-title="جزئیات"><i
                                        class="mdi mdi-comment-multiple-outline"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-0">
                                <img src="{{ URL::to('/') }}/back/assets/images/users/user-1.jpg" alt="contact-img" title="contact-img"
                                     class="rounded-circle avatar-sm">
                            </td>

                            <td>
                                <h5 class="m-0 font-weight-normal">mohammad mortezaie</h5>
                                <p class="mb-0 text-muted"><small>test</small></p>
                            </td>

                            <td>
                                5 اسفند 1398 ساعت 16:48
                            </td>


                            <td>
                                <span class="p-1 badge bg-warning text-white shadow-none">نیاز به بررسی</span>
                            </td>

                            <td>
                                <a href="http://hifitapp.com/admin/support/2" data-toggle="tooltip" title=""
                                   class="btn btn-xs btn-secondary" data-original-title="جزئیات"><i
                                        class="mdi mdi-comment-multiple-outline"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title mb-3">آخرین افرادی که ثبت نام کرده اند</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-centered m-0">

                        <thead class="thead-light">
                        <tr>
                            <th>عکس کاربر</th>
                            <th>نام کاربر</th>
                            <th>هدف از تمرین</th>
                            <th>ترجیح مکان تمرین</th>
                            <th>تاریخ عضویت</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td>
                                <img src="{{ URL::to('/') }}/back/assets/images/users/user-1.jpg" width="40px" class="rounded">
                            </td>

                            <td>
                                <h5 class="m-0 font-weight-normal">mohammad mortezaie</h5>
                            </td>
                            <td>
                                <h5 class="m-0 font-weight-normal">هدف</h5>
                            </td>
                            <td>
                                <h5 class="m-0 font-weight-normal">شسیشسیش</h5>
                            </td>

                            <td>
                                2020-02-24 16:24:13
                            </td>


                            <td>
                                <span class="badge bg-soft-success text-success p-2">فعال</span>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <img src="{{ URL::to('/') }}/back/assets/images/users/user-1.jpg" width="40px" class="rounded">
                            </td>

                            <td>
                                <h5 class="m-0 font-weight-normal">mohammad mortezaie</h5>
                            </td>
                            <td>
                                <h5 class="m-0 font-weight-normal">هدف</h5>
                            </td>
                            <td>
                                <h5 class="m-0 font-weight-normal">شسیشسیش</h5>
                            </td>

                            <td>
                                2020-02-24 16:23:17
                            </td>


                            <td>
                                <span class="badge bg-soft-success text-success p-2">فعال</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <!-- Chart JS -->
    <script src="{{ URL::to('/') }}/back/assets/libs/chart-js/Chart.bundle.min.js"></script>

@endsection
