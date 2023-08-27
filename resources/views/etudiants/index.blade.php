@extends('layouts.admin')
@section('content')
<div class="row g-4 mb-3">
    <div class="col-sm-auto">
        <div>
            <a href="#" data-bs-toggle="modal" data-bs-target="#adddeals" class="btn btn-success"><i
                    class="ri-add-line align-bottom me-1"></i> {{ __('Ajouter un(e) eleve(e)') }}</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="d-flex justify-content-sm-end gap-2">
            <div class="search-box ms-2">
                <input type="text" class="form-control" placeholder="Recherche...">
                <i class="ri-search-line search-icon"></i>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12">
        <div class="card card-height-50">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title flex-grow-1 mb-0">Liste des eleves</h4>
                
                <div class="col-4">
                    <select name="" class="form-control" id="">
                        <option value=""> -- Selectionner un Categorie --</option>
                        @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->nom_categorie}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                    <select name="" class="form-control" id="">
                        <option value=""> -- Selectionner une classe --</option>
                        @foreach ($classes as $classe)
                            <option value="{{$classe->id}}">{{$classe->nom_categorie}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1"></div>
                
                <div class="flex-shrink-0">
                    <a href="#" class="btn btn-primary w-100" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                            class="ri-equalizer-fill me-1 align-bottom"> </i> Filter</a>
                    <!--button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle Right Offcanvas</button -->
                </div>
            
            </div><!-- end cardheader -->
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-centered align-middle">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th scope="col">#</th>
                                <th>Photo</th>
                                <th scope="col">Nom Eleve</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Date de Naissance</th>
                                <th scope="col">Sexe</th>
                                <th scope="col">Date d'inscription</th>
                                <th scope="col">Actions</th>
                                <th scope="col"></th>
                            </tr><!-- end tr -->
                        </thead><!-- thead -->

                        <tbody>

                            @foreach ($etudiants as $etudiant)
                                <tr>
                                    <td> {{$etudiant->id}} </td>
                                    <td class="avatar-sm bg-light rounde d p-1"> <img class="img-fluid d-block" src="{{$etudiant->photo}}" alt=""></td>
                                    <td> {{$etudiant->Nom}} </td>
                                    <td> {{$etudiant->classe->nom_classe}} </td>
                                    <td> {{$etudiant->date_naissance}} </td>
                                    <td> {{$etudiant->sexe}} </td>
                                    <td> {{$etudiant->created_at->format('d M Y')}} </td>
                                    <td> 
                                        <a href="etudiants/{{$etudiant->id}}/show" class="btn btn-info"> <i class=""></i> show</a>
                                        <a href="etudiants/{{$etudiant->id}}/edit" class="btn btn-warning">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    
                                    </td>
                                </tr>
                            @endforeach


                        </tbody><!-- end tbody -->
                    </table>
                   
                    <!-- end table -->
                </div>



            </div><!-- end card body -->
        </div><!-- end card -->
    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="adddeals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        

        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Créer un(e) éléve(e)') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('etudiant.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <label class="form-label " for="project-title-input">Nom </label>
                            <input type="text" class="form-control  @error('nom') is-invalid @enderror  "
                                name="nom" id="project-title-input" placeholder="Nom de l éléve " required>
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col">
                                <label class="form-label " for="project-title-input">Nom Pere </label>
                            <input type="text" class="form-control  @error('nom_pere') is-invalid @enderror  "
                                name="nom_pere" id="project-title-input" placeholder="Nom du pere de l éléve " required>
                            @error('nom_pere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div> 
                            <div class="col">
                                <label class="form-label " for="project-title-input">Nom Mere </label>
                            <input type="text" class="form-control  @error('nom_mere') is-invalid @enderror  "
                                name="nom_mere" id="project-title-input" placeholder="Nom de la mere de l éléve " required>
                            @error('nom_mere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-label " for="project-title-input">Tel Pere </label>
                            <input type="text" class="form-control  @error('tel_pere') is-invalid @enderror  "
                                name="tel_pere" id="project-title-input" placeholder="Tel" required>
                            @error('tel_pere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col">
                                <label class="form-label " for="project-title-input">Tel Mere </label>
                            <input type="text" class="form-control  @error('tel_mere') is-invalid @enderror  "
                                name="tel_mere" id="project-title-input" placeholder="Tel " required>
                            @error('tel_mere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col">
                                <label class="form-label " for="project-title-input">Email Pere </label>
                            <input type="text" class="form-control  @error('email_mere') is-invalid @enderror  "
                                name="email_pere" id="project-title-input" placeholder="aze@gmail.com " required>
                            @error('email_mere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col">
                                <label class="form-label " for="project-title-input">Email Mere </label>
                            <input type="text" class="form-control  @error('n_mere') is-invalid @enderror  "
                                name="email_mere" id="project-title-input" placeholder="aze@gmail.com" required>
                            @error('email_mere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="datepicker-deadline-input" class="form-label">Date de naissance</label>
                                    <input type="text"
                                        class="form-control  @error('date_naissance') is-invalid @enderror "
                                        name="date_naissance" id="datepicker-deadline-input" data-provider="flatpickr">
                                    @error('date_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <!-- Custom Radio Color -->
                                <div class="form-check form-radio-primary mb-3">
                                    <input class="form-check-input" type="radio" name="sexe" id="homme" checked>
                                    <label class="form-check-label" for="homme">
                                        Homme
                                    </label>
                                </div> <div class="form-check form-radio-primary mb-3">
                                    <input class="form-check-input" type="radio" name="sexe" id="femme" >
                                    <label class="form-check-label" for="femme">
                                        Femme
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="" id="categorieSelect" class="form-control">
                                        <option value="">Pleace select a categorie</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}} "> {{$categorie->nom_categorie}} </option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <select name="classe_id" id="classeSelect" class="form-control">
                                        <option value="">Pleace select a classe</option>
                                        @foreach($classes as $classe)
                                        <option value="{{$classe->id}} "> {{$classe->nom_classe}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" id="close-modal"
                            data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success"><i class="ri-save-line align-bottom me-1"></i>
                            Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>

</div>
<!--end modal-->


@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#categorieSelect').on('change', function() {
            var categorieId = $(this).val();
            if (categorieId) {
                // Effectuer une requête AJAX pour récupérer les classes associées à la catégorie sélectionnée
                $.ajax({
                    url: '/get-classes/' + categorieId,
                    type: 'GET',
                    success: function(data) {
                        $('#classeSelect').html('<option value="">Sélectionnez une classe</option>');
                        if (data.length > 0) {
                            $.each(data, function(key, value) {
                                $('#classeSelect').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        } else {
                            $('#classeSelect').append('<option value="">Aucune classe disponible</option>');
                        }
                    }
                });
            } else {
                $('#classeSelect').html('<option value="">Sélectionnez une classe</option>');
            }
        });
    });
</script>
@endpush