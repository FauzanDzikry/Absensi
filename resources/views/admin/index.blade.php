<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>data admin</title>
    @include('Template.head')
    <script src="{{ asset('Js/jam.js') }}"></script>
    <style>
        #watch {
            color: rgb(252, 150, 65);
            position: absolute;
            z-index: 1;
            height: 40px;
            width: 700px;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            font-size: 10vw;
            -webkit-text-stroke: 3px rgb(210, 65, 36);
            text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
                4px 4px 20px rgba(210, 45, 26, 0.4),
                4px 4px 30px rgba(210, 25, 16, 0.4),
                4px 4px 40px rgba(210, 15, 06, 0.4);
        }

    </style>

</head>
<body class="hold-transition sidebar-mini" onload="realtimeClock()">

    <div class="wrapper">

        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">Home</a></li>
                                <li class="breadcrumb-item active">data admin</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content-header -->

            <!-- Main content -->
            <div class="col-md-12">
              <a href="/admin/create" class="btn btn-success my-3">Tambah Data</a>
                  <div class="card">
                  
                      <div class="card-header">
                          <strong class="card-title">Data admin</strong>
                      </div>
                      <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>email</th>
                      <th>password</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($admin as $ryn)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$ryn->name}}</td>
                          <td>{{$ryn->email}}</td>
                          <td>{{$ryn->password}}</td>
                              <td>
                              <a href="admin/{{$ryn->id}}/edit" class="btn btn-warning">Edit</a>
                            <form action="admin/{{$ryn->id}}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                            
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                              </td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
                      </div>
                  </div>
              </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
      
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('Template.script')
</body>
</html>
