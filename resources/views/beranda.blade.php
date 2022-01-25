
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beranda User</title>

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
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="content">
          <div class="card card-info card-outline">
              <div class="card-header">
                <div class="card-tools">
                  <form action="{{ url('/') }}" class="form-horizontal" method="get">
                    <div class="input-group input-group-sm mb-0">
                      <input class="form-control form-control-sm" name="keyword" placeholder="Seacrh" value="{{ request('keyword') }}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Photo Profile</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Tanggal Bergabung</th>
                  </tr>
                  @foreach($data as $item)
                  <tr>
                    <td>
                        @if ($item->foto_profile == null)
                          <span class="label label-info">Belum diUpload</span>
                        @else
                          <a href="{{ asset('img/'.$item->foto_profile) }}" target="_blank">{{ $item->foto_profile }}</a>
                        @endif
                  </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ date('d-m-Y', strtotime( $item->created_at)) }}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
              <div class="card-footer">
                {{ $data->links() }}
              </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('template.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  @include('template.scriptjs')
</body>
</html>
