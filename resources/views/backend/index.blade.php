@extends('backend.master')
@section('content')
<!-- Modal -->
    <div class="modal fade" id="AddNewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Content</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_inote">Save</button>
                </div>
            </div>
        </div>
    </div>
<main>
    <div class="container-fluid px-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th colspan="2" style="text-align: center">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inotes as $item => $inote)
                    <tr>
                        <td>{{ $item +1 }}</td>
                        <td>{{ $inote->title }}</td>
                        <td>{{ $inote->content }}</td>
                        <td>{{ $inote->image }}</td>
                        <td>
                            <a><button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#EditInoteModal">
                                    Edit
                                </button></a>
                        </td>
                        <td>
                            <a href=""><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</main>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection