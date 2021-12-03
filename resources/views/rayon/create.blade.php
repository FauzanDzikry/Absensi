<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>tambah data rayon</title>
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
                                <li class="breadcrumb-item active">input data rayon</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content-header -->

            <!-- Main content -->
            <div class="col-lg-10">
                <div class="card">
                        <form method="post" action="/rayon" enctype="multipart/form-data">
                            <div class="card-title">
                                <h3 class="text-center">rayon</h3>
                            </div>
                            <hr>
                                
                            @csrf
                            <div class="card-header"><strong>Tambah</strong><small> Data</small></div>
                            <div class="card-body card-block">
                                <div class="mb-3">
                                    <label class="form-label">Nama Rayon</label>
                                    <input type="text" name="rayon" value="{{old('rayon')}}" class="form-control @error('rayon') is-invalid @enderror" placeholder="Masukan Nama Rayon">
                                    @error('rayon')
                                        <div class="invalid-feedback{{$message}}"></div>
                                    @enderror
                                    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Pembimbing</label>
                                    <input type="text" name="pembimbing_rayon" value="{{old('pembimbing_rayon')}}" class="form-control @error('pembimbing_rayon') is-invalid @enderror" placeholder="Masukan pembimbing rayon">
                                    @error('pembimbing_rayon')
                                        <div class="invalid-feedback{{$message}}"></div>
                                    @enderror
                                    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                  </div>
                                
                                  
            
                                
                                  
                    
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="/rayon" class="btn btn-danger">Kembali</a>
                    </form>
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
