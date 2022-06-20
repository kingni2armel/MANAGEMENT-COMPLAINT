<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolution</title>
</head>
<body>



                    @include('layout.header')
                    <div class="main-panel">
                        <div class="content-wrapper">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Résolution </h4>


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
                                                           Commentaire de la résolution
                                                        </th>


                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                        @foreach ($resolution as $data )
                                                        <tr>
                                                            <td>
                                                              {{$data->commentaire_resolution }}
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
