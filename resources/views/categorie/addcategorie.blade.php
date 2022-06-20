<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout categorie</title>
</head>
<body>



                    @include('layout.header')
                    <div class="main-panel">
                        <div class="content-wrapper">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Ajouter une catégorie </h4>
                                    @if($errors->any())
                                    {
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                            <div class="text-red-500 ">
                                                        <p> {{$error}}</p>
                                            </div>
                                        @endforeach
                                        </div>

                                    }


                           @endif

                           @if (session()->has('notification.message'))
                           <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                   {{session('notification.message')}}
                           </div>
                      @endif

                                    <form class="forms-sample" action="{{route('ADDCATEGORY') }}" method="POST">
                                        @csrf

                                      <div class="form-group">
                                        <label for="exampleInputCity1">Nom de la catégorie </label>
                                        <input type="text" class="form-control" name="nomcategorie" id="exampleInputCity1" placeholder="Entrer le nom de la catégorie">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleTextarea1">Commentaire de la catégorie</label>
                                        <textarea class="form-control" name="commentairecategorie" style="height: 100px !important" id="exampleTextarea1" rows=""></textarea>
                                      </div>
                                      <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                                      <button class="btn btn-light">Cancel</button>
                                    </form>
                                  </div>
                                </div>
                              </div>


                        </div>
                    </div>

</body>
</html>
