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
                        <form action="{{ route('articles.search') }}" method="GET">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="Search articles" name="query">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Search</button>
                                    <button type="submit"  class="btn btn-success waves-effect waves-light">All</button>
                                   
                                </div>
                            </div>
                        </form>
                        
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($articles->isEmpty())
                                        <tr>
                                            <td colspan="7">No results found.</td>
                                        </tr>
                                    @else
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>{{ $article->id }}</td> <td>
                                                    @if ($article->image)
                                                        <img src="{{ asset('upload/admin_images/' . $article->image) }}" alt="Article Image" width="100" height="100">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>{{ $article->name }}</td>
                                                <td>{{ $article->qantity  }}</td>
                                                <td>{{ $article->price }}da</td>
                                                <td>{{ $article->stock }}</td>
                                               
                                                <td>  
                                       <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#articleModal{{ $article->id }}" id="articleModalLabel{{ $article->id }}">view</button>  
                                               
                                       <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>

                                       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $article->id }}">Delete </button>
                                        </td>
                                    </tr>
                                   <!-- Modal  view -->
<div class="modal fade" id="articleModal{{ $article->id }}" tabindex="-1" aria-labelledby="articleModalLabel{{ $article->id }}" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="articleModalLabel{{ $article->id }}">Modal title</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h6>Name: {{ $article->name }}</h6>
    <hr>
    <p>Quantity: {{ $article-> qantity  }}</p>
    <hr>
    <p>Price: {{ $article->price }}</p>
    <hr>
    <p>Stock: {{ $article->stock }}</p>
    <hr>
    @if ($article->image)
        <p>Image: <br><center><img src="{{ asset('upload/admin_images/' . $article->image) }}" alt="Article Image" width="400"></p></center>
    @else
        <p>No Image</p>
    @endif</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- Modal delete-->
<div class="modal fade" id="exampleModal{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $article->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel{{ $article->id }}">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
Are you sur you want to delete       {{ $article->name }}  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline-block;">
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
                        </div>
                    </div>
                </div>
            </div>
        </div><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

    </div>
</div>
@endsection
