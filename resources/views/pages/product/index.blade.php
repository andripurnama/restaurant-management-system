@extends('layouts.app')
@section('title') Product | RMS @endsection
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1>Master Product</h1>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Selling Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $row = 1;
                    @endphp
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $row++ }}</td>
                            <td>{{ $product->ProductName }}</td>
                            <td>{{ $product->ProductCategory }}</td>
                            <td>{{ $product->SellingPrice }}</td>
                            <td>
                                <a href="{{ route('product.edit',['product' => $product->ProductId ]) }}" class="btn btn-success">Edit</a>
                                <button type="button" class="btn btn-danger" data-id="{{ $product->ProductId }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.btn-danger').click(function()
    {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: `/product/${id}`,
                    data: {"_token": "{{ csrf_token() }}","_method": "DELETE"},
                    success: function () {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        }).then((res) => window.location.href='/product');
                    }         
                });
            }
            });
    });
</script>
@endsection