@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 >Article Table</h1>
                        <br>
                        <br>
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="datatable_length"><label>Show <select
                                        name="datatable_length" aria-controls="datatable"
                                        class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm"
                                        onchange="changeVisibleRowCount(this.value)">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                            </div>
                        </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="Search " name="query" id="searchInput">
                                <div class="input-group-append">
                                    
                                   
                                </div>
                            </div>
                        
                        <div class="table-responsive">
                            <table class="table mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                      
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($allmultiImage->isEmpty())
                                        <tr>
                                            <td colspan="7">No results found.</td>
                                        </tr>
                                    @else
                                    @php  ($i=1)
                                        @foreach ($allmultiImage as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    @if ($item->multi_images)
                                                        <img src="{{ asset( $item->multi_images) }}" alt="Article Image" width="100" height="100">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                           
                                               
                                                <td>  

                                                    <a href="{{route('edit.MultiImage',$item->id )}}" class="btn btn-info sm"
                                                        id="edit"><i class="far fa-edit"></i></a>
                                               
                                       
                                       <a href="" class="btn btn-danger sm"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"><i class="fas fa-trash"></i></a>
                                           

                                        </td>
                                    </tr>


<!-- Modal delete-->
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
Are you sur you want to delete       {{ $item->id }}  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
       
        </form>
               </div>
      </div>
    </div>
  </div>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                <nav aria-label="Page navigation example">
                                    <ul id="pagination" class="pagination pagination-rounded"></ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
  
            
    </div>
</div>
@endsection
