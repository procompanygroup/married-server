@extends('admin.layouts.layout')
@section('breadcrumb')
    HEADER 
@endsection
@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-white" role="alert">
                {{ $message }}
            </div>
        @endif
    </div>


    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $item)
                <li class="text-danger">
                    {{ $item }}
                </li>
            @endforeach
        </ul>
    @endif

    <div class="row backgroundW p-4 m-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/setting/general') }}"> الاعدادات العامة</a></li>
                <li class="breadcrumb-item">  HEADER </li>
            </ol>
        </nav>
        <div class="form-group btn-create  justify-content-end" style="display: flex">
            <a href="{{ url('admin/setting/createhead') }}" class="btn btn-primary">جديد</a>
        </div>
        @php 
$i=0;
        @endphp
        @foreach ($List as $row)
        <form action="{{ url('admin/setting/updatehead', [$row->id]) }}" id="head-form-{{++$i}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name">الوصف</label>
                <input type="text" class="form-controll" name="name" value="{{ $row->name1 }}">
            </div>
            <div class="form-group mb-3">
                <label for="code">الكود</label>
                <textarea class="form-controll" name="code">{{ $row->value1 }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="btn" class="btn btn-primary btn-submit">حفظ</button>
            </div>
        </form>
        
        <div class="col-sm-12" style="text-align: left">
            <form method="POST" action="{{url('admin/setting/delhead', $row->id)}}" >
                @csrf
                @method('DELETE')
            <a href=""   onclick="event.preventDefault();  this.closest('form').submit();">
                <i class="fa-solid fa-trash"></i></a>                                                    
            </a>
        </form> 
    </div>
    <hr>
        @endforeach 
    </div>

    </main>
@endsection
@section('js')
    <script src="{{ URL::asset('assets/admin/js/settinginfo.js') }}"></script>
@endsection
