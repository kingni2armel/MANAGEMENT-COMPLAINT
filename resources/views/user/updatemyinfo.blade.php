<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update mes informations</title>
</head>
<body>



                    @include('layout.header')
                    <div class="main-panel">
                        <div class="content-wrapper">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Modificatiion de mes informations </h4>
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

                                    <form class="forms-sample" action="{{route('UPDATEMYINFO') }}" method="POST">
                                        @csrf

                                      <div class="form-group">
                                        <label for="exampleInputCity1">Nom complet de l'utilisateur </label>
                                        <input type="text" class="form-control" name="nomuser" id="exampleInputCity1" value="{{ auth()->user()->name }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputCity1">Email de l'utilisateur </label>
                                        <input type="email" class="form-control" name="emailuser" id="exampleInputCity1" value="{{ auth()->user()->email }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputCity1">Téléphone  de l'utilisateur </label>
                                        <input type="number" class="form-control" name="phoneuser" id="exampleInputCity1"value="{{ auth()->user()->telephone }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputCity1">Mot de passe  de l'utilisateur </label>
                                        <input type="password" class="form-control" name="passworduser" id="exampleInputCity1" placeholder="Entrer le mot de passe de l'utilisateur">
                                      </div>



                                      <button type="submit" class="btn btn-primary me-2">Modifier</button>
                                      <button class="btn btn-light">Cancel</button>
                                    </form>
                                  </div>
                                </div>
                              </div>


                        </div>
                    </div>

</body>
</html>
