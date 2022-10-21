@extends('admin.layout.master')
@section('title')
    @lang('Update City')
@endsection
@section('page-name')
    @lang('Update City')
@endsection

@section('content')
    @include('admin.city._breadcam')
    <form action="{{ route('admin.setting.social.media.update', $row['id']) }}" method="post">
        @include('admin.social_media._form', ['buttonText' => 'Update'])
    </form>
@endsection
@section('scripts')
    <script type="text/javascript"></script>
@endsection
