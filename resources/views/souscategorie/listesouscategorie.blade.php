<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste sous categorie</title>
</head>
<body>



                    @include('layout.header')
                    <div class="main-panel">
                        <div class="content-wrapper">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Liste des sous catégories </h4>


                                                @if (session()->has('notification.message'))
                                                <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                                        {{session('notification.message')}}
                                                </div>
                                               @endif


                                               <div class="table-responsive pt-3">
                                                <table class="table table-bordered">
                                                  <thead>
                                                    <tr>
                                                        <th>
                                                          #
                                                        </th>
                                                        <th>
                                                          Nom  de la sous  catégorie
                                                        </th>

                                                        <th>
                                                          Nom  de la   catégorie
                                                        </th>
                                                        <th>
                                                          Commentaire de la sous  catégorie
                                                        </th>
                                                        <th>
                                                          Opérations
                                                        </th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                        @foreach ($listecategorie as $data )
                                                        <tr>
                                                            <td>
                                                              {{$row ++ }}
                                                            </td>
                                                            <td>
                                                             {{$data->nom_souscategorie }}
                                                            </td>
                                                            <td>
                                                                {{ $data->nom_categorie }}
                                                            </td>

                                                            <td>
                                                                {{ $data->commentaire_souscategorie}}
                                                            </td>

                                                            <td>
                                                                        <div class="parent">
                                                                                    <div class="parent_it">
                                                                                        <a  class = "icon-cus" href="{{ route('GETPAGEUPDATSOUSCATEGORY',['id'=>$data->id]) }}">  <i  title = "Modifier"class="mdi mdi-tooltip-edit"></i>                                                                                        </a>
                                                                                    </div>
                                                                                    <div style="margin-left:25px" class="parent_it">

                                                                                        <form method="POST" action="{{route('DELETESOUSCATEGORY',['id'=>$data->id])}}">
                                                                                            @csrf
                                                                                                <button type="submit"><i  title = "Supprimer"class="mdi mdi-delete"></i></button>
                                                                                        </form>
                                                                                    </div>
                                                                        </div>
                                                            </td>
                                                          </tr>
                                                        @endforeach
                                                  </tbody>
                                                </table>
                                              </div>

                                  </div>
                                </div>
                              </div>


                        </div>
                    </div>

</body>
</html>
