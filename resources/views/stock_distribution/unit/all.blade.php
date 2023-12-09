@extends('layouts.app')

@section('style')

@endsection

@section('title')
    ইউনিট
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('stock_distribution_unit_add') }}">ইউনিট যোগ</a>
                    <hr>
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>নাম</th>
                            <th>স্ট্যাটাস</th>
                            <th>অ্যাকশন</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($units as $unit)
                            <tr>
                                <td>{{ $unit->name }}</td>
                                <td>
                                    @if ($unit->status == 1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('stock_distribution_unit_edit', ['unit' => $unit->id]) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- DataTables -->
    <script src="{{ asset('themes/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('themes/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {
            $('#table').DataTable();
        })
    </script>
@endsection
