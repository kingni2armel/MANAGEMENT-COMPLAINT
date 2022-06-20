<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des plaintes non traités</title>
</head>
<body>



                    @include('layout.header')
                    <div class="main-panel">
                        <div class="content-wrapper">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Liste de  plaintes non traités </h4>


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
                                                            Nom de l'utilisateur
                                                         </th>

                                                         <th>
                                                            Email de l'utilisateur
                                                         </th>

                                                         <th>
                                                            Téléphone de l'utilisateur
                                                         </th>

                                                        <th>
                                                          Nom de la sous catégorie
                                                        </th>
                                                        <th>
                                                            Pays
                                                        </th>
                                                        <th>
                                                            Détail de  votre plainte
                                                        </th>

                                                        <th>
                                                            Piece jointe
                                                        </th>


                                                        <th>
                                                          Opérations
                                                        </th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                        @foreach ($listeplainte as $data )
                                                        <tr>
                                                            <td>
                                                              {{$row ++ }}
                                                            </td>

                                                            <td>
                                                                {{$data->name }}
                                                              </td>

                                                                <td>
                                                                    {{$data->email}}
                                                                 </td>
                                                                 <td>
                                                                  +237  {{$data->telephone}}
                                                                 </td>
                                                            <td>
                                                             {{$data->nom_souscategorie }}
                                                            </td>
                                                            <td>
                                                                {{ $data->pays }}
                                                            </td>

                                                            <td>
                                                                {{ $data->detail_plainte }}
                                                            </td>



                                                            <td>
                                                                {{ $data->file }}
                                                            </td>

                                                            <td>
                                                                        @if ($data->statut_plainte === 0)
                                                                                        <div class="parent">
                                                                                            <div class="parent_it">
                                                                                                <a  class = "icon-cus" href="{{route('GETPAGETRAITEPLAINTE',['id'=>$data->id])}}">  <i  title = "Modifier"class="mdi mdi-tooltip-edit"></i>                                                                                        </a>
                                                                                            </div>

                                                                                </div>

                                                                        @endif
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
