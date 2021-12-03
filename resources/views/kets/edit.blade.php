<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>Input data tidak hadir</title>
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
            <div class="col-lg-6">
                <div class="card">
                    <form method="post" action="/kets/{{$ket->id}}" enctype="multipart/form-data">
                        @method('patch')
                            @csrf
                            <div class="card-header"><strong>Edit</strong><small> Data</small></div>
                                <div class="card-body card-block">
                                    <div class="mb-3">
                                      <label class="form-label">Nama</label>
                                      <input type="text" name="nama" value="{{$ket->nama}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama">
                                      @error('nama')
                                          <div class="invalid-feedback{{$message}}"></div>
                                      @enderror
                                      <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NIS</label>
                                        <input type="text" name="nis" value="{{$ket->nis}}" class="form-control  @error('nis') is-invalid @enderror" placeholder="Masukan nis">
                                        @error('nis')
                                          <div class="invalid-feedback{{$message}}"></div>
                                        @enderror
                                        <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">keterangan</label>
                                        <input type="text" name="ket" value="{{$ket->ket}}" class="form-control  @error('ket') is-invalid @enderror" placeholder="Masukan ket">
                                        @error('ket')
                                          <div class="invalid-feedback{{$message}}"></div>
                                        @enderror
                                        <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                    </div>
                                    
                                    @if($ket->foto)
                                      <img src="/post-images/{{$ket->foto}}" width="75px" height="75px">
                                    @else
                                      <p>Tidak Ada Photo</p>
                                    @endif
                                    <div class="mb-3">
                                      <label class="form-label">Foto</label>
                                      <input type="file" name="foto" value="{{$ket->foto}}" class="form-control @error('foto') is-invalid @enderror" placeholder="Masukan foto">
                                      @error('foto')
                                        <div class="invalid-feedback{{$message}}"></div>
                                      @enderror
                                      <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                  </div>
                                 
                                   
                                    
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                    <a href="/kets" class="btn btn-danger">Kembali</a>
                                </form>
                            </div>
                            </div> <!-- /.content -->
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