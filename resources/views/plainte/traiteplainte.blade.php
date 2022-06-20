<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement de la plainte</title>
</head>
<body>



                    @include('layout.header')
                    <div class="main-panel">
                        <div class="content-wrapper">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Traitementd  de la plainte </h4>
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

                                            @foreach ($plainte as $item )
                                                    <form class="forms-sample" action="{{route('TRAITEPLAINTE',['id'=>$item->id]) }}" method="POST">
                                                        @csrf


                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Commentaire du traitement</label>
                                                        <textarea class="form-control" name="commentaire_traitement" style="height: 100px !important" id="exampleTextarea1" rows=""></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary me-2">Traiter</button>
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
