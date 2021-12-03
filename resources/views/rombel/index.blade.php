<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>rombel</title>
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
                                <li class="breadcrumb-item active">input keterangan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content-header -->

            <!-- Main content -->
    <div class="col-8" style="margin-left:50px">
        <br>
        <div class="col-md-12">
        @if (session('status'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            {{session('status')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
        <h3>Rombel</h3>
        <div class="card-body">
            <div class="card w-60">
              <div class="card-body">
                <h5 class="card-title">Tambah Data</h5>
                <p class="card-text">Klik Tambah Data untuk menambahkan data.</p>
                <a href="/rombel/create" class="btn btn-success my-3">Tambah Data</a>
              </div>
            </div>
              
    
    <ul class="list-group">
    @foreach ($rombel as $klnk)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        
        {{$klnk->rombel}}   
        
        
        
          <form action="/rombel/{{$klnk->id}}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="/rombel/{{$klnk->id}}/edit" class="btn btn-secondary">Edit</a>
          </form>
          
       
    </li>
    
    @endforeach
    </ul>  
    
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
