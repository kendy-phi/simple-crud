@extends('adminlte::page')

@section('title', 'Creer book')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create new book</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {{ Form::model($book, ['route'=> ['book.update', $book->id]],[ 'class'=>'horizontal_form']) }}
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        @include('partials.row_book', [
                            'name'=>'title',
                            'type'=>'text',
                            'tag'=>'title',
                            'icon'=>'fa-percent',
                        ]) 
                        @include('partials.row_book', [
                            'name'=>'isbn',
                            'type'=>'text',
                            'tag'=>'ISBN',
                            'icon'=>'fa-percent',
                        ])
                        <input type="hidden" name="id" value="{{$book->id}}">                      
                        <!-- Default switch -->
                        <div class="checkbox checkbox2button">
                            <label>
                                <input type="checkbox" name="status" id="status" {{ $book->status == '1' ? 'checked' : ''}}> aviable
                            </label>
                        </div>
                    </div>
                </div>
                {{ Form::submit('Envoyer', ['class'=>'btn btn-primary col-xs-4']) }}
            {{ Form::close() }}
        </div>
        <div class="box-footer">
                         
        </div>
    </div>

            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/adminlte/plugins/iCheck/square/blue.css') }}">
@endsection

@push('js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.js')}}"></script>
    <script>
        $(function () {
            $('#status').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endpush