<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>



                    @include('layout.header')
                <div class="main-panel">
                            <div class="content_wrapper">
                                            @if (auth()->user()->role ==='admin')
                                            <div class="tab-content tab-content-basic">
                                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                                  <div class="row">
                                                    <div class="col-sm-12">
                                                      <div class="statistics-details d-flex align-items-center justify-content-between">
                                                        <div class="">
                                                             <p class="statistics-title">Nombres d'utilisateurs</p>

                                                                            @if ($alluser->count()>0)
                                                                                <div>
                                                                                    <h3 class="rate-percentage">{{$alluser->count() }}</h3>
                                                                                </div>

                                                                            @else
                                                                            <h3 class="rate-percentage">0</h3>



                                                                          @endif
                                                        </div>

                                                        <div class="">
                                                            <p class="statistics-title">Nombres de categories</p>

                                                                           @if ($allcategorie->count()>0)
                                                                               <div>
                                                                                   <h3 class="rate-percentage">{{$allcategorie->count() }}</h3>
                                                                               </div>

                                                                           @else
                                                                           <h3 class="rate-percentage">0</h3>



                                                                         @endif
                                                       </div>

                                                       <div class="">
                                                        <p class="statistics-title">Nombres de sous categories</p>

                                                                       @if ($allsoucategorie->count()>0)
                                                                           <div>
                                                                               <h3 class="rate-percentage">{{$allsoucategorie->count() }}</h3>
                                                                           </div>

                                                                       @else
                                                                       <h3 class="rate-percentage">0</h3>



                                                                     @endif
                                                        </div>


                                                        <div class="">
                                                              <p class="statistics-title">Nombres de plaintes</p>

                                                                           @if ($allplainte->count()>0)
                                                                               <div>
                                                                                   <h3 class="rate-percentage">{{$allplainte->count() }}</h3>
                                                                               </div>

                                                                           @else
                                                                           <h3 class="rate-percentage">0</h3>



                                                                         @endif
                                                            </div>

                                                            <div class="">
                                                                <p class="statistics-title">Nombres de resolutions</p>

                                                                             @if ($allresolution->count()>0)
                                                                                 <div>
                                                                                     <h3 class="rate-percentage">{{$allresolution->count() }}</h3>
                                                                                 </div>

                                                                             @else
                                                                             <h3 class="rate-percentage">0</h3>



                                                                           @endif
                                                              </div>






                                                      </div>
                                                    </div>
                                                  </div>

                                                </div>
                                            @endif







                                            @if (auth()->user()->role ==='ordinaire')
                                            <div class="tab-content tab-content-basic">
                                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                                  <div class="row">
                                                    <div class="col-sm-12">
                                                      <div class="statistics-details d-flex align-items-center justify-content-between">
                                                        <div class="">
                                                             <p class="statistics-title">Nombres  de mes plaintes</p>

                                                                            @if ($mesplaintes->count()>0)
                                                                                <div>
                                                                                    <h3 class="rate-percentage">{{$mesplaintes->count() }}</h3>
                                                                                </div>

                                                                            @else
                                                                            <h3 class="rate-percentage">0</h3>



                                                                          @endif
                                                        </div>
{{--
                                                        <div class="">
                                                            <p class="statistics-title">Nombres de categories</p>

                                                                           @if ($allcategorie->count()>0)
                                                                               <div>
                                                                                   <h3 class="rate-percentage">{{$allcategorie->count() }}</h3>
                                                                               </div>

                                                                           @else
                                                                           <h3 class="rate-percentage">0</h3>



                                                                         @endif
                                                       </div> --}}













                                                      </div>
                                                    </div>
                                                  </div>

                                                </div>
                                            @endif
                            </div>
                </div>

</body>
</html>
