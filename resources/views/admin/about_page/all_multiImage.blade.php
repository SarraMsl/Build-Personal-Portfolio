@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">MuliImage Table</h4>
                        <p class="card-title-desc">
                        </p>

                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
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
                                <div class="col-sm-12 col-md-6">
                                    <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                class="form-control form-control-sm" placeholder=""
                                                aria-controls="datatable" id="searchInput"></label></div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dataTable"
                                        class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1" style="width: 194.2px;"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 293.2px;"
                                                    aria-label="Position: activate to sort column ascending">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                    colspan="1" style="width: 141.2px;"
                                                    aria-label="Office: activate to sort column ascending">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($allmultiImage->isEmpty())
                                                <tr>
                                                    <td colspan="7">No results found.</td>
                                                </tr>
                                            @else
                                                @php($i = 1)
                                                @foreach ($allmultiImage as $item)
                                                    <tr class="even">
                                                        <td class="sorting_1 dtr-control">{{ $i++ }}</td>
                                                        <td>
                                                            @if ($item->multi_images)
                                                                <img src="{{ asset($item->multi_images) }}" width="100"
                                                                    height="100">
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        <td>


                                                        <a href="{{route('item.destroy',$item->id )}}" class="btn btn-danger sm"
                                                      id="delete"><i class="fas fa-trash"></i></a>
                                                         

                                                      <a href="{{route('edit.MultiImage',$item->id )}}" class="btn btn-info sm"
                                                        id="edit"><i class="far fa-edit"></i></a>


                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>






                      
                    </div> <!-- end col -->
                    <div class="d-flex justify-content-center mt-3">
                        <nav aria-label="Page navigation example">
                            <ul id="pagination" class="pagination pagination-rounded"></ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>


    </div>
    </div>
@endsection
