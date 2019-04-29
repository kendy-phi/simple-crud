@extends('adminlte::page')

@section('title', 'Books management')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"> <i class="fa fa-list"></i> List of books</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>ISBN</th>
                                <th>Status</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($books)
                                @foreach($books as $book)
                                    <tr>
                                    	<td>{!! $book->title !!}</td>
                                      <td>{!! $book->isbn !!}</td>
                                      <td>{!!$book->status == '1' ? 'avialable' : 'unavialable' !!}</td>
                                      <td>
                                      	<a href="{{route('book.edit',$book)}}" class="btn btn-info">Update</a>
                                      </td>                      
                                      <td>
                                      	@include('partials.form_delete',[
                                      		'url'=> route('book.destroy',$book)
                                      	])                                     
                                      </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>                   
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('book.create') }}" class="btn btn-primary">new book </a>
            </div>
        </div>
    </div>          
</div>
@endsection

@section('js')
    <script>
        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

    </script>
@endsection