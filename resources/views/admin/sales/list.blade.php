@extends('admin.component.component')
@section('header','Sales List')
@section('content')
<div class="row clearfix" >
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div id="app"></div>

        <div class="card">
            <div class="header">
                <h2>Daftar Marketing</h2>
            </div>
            <div class="body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sales Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$sale->nama}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection