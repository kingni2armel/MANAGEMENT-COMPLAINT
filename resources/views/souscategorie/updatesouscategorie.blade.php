<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la sous categorie</title>
</head>
<body>



                    @include('layout.header')
                    <div class="main-panel">
                        <div class="content-wrapper">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Modifier la sous catégorie </h4>
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

                                        @foreach ($infosouscategorie as $item )
                                                <form class="forms-sample" action="{{route('UPDATESOUSCATEGORY',['id'=>$_GET['id']]) }}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="exampleInputCity1">Type de la catégorie </label>
                                                                <select class = "form-control"name="categorie" id="">
                                                                    @foreach ($allcategorie as $data )
                                                                        <option value="{{$data->id}}">{{$data->nom_categorie }}</option>

                                                                @endforeach
                                                                </select>
                                                    </div>

                                                <div class="form-group">
                                                    <label for="exampleInputCity1">Nom de la sous catégorie </label>
                                                    <input type="text" class="form-control" name="nomsouscategorie" id="exampleInputCity1" value="{{$item->nom_souscategorie}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Commentaire de la sous catégorie</label>
                                                    <textarea class="form-control" name="commentairesouscategorie" placeholder="{{$item->commentaire_souscategorie}}" style="height: 100px !important" id="exampleTextarea1" rows=""></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary me-2">Modifier</button>
                                                <button class="btn btn-light">Cancel</button>
                                                </form>
                                        @endforeach
                                  </div>
                                </div>
                              </div>


                        </div>
                    </div>

</body>
</html>
