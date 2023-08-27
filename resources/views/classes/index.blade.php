@extends('layouts.admin')
@section('page_title', 'Gestion de Classe')
@section('content')
<div class="row g-4 mb-3">
    <div class="col-sm-auto">
        <div>
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-add-line align-bottom me-1" ></i> Nouvelle classe</a>
        </div>
        
        
    </div>
    
    <div class="col-sm">
        <div class="d-flex justify-content-sm-end gap-2">
           

        </div>
    </div>
</div>

@foreach($classes as $classe)
<div class="row">
    
    <div class="col-xxl-3 col-sm-6 project-card">
        <div class="card card-height-100">
            <div class="card-body">
                <div class="d-flex flex-column h-100">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted mb-4"></p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-1 align-items-center">
                                <button type="button" class="btn avatar-xs mt-n1 p-0 favourite-btn">
                                    <span class="avatar-title bg-transparent fs-15">
                                        <i class="ri-star-fill"></i>
                                    </span>
                                </button>
                                <div class="dropdown">
                                    <button class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-sm"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href=""><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                        <a class="dropdown-item" href=""><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-soft-warning rounded p-2">
                                    <img src="assets/images/brands/slack.png" alt="" class="img-fluid p-1">
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="mb-1 fs-15"><a href="apps-projects-overview.html" class="text-dark"></a></h5>
                            <p class="text-muted text-truncate-two-lines mb-3"></p>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <div>{{$classe->nom_classe}}</div>
                            </div>
                            <div class="flex-shrink-0">
                                <div><i class="ri-list-check align-bottom me-1 text-muted"></i> 18/25</div>
                            </div>
                        </div>
                        <div class="progress progress-sm animated-progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 34%;"></div><!-- /.progress-bar -->
                        </div><!-- /.progress -->
                    </div>
                </div>

            </div>
            <!-- end card body -->
            <div class="card-footer bg-transparent border-top-dashed py-2">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="avatar-group">
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Darline Williams">
                                <div class="avatar-xxs">
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Add Members">
                                <div class="avatar-xxs">
                                    <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                        +
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="text-muted">
                            <i class="ri-calendar-event-fill me-1 align-bottom"></i>{{$classe->created_at}}
                        </div>
                    </div>

                </div>

            </div>
            <!-- end card footer -->
        </div>
        <!-- end card -->
    </div>
    
    <!-- end col -->
    </div>
    <!-- end col -->
</div>
@endforeach

<!-- Grids in modals -->

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Grid Modals</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('classes.store')}}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Nom de la classe</label>
                                <input type="text" class="form-control" id="firstName" name="nom_classe" placeholder="Nom de la classe">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Effectif</label>
                                <input type="number" class="form-control" name="effectif" id="lastName" placeholder="Effectif">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <label for="genderInput" class="form-label">Categorie</label>
                            <div>
                               <select name="categorie" id="" class="form-control">
                                   <option value="">-- Choissir un categorie --</option>
                                   @foreach($Categories as $categorie)
                                       <option value="{{$categorie->id}}">{{$categorie->nom_categorie}}</option>
                                   @endforeach
                                   
                            </select>
                        </div>
                       <br>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>





@endsection