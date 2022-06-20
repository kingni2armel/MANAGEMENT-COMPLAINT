<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une plainte</title>
</head>
<body>



                    @include('layout.header')
                    <div class="main-panel">
                        <div class="content-wrapper">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Créér une plainte </h4>
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

                                    <form class="forms-sample" action="{{route('ADDPLAINTE') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputCity1">Type de la sous catégorie </label>
                                                    <select class = "form-control"name="souscategorie" id="">
                                                                @foreach ($allsouscategorie as $data )
                                                                    <option value="{{$data->id}}">{{$data->nom_souscategorie }}</option>

                                                                @endforeach
                                                    </select>
                                          </div>

                                      <div class="form-group">
                                        <label for="exampleInputCity1">Pays </label>
                                        <input type="text" class="form-control" name="pays" id="exampleInputCity1" placeholder="Entrer le nom du pays">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleTextarea1">Commentaire de la plainte </label>
                                        <textarea class="form-control" name="commentaire" style="height: 100px !important" id="exampleTextarea1" rows=""></textarea>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputCity1">Piece jointe </label>
                                        <input type="file" name="piece" class="form-control" id="exampleInputCity1">
                                      </div>
                                      <button type="submit" class="btn btn-primary me-2">Créér la plainte</button>
                                      <button class="btn btn-light">Cancel</button>
                                    </form>
                                  </div>
                                </div>
                              </div>


                        </div>
                    </div>

</body>
</html>
