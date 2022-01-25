
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit - Data User</title>

  @include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.sitebar')

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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="card card-info card-outline">
        <div class="card-header">
          <h3>Edit Data User</h3>
        </div>
          <div class="card-body">
            <form class="" action="{{ url('user/'.$data->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="_method" value="PATCH">
              <div class="form-group">
                <input type="text" id="nama" name="name" class="form-control" placeholder="User" value="{{ $data->name}}">
                @error('name')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ $data->email}}">
                @error('email')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Pegawai">{{ $data->alamat}}</textarea>
                @error('alamat')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" id="no_hp" name="no_telp" class="form-control" value="{{ $data->no_telp}}">
                @error('no_hp')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Kosongi Password Jika Tidak Ingin Diganti" value="">
                @error('password')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <input class="form-control" name="foto_profile" type="file" id="foto_profile">
                @error('foto_profile')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <img src="{{ asset('img/'.$data->foto_profile) }}" width="30%" height="20%" alt="">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
              </div>
            </form>
          </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('template.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  @include('template.scriptjs')
</body>
</html>
