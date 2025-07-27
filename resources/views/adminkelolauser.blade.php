<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDataUser</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    {{-- CSS Admin --}}
    <link rel="stylesheet" href="css/admin.css">
    {{-- <link rel="stylesheet" href="css/hamburger.css"> --}}
    <link rel="stylesheet" href="css/sidebar-hamburger.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('admin.sidebar')

            {{-- Message No action 3 menit --}}
            @include('admin.massagetimeout')
            <!-- Main content -->
            <main role="main" class="col-md-10 ml-sm-auto px-4">


                {{-- Admin Profile --}}
                @include('admin.adminprofil')

                {{-- table --}}
                <div class="container">

                    {{-- Modal dan button tambah --}}
                    @include('admin.session')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="container mt-4">
                        <div class="card mb-4 border-0 shadow animate__animated animate__fadeInDown">
                            <div class="card-body text-center">
                                <i class="fas fa-user mb-3" style="font-size: 2rem; color: #7da4a1;"></i>
                                <h2 class="mb-0 font-weight-bold" style="font-size: 1.8rem;">Kelola User</h2>
                                <p class="text-muted mb-0" style="font-size: 1rem;">Pengelolaan dan informasi users</p>
                                <hr style="width: 60%; margin: 1rem auto; border-top: 2px solid #324851;">
                            </div>
                        </div>
                        @include('admin.adminkelolauser.tambahuser')

                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <h5 class="mb-0">Daftar user</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>*****</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#Modalupdate{{ $user->id }}">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <form action="{{ route('adminkelolauser.destroy', $user->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE') <!-- Menggunakan metode DELETE -->
                                                            <button class="btn btn-sm btn-danger" type="submit"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @include('admin.adminkelolauser.updateuser')
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>


    </div>
    </div>


    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>




</body>

</html>
