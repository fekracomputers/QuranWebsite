<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>القرأن الكريم</title>

    <meta name="keywords"
          content="موقع القرأن الكريم , السورة {{$soraName }} , التفسير {{$tefseerName}} ">

    <meta name="description"
          content="موقع القرأن الكريم , تفسير القرأن الكريم لكثير من علماء التفسير , والكثير من المقرئين ">

    <meta name="content"
          content="{{$soraDesc}}">
    <link rel="shortcut icon" href="{{asset('/dist/img/logo.png')}}"/>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700|Lateef&amp;subset=arabic,latin-ext" rel="stylesheet">     <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/animation.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/jplayer.blue.monday.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/flipped.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/jquery.mobile.custom.structure.css')}}" rel="stylesheet">
    <script src="{{asset('dist/js/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.jplayer.js')}}"></script>
    <script src="{{asset('dist/js/jplayer.playlist.js')}}"></script>
    <script src="{{asset('dist/js/select2.js')}}"></script>
    <script src="{{asset('dist/js/jquery.mobile.custom.js')}}"></script>
    <script src="{{asset('dist/js/script.js')}}"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-62554046-5', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="/dist/img/logo-1.png" class="img-responsive img-logo" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-right">
                    <div class="row" >
                        <a href="https://play.google.com/store/apps/details?id=com.fekracomputers.quran" target="_blank">
                            <img src="{{url('dist/img/google_badge_s.png')}}" class="img-responsive play-store" alt="">
                        </a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container remove-padding">
            <div class="">
                <div class="col-sm-6 visible-xs">
                    <div class="spinner-layer text-center">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw spinner-c"></i>
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="panel panel-default panel-jid shadow">
                        <div class="panel-body no-padding">
                            <div class="col-md-4 col-sm-12 col-xs-12 no-padding">
                                <div class="qarey margin-bottom">
                                    <select class="qaryMobile form-control form-sura" id="qaryMobile" name="qary-change">
                                        @foreach($audio as $name)
                                            @if($name->id == $qaryid )
                                                <option class="qary-data" value="{{$name->id}}" selected>{{$name->name}}</option>
                                            @else
                                                <option class="qary-data" value="{{$name->id}}">{{$name->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 no-padding">
                                <div class="margin-bottom" dir="ltr">
                                    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                                    <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                                        <div class="jp-type-single">
                                            <div class="jp-gui jp-interface">
                                                <div class="jp-controls">
                                                    <button class="previous-btn btn-ele margin-top" role="button">
                                                        <img src="{{'dist/img/previous.png'}}" class="img-responsive" alt="">
                                                    </button>

                                                    <button class="jp-play margin-left" role="button" tabindex="0">
                                                        <img src="{{'/dist/img/play.png'}}" class="img-responsive" alt=""></button>
                                                    <button class="jp-pause margin-left margin-right hidden" role="button" tabindex="0">
                                                        <img src="{{'/dist/img/pause.png'}}" class="img-responsive" alt=""></button>
                                                    <button class="next-btn btn-ele margin-top" role="button">
                                                        <img src="{{'/dist/img/next.png'}}" class="img-responsive" alt="">
                                                    </button>

                                                </div>
                                                <div class="jp-progress">
                                                    <div class="jp-seek-bar">
                                                        <div class="jp-play-bar"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div id="SpinnerMobile" class="form-inline collapse">
                                {{--Sora data--}}
                                <div class="col-md-4 col-md-4 col-sm-6 col-xs-12 margin-bottom no-padding">
                                    <div  class="drop-tef form-sura input-group">
                                        <span class="input-group-addon" id="soraNumber">السورة</span>
                                        <select class="suraMobile form-control form-sura" id="suraMobile" name="sora">
                                            @foreach($sora as $row)
                                                @if($row->soraid == $soraid )
                                                    <option class="sora-id" value="{{$row->soraid}}" selected>{{$row->name}}</option>
                                                @else
                                                    <option class="sora-id" value="{{$row->soraid}}">{{$row->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{--end sora Data--}}
                                <div class="form-group col-md-4 col-sm-6 col-xs-6 margin-bottom no-padding">
                                    <div id="aya" class="drop-tef form-aya input-group">
                                        <span class="input-group-addon" id="ayaNumber"> الأية</span>
                                        <select class="form-control form-sura" id="AyaMobile" name="aya">
                                            @foreach($aya as $row)
                                                @if($row->ayaid == $ayaid )
                                                    <option class="aya-id" value="{{$row->ayaid}}" selected>{{$row->ayaid}}</option>
                                                @else
                                                    <option class="aya-id" value="{{$row->ayaid}}">{{$row->ayaid}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 col-sm-6 col-xs-6 margin-bottom no-padding">
                                    <div  class="drop-tef form-joza input-group">
                                        <span class="input-group-addon" id="jozaNumber">الجزء</span>
                                        <select class="jozaMobile form-control form-sura" id="jozaMobile" name="joza">
                                            @foreach($joza as $row)
                                                <option class="joza-id" value="{{$row->joza}}">{{$row->joza}}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <a class="btn btn-default btn-toggle" role="button" data-toggle="collapse" href="#SpinnerMobile" aria-expanded="false" aria-controls="SpinnerMobile">
                           <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>

                    </div>

                </div>

                <div class="clearfix"></div>
                {{--xs design--}}
                <br>

                <div class="col-sm-6 padding-xs">
                    <div class="quran-border">
                        <input type="hidden" value="{{csrf_token()}}" class="hidden-token">
                        <div class="">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-hazeb">الحزب رقم <span class="hezb-num"> {{$hezbid}}</span></div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-rob3">الربع رقم <span class="rob3-num"> {{$rob3id}}</span></div>
                        </div>
                        <img src="{{asset('/dist/img/border.png')}}" class="img-responsive img-border shadow" alt="quran-border">
                        <img id="img-quran" src="{{asset('/dist/images/page'.$img.'.png')}}" class="animated img-responsive img-quran" alt="{{$soraDesc}}">
                        <div class="text-center">
                            <img src="{{asset('/dist/img/page-no.png')}}" class="img-responsive img-page" alt="Page Number">
                            <h4 class="text-page">1</h4>

                        </div>
                        <input type="hidden" class="form-control in-style page-data" aria-describedby="pageNumber"  value="{{$pageid}}" placeholder="رقم الصفحة">

                    </div>
                    <button class="prev btn btn-primary hidden-xs" id="prevPage" data-id="1">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </button>
                    <button class="next btn btn-primary hidden-xs" id="nextPage" data-id="1">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="col-sm-6 padding-xs remove-padding-left">
                    <div class="spinner-layer hidden-xs text-center">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw spinner-c"></i>
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="panel panel-default panel-jid shadow hidden-xs">
                        <div class="panel-body no-padding">
                                <div class="col-md-4 col-sm-12 col-xs-12 no-padding">
                                    <div class="qarey margin-bottom">
                                        <select class="qary-change form-control form-sura" id="qary-change" name="qary-change">
                                            @foreach($audio as $name)
                                                @if($name->id == $qaryid )
                                                    <option class="qary-data" value="{{$name->id}}" selected>{{$name->name}}</option>
                                                @else
                                                    <option class="qary-data" value="{{$name->id}}">{{$name->name}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        <input type="hidden" name="qaraData" class="qaryid" value="{{$qaryid}}">
                                        <input type="hidden" name="qaraytime" class="qarytime" value="1">

                                    </div>

                                </div>
                                <div class="col-md-8 col-sm-12 col-xs-12 no-padding del-player">
                                    <div class="margin-bottom" dir="ltr">
                                        <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                                        <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                                            <div class="jp-type-single">
                                                <div class="jp-gui jp-interface">
                                                    <div class="jp-controls">
                                                        <button class="previous-btn btn-ele margin-top" role="button">
                                                            <img src="{{'/dist/img/previous.png'}}" class="img-responsive" alt="">
                                                        </button>

                                                        <button class="jp-play margin-left" role="button" tabindex="0">
                                                            <img src="{{'/dist/img/play.png'}}" class="img-responsive" alt=""></button>
                                                        <button class="jp-pause margin-left margin-right hidden" role="button" tabindex="0">
                                                            <img src="{{'/dist/img/pause.png'}}" class="img-responsive" alt=""></button>
                                                        <button class="next-btn btn-ele margin-top" role="button">
                                                            <img src="{{'/dist/img/next.png'}}" class="img-responsive" alt="">
                                                        </button>

                                                    </div>
                                                    <div class="jp-progress">
                                                        <div class="jp-seek-bar">
                                                            <div class="jp-play-bar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            <div class="clearfix"></div>
                            <div class="form-inline">
                                {{--Sora data--}}
                                <div class="col-md-4 col-md-4 col-sm-6 col-xs-8 margin-bottom no-padding">
                                    <div  class="drop-tef form-sura input-group">
                                        <span class="input-group-addon" id="soraNumber">السورة</span>
                                        <select class="sura-data form-control form-sura" id="suraData" name="sora">
                                            @foreach($sora as $row)
                                                @if($row->soraid == $soraid )
                                                    <option class="sora-id" value="{{$row->soraid}}" selected>{{$row->name}}</option>
                                                @else
                                                    <option class="sora-id" value="{{$row->soraid}}">{{$row->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="soraData" value="{{$soraid}}" class="soraid">
                                    </div>
                                </div>

                                {{--end sora Data--}}
                                <div class="form-group col-md-4 col-sm-6 col-xs-4 margin-bottom no-padding">
                                    <div id="aya" class="drop-tef form-sura input-group">
                                        <span class="input-group-addon" id="ayaNumber"> الأية</span>
                                        <select class="form-control form-sura" id="AyaData" name="aya">
                                            @foreach($aya as $row)
                                                @if($row->ayaid == $ayaid )
                                                    <option class="aya-id" value="{{$row->ayaid}}" selected>{{$row->ayaid}}</option>
                                                @else
                                                    <option class="aya-id" value="{{$row->ayaid}}">{{$row->ayaid}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        <input type="hidden" class="form-control in-style aya-data" aria-describedby="ayaNumber" value="{{$ayaid}}" placeholder="رقم الأية">

                                    </div>
                                </div>

                                <div class="form-group col-md-4 col-sm-6 col-xs-8 margin-bottom no-padding">
                                    <div  class="drop-tef form-sura input-group">
                                        <span class="input-group-addon" id="ayaNumber">الجزء</span>
                                        <select class="jozaData form-control form-sura" id="jozaData" name="tefseer">
                                            @foreach($joza as $row)
                                                <option class="joza-id" value="{{$row->joza}}">{{$row->joza}}</option>
                                            @endforeach
                                        </select>

                                        <input type="hidden" name="joza" value="{{$jozaid}}" class="jozaid">

                                    </div>


                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default shadow tefseer-table">
                        <div class="panel-heading panel-widget">
                            <div class="form-inline">
                                <select class="tefseer form-control" id="tefseer" name="tefseer">
                                    @foreach($tefseer as $row)
                                        @if($row->id == $tefseerid )
                                        <option class="tafseer-id" value="{{$row->id}}" selected>{{$row->title }} @if($row->info != '') - {{ $row->info}} @endif</option>
                                        @else
                                            <option class="tafseer-id" value="{{$row->id}}">{{$row->title}} @if($row->info != '') - {{ $row->info}} @endif</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input type="hidden" id="tefseerid" value="{{$tefseerid}}">
                            </div>

                        </div>
                        <div class="panel-body remove-padding-top">
                            <div class="scroll-table">
                                <table class="table table-striped table-hover tafseer-table">
                                    <tbody>
                                    @foreach($res as $row)
                                        <tr>
                                            <td>
                                                <p class="block-par">
                                                    {{$row->tafseer}}
                                                </p>

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
        <div class="footer">
            <nav class="navbar navbar-default no-margin-bottom">
                <p class="text-center text-footer">
                    صمم وطور بواسطة فكرة كمبيوتر  ©
                </p>
            </nav>
        </div>

    </div>

</body>
</html>