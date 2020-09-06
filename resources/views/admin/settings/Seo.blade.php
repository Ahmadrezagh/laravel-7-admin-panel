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
                            <h4 class="mb-3 header-title">Seo Site Manager</h4>
                            <form action="{{ route('settings.seo.update' , getSettingId('seo')) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Title Website</label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control"
                                        value="{{ getSetting('seo','title') }}">
                                </div>

                                <div class="form-group">
                                    <label>Description about the website and the type of business</label>
                                    <input
                                        type="text"
                                        name="description"
                                        class="form-control"
                                        value="{{ getSetting('seo','description') }}">
                                </div>

                                <div class="form-group">
                                    <label>Url Home Page Website</label>
                                    <input
                                        type="text"
                                        name="url"
                                        class="form-control"
                                        value="{{ getSetting('seo','url') }}">
                                </div>

                                <div class="form-group">
                                    <label>Url Canonical Website</label>
                                    <input
                                        type="text"
                                        name="canonical"
                                        class="form-control"
                                        value="{{ getSetting('seo','canonical') }}">
                                </div>

                                <div class="form-group">
                                    <label>Site content such as products, articles, videos, photos and ...</label>
                                    <input
                                        type="text"
                                        name="type"
                                        class="form-control"
                                        value="{{ getSetting('seo','type') }}">
                                </div>

                                <div class="form-group">
                                    <label>Twitter Id</label>
                                    <input
                                        type="text"
                                        name="twitter_id"
                                        class="form-control"
                                        value="{{ getSetting('seo','twitter_id') }}">
                                </div>

                                <div class="form-group">
                                    <label>Url Website Logo</label>
                                    <input
                                        type="text"
                                        name="logo"
                                        class="form-control"
                                        value="{{ getSetting('seo','logo') }}">
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
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
