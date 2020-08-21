<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="nav-icon fas fa-tachometer-alt"></i></a></li>
                    <li class="breadcrumb-item">{{$parent ?? ''}}</li>
                    <li class="breadcrumb-item active">{{$active ?? ''}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>