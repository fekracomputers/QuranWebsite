$(document).ready(function(){

    if(screen.width < 768){
        $("#tefseer").select2({
            dir: "rtl",
            minimumResultsForSearch: -1
        });
    }
    else{
        $("#tefseer").select2({
            dir: "rtl",
        });
    }
    $("#suraData").select2({
        dir: "rtl",
    });
    $("#AyaData").select2({
        dir: "rtl",
    });
    $("#jozaData").select2({
        dir: "rtl",
    });
    $(".qary-change").select2({
        dir: "rtl",
    });

    $("#suraMobile").select2({
        dir: "rtl",
        minimumResultsForSearch: -1
    });
    $("#AyaMobile").select2({
        dir: "rtl",
        minimumResultsForSearch: -1
    });
    $("#jozaMobile").select2({
        dir: "rtl",
        minimumResultsForSearch: -1
    });
    $("#qaryMobile").select2({
        dir: "rtl",
        minimumResultsForSearch: -1
    });

    /*Function To change Page And Change Tefseer and Audio Get page ID*/
    function GetPage(id ,SoraId , AyaSelector , playStatus ){
        var PageId = id ;
        /*show Spinner Befor Loading Data*/
        $('.spinner-layer').css('display','block');
        $('#SpinnerMobile').on('shown.bs.collapse', function () {
           $('.spinner-layer').addClass('custom-spinner');
        });
        setTimeout(function(){
            if(id!=0){
                $('#nextPage').data('id',id);
                $('#prevPage').data('id',id);
                $('.text-page').text(id);

                $(this).data('id',id);
                if(id < 10){
                    id = '00'+id ;
                }else if (id < 100){
                    id = '0'+id ;
                }else{
                    id = id ;
                }

                $('.img-quran').fadeOut(400);

                setTimeout(function(){
                    $('.img-quran').attr('src','/dist/images/page'+id+'.png');
                },300);

                setTimeout(function(){
                    $('.img-quran').fadeIn(300);
                },400);
                var path = '/page/'+PageId+'/'+SoraId ;

                var tef = $('#tefseerid').val();

                var tefPath = '/tafseer/'+tef+'/'+PageId ;

                /*Load Tafseer Page */
                $.ajax({
                    type: 'GET',
                    url: tefPath,
                    success: function (res) {
                        $('.tafseer-table').html('');
                        $.each(res,function(key , val){

                            $(".tafseer-table").append("<tr><td>" +
                                "<p class='block-par'>" +
                                val.tafseer + "</p></div>");

                        });
                    }
                });

                /*Load Ayat and Sora and Joza Data*/
                $.ajax({
                    type: 'GET',
                    url: path,
                    success: function (res) {
                        $('.jozaid').val(res[0].joza);
                        $('.soraid').val(res[0].soraid);
                        $('#select2-jozaData-container').text(res[0].joza);
                        $('#select2-jozaMobile-container').text(res[0].joza);
                        $("#jozaData").val(res[0].joza).trigger('change');
                        $("#jozaMobile").val(res[0].joza).trigger('change');

                        $('#suraData').attr('data-id',res[0].soraid);
                        $('#suraMobile').attr('data-id',res[0].soraid);

                        $('#select2-suraData-container').text(res[0].soraid);
                        $('#select2-suraMobile-container').text(res[0].soraid);
                        $("#suraData").val(res[0].soraid).trigger('change');
                        $("#suraMobile").val(res[0].soraid).trigger('change');

                        $('.hezb-num').text(res[0].hezb);
                        $('.rob3-num').text(res[0].quarter);

                        if(AyaSelector == 'null'){
                            var aya = res[0].ayaid ;
                        }
                        else{
                            aya = AyaSelector ;
                        }
                        $('.aya-data').val(aya);
                        ayaList(res[0].soraid);

                        $('.page-data').val(res[0].page);
                        ChangeAudio(PageId ,playStatus , AyaSelector);
                        var qary = $('.qaryid').val() ;
                        $.ajax({
                            type:"GET",
                            url : "/setUserData/"+PageId+"/"+res[0].soraid+"/"+aya+"/"+res[0].hezb+"/"+res[0].quarter+"/"+res[0].joza+"/"+tef+"/"+qary,
                            success:function(res){
                            }

                        });

                    }
                });
            }
            /*Hide Spinner Befor Loading Data*/
        },25);
    }

    /*Change audio Get Page ID*/
    function ChangeAudio(id ,status ,ayaSelector){
        //Get Qary id
        $("#jquery_jplayer_1").jPlayer("destroy");
        $("#jquery_jplayer_1").jPlayer("clearMedia");
        var qaryId = $('.qaryid').val();
        $('.spinner-layer').css('display','block');

        if(qaryId != 0){
                var suraData = $('.soraid').val();
                var AyaId =  $('.aya-data').val();
                var AyaSelector = ayaSelector ;
                var Status = status ;
                //Get Qary Audio
                $.ajax({
                    url : "/audio/"+qaryId,
                    type:"GET",
                    success: function (data) {
                        var audioUrl = data[0].url ;
                        $( ".next-btn").unbind( "click" );
                        $( ".previous-btn").unbind( "click" );
                        //Check Audio Type
                        if(data[0].audiotype == 0){
                            suraData = $('.soraid').val();
                            AyaId = $('.aya-data').val();
                            var ayaDir = parseInt(AyaId) ;
                            var Status = status ;
                            $.ajax({
                                url:'/getPage/'+id+'/'+AyaId+'/'+suraData,
                                type:'GET',
                                success: function (res) {
                                    var audioData = res ;
                                    var ayaDuration = [] ;
                                    $("#jquery_jplayer_1").jPlayer({
                                        ready:function(){
                                            $('.spinner-layer').fadeOut(400);
                                        },
                                        ended: function (event) {
                                            ayaDir = ayaDir + 1 ;
                                            ayaDuration.push(1);
                                            $('#select2-AyaData-container').text(ayaDir);
                                            $('#select2-AyaMobile-container').text(ayaDir);
                                            $("#AyaData").val(ayaDir).trigger('change');
                                            $("#AyaMobile").val(ayaDir).trigger('change');
                                            $('.aya-data').val(ayaDir);
                                            if(ayaDuration.length == audioData.length){
                                                var id = parseInt($('#nextPage').data('id')) +1 ;
                                                $("#jquery_jplayer_1").jPlayer("stop");
                                                if(id <= 604){
                                                    GetPage(id,'null', 'null' ,'play' );
                                                }
                                                else{
                                                    GetPage(1,'null', 'null' ,'stop' );

                                                }
                                            }

                                        },
                                    });
                                    var myPlaylist = new jPlayerPlaylist({
                                        jPlayer: "#jquery_jplayer_1",
                                        cssSelectorAncestor: "#jp_container_1"
                                    });
                                    myPlaylist.option("enableRemoveControls", true); // Set option
                                    myPlaylist.remove();
                                    myPlaylist.setPlaylist([]);
                                    var ayaSuraAudio = getIdNumber(suraData) +getIdNumber(AyaSelector) + ''+ '.mp3' ;
                                    for(var j = 0 ; j <  audioData.length ; j++){
                                        myPlaylist.add({
                                            mp3: audioUrl+"/"+audioData[j]+"",
                                        });
                                        if( ayaSuraAudio == audioData[j]){
                                            myPlaylist.select(j) ;
                                        }
                                    }
                                    myPlaylist.play();
                                    if(Status == 'stop'){
                                        $("#jquery_jplayer_1").jPlayer("stop");
                                    }else{
                                        Status = 'play';
                                    }
                                    var clickNext = 1 ;
                                    $('.next-btn').on('click',function(){
                                        clickNext = clickNext + 1 ;
                                        if(audioData.length < clickNext) {
                                            var id = parseInt($('#nextPage').data('id')) + 1;
                                            $("#jquery_jplayer_1").jPlayer("pause");
                                            if(id < 605){
                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                    Status = 'stop' ;
                                                }else{
                                                    Status = 'play' ;
                                                }

                                                GetPage(id, 'null', 'null', Status);
                                            }
                                        }
                                        if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                            myPlaylist.next();
                                            $("#jquery_jplayer_1").jPlayer("stop");
                                            Status = 'stop' ;
                                        }else{
                                            myPlaylist.next();
                                            Status = 'play' ;
                                        }
                                        var SuraId = $('.soraid').val();
                                        $.ajax({
                                            url:'/getAyatSura/'+SuraId ,
                                            type:'GET',
                                            success:function(data){
                                                if(data.length > ayaDir){
                                                    ayaDir = ayaDir + 1 ;
                                                    ayaDuration.push(1);
                                                    $('#select2-AyaData-container').text(ayaDir);
                                                    $('#select2-AyaMobile-container').text(ayaDir);
                                                    $("#AyaData").val(ayaDir).trigger('change');
                                                    $("#AyaMobile").val(ayaDir).trigger('change');
                                                    $('.aya-data').val(ayaDir);

                                                }
                                            }
                                        });

                                    });
                                    $('.previous-btn').on('click',function(){
                                        ayaDir = ayaDir - 1 ;
                                        if( ayaDir > 0 || ayaDir != 0){
                                            clickNext = clickNext - 1 ;
                                            var ayaSelect = 'null';
                                            if(clickNext == 0){
                                                if(ayaDir > 0 ) {ayaSelect = ayaDir}else{ayaSelect = 1} ;

                                                var id = ayaSelect;
                                                var sora =  $('.soraid').val();
                                                var path = '/aya/'+id+'/'+sora ;
                                                var oldPage =  $('#nextPage').data('id');
                                                $.ajax({
                                                    type: 'GET',
                                                    url: path,
                                                    success: function (res) {
                                                        if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                            Status = 'stop' ;
                                                        }else{
                                                            Status = 'play' ;
                                                        }

                                                        var page = res[0].page;
                                                        $('.aya-data').val(id);
                                                        if(oldPage != page){
                                                            GetPage(page , sora , ayaSelect , Status);
                                                        }
                                                        else{
                                                            ChangeAudio(page , Status,ayaSelect);
                                                        }

                                                    }
                                                });

                                                $('#select2-AyaData-container').text(ayaDir);
                                                $('#select2-AyaMobile-container').text(ayaDir);
                                                $("#AyaData").val(ayaDir).trigger('change');
                                                $("#AyaMobile").val(ayaDir).trigger('change');
                                                $('.aya-data').val(ayaDir);
                                            }
                                            else{
                                                ayaDuration.pop();
                                                $('#select2-AyaData-container').text(ayaDir);
                                                $('#select2-AyaMobile-container').text(ayaDir);
                                                $("#AyaData").val(ayaDir).trigger('change');
                                                $("#AyaMobile").val(ayaDir).trigger('change');
                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                    myPlaylist.previous();
                                                    $("#jquery_jplayer_1").jPlayer("stop");
                                                    Status = 'stop' ;
                                                }else{
                                                    myPlaylist.next();
                                                    Status = 'play' ;
                                                }

                                            }
                                        }
                                        else{
                                            ayaDir = 1 ;
                                            $('#select2-AyaData-container').text(ayaDir);
                                            $('#select2-AyaMobile-container').text(ayaDir);
                                            $("#AyaData").val(ayaDir).trigger('change');
                                            $("#AyaMobile").val(ayaDir).trigger('change');
                                        }

                                    });
                                }
                            });
                        }
                        else if(data[0].audiotype == 1){
                            suraData = $('.soraid').val();
                            AyaId = $('.aya-data').val();
                            ayaDir = parseInt(AyaId) ;
                            $.ajax({
                                url:'/getSuraAudio/'+id+'/'+qaryId+'/'+AyaId+'/'+suraData,
                                type:'GET',
                                success: function (res) {
                                    $("#jquery_jplayer_1").jPlayer("destroy");
                                    if(res.length > 1){
                                        audioData = res ;
                                        var ayaDuration = [] ;
                                        id = parseInt($('#nextPage').data('id')) +1 ;
                                        var CountEnd = 0 ;
                                        var SoraCounter = 0 ;
                                        var AyaCounter = 0 ;
                                        tLeft = 0;
                                        endTime = res[CountEnd].end[0].time ;
                                        $('.qarytime').val(endTime);
                                        var EndT = $('.qarytime').val();

                                        $("#jquery_jplayer_1").jPlayer({
                                            ready:function(){
                                                $('.spinner-layer').fadeOut(500);
                                            },
                                            play:function(){
                                                $('.qarytime').val(audioData[CountEnd].end[0].time);
                                                EndT = $('.qarytime').val();
                                                if(CountEnd == 0){
                                                    setTimeout(function(){
                                                        $("#jquery_jplayer_1").jPlayer( "playHead", audioData[0].start[0].time/1000);
                                                    },30);

                                                }
                                            },
                                            ended: function (event) {
                                                CountEnd = CountEnd + 1 ;
                                                SoraCounter = SoraCounter + 1;
                                                AyaCounter = 0 ;
                                                $('#select2-AyaData-container').text(1);
                                                $('#select2-AyaMobile-container').text(1);
                                                $("#AyaData").val(1).trigger('change');
                                                $("#AyaMobile").val(1).trigger('change');
                                                $('.aya-data').val(1);

                                                $("#suraData").val(audioData[SoraCounter].soraId).trigger('change');
                                                $("#suraMobile").val(audioData[SoraCounter].soraId).trigger('change');
                                                $('.soraid').val(audioData[SoraCounter].soraId);
                                            },
                                            timeupdate: function(event) {
                                                tLeft = event.jPlayer.status.currentTime ;
                                                if(event.jPlayer.status.duration > 0) {
                                                    if((tLeft * 1000)  > EndT && CountEnd +1 == res.length){
                                                        if(id <= 604){
                                                            GetPage(id,'null', 'null',Status);
                                                        }
                                                    }
                                                    if(typeof audioData[SoraCounter].ayat[AyaCounter] != 'undefined'){
                                                        if(tLeft * 1000 > audioData[SoraCounter].ayat[AyaCounter].time ){
                                                            ayaDir = parseInt(audioData[SoraCounter].ayat[AyaCounter].ayah) ;
                                                            $('#select2-AyaData-container').text(ayaDir);
                                                            $('#select2-AyaMobile-container').text(ayaDir);
                                                            $("#AyaData").val(ayaDir).trigger('change');
                                                            $("#AyaMobile").val(ayaDir).trigger('change');
                                                            $('.aya-data').val(ayaDir);
                                                            AyaCounter = AyaCounter + 1 ;
                                                        }

                                                    }
                                                }
                                            }
                                        });
                                        var $jp = $('#jquery_jplayer_1');
                                        var myPlaylist = new jPlayerPlaylist({
                                            jPlayer: "#jquery_jplayer_1",
                                            cssSelectorAncestor: "#jp_container_1"
                                        });
                                        myPlaylist.option("enableRemoveControls", true); // Set option
                                        myPlaylist.remove();
                                        myPlaylist.setPlaylist([]);

                                        for(var j = 0 ; j <  audioData.length ; j++){
                                            sData = 0 ;
                                            if(audioData[j].soraId < 10){
                                                var sData = '00'+audioData[j].soraId ;
                                            }else if (audioData[j].soraId < 100){
                                                sData = '0'+audioData[j].soraId ;
                                            }else{
                                                sData = audioData[j].soraId ;
                                            }
                                            myPlaylist.add({
                                                mp3: audioUrl+"/"+sData+".mp3",
                                            });

                                        }
                                        if(status == 'stop'){
                                            $("#jquery_jplayer_1").jPlayer("stop");
                                        }

                                        $('.next-btn').on('click',function(){
                                            if(typeof audioData[SoraCounter].ayat[AyaCounter] != 'undefined'){
                                                var selectTime = parseInt(audioData[SoraCounter].ayat[AyaCounter].time) / 1000 ;
                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                    $jp.jPlayer( "play",selectTime);
                                                    $jp.jPlayer('stop');
                                                    Status = 'stop' ;
                                                }
                                                else{
                                                    $jp.jPlayer( "play",selectTime);
                                                    Status = 'play' ;
                                                }

                                                ayaDir = parseInt(audioData[SoraCounter].ayat[AyaCounter].ayah) ;
                                                $('#select2-AyaData-container').text(ayaDir);
                                                $('#select2-AyaMobile-container').text(ayaDir);
                                                $("#AyaData").val(ayaDir).trigger('change');
                                                $("#AyaMobile").val(ayaDir).trigger('change');
                                                $('.aya-data').val(ayaDir);
                                                AyaCounter = AyaCounter +1 ;
                                            }
                                            else if(typeof audioData[SoraCounter + 1] != 'undefined'){
                                                SoraCounter = SoraCounter + 1 ;
                                                AyaCounter = 0 ;
                                                selectTime = parseInt(audioData[SoraCounter].ayat[AyaCounter].time) / 1000 ;
                                                ayaDir = parseInt(audioData[SoraCounter].ayat[AyaCounter].ayah) ;
                                                $('#select2-AyaData-container').text(ayaDir);
                                                $('#select2-AyaMobile-container').text(ayaDir);
                                                $("#AyaData").val(ayaDir).trigger('change');
                                                $("#AyaMobile").val(ayaDir).trigger('change');
                                                $('.aya-data').val(ayaDir);
                                                $("#suraData").val(audioData[SoraCounter].soraId).trigger('change');
                                                $("#suraMobile").val(audioData[SoraCounter].soraId).trigger('change');
                                                $('.soraid').val(audioData[SoraCounter].soraId);
                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                    myPlaylist.next(audioData[SoraCounter].soraId);
                                                    $('#jquery_jplayer_1').jPlayer('stop');
                                                    Status = 'stop' ;
                                                }
                                                else{
                                                    myPlaylist.next(audioData[SoraCounter].soraId);
                                                    Status = 'play' ;
                                                }

                                            }
                                            else{
                                                var id = parseInt($('#nextPage').data('id')) + 1;
                                                if(id <= 604){
                                                    if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                        Status = 'stop' ;
                                                    }
                                                    else{
                                                        Status = 'play' ;
                                                    }
                                                    GetPage(id, 'null', 'null', Status);
                                                }
                                            }
                                        });
                                        $('.previous-btn').on('click',function(){
                                            if(typeof audioData[SoraCounter].ayat[AyaCounter-1] != 'undefined'){
                                                AyaCounter = AyaCounter -2 ;
                                                var selectTime = parseInt(audioData[SoraCounter].ayat[AyaCounter].time) / 1000 ;
                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                    Status = 'stop' ;
                                                    $jp.jPlayer( "play",selectTime);
                                                    $('#jquery_jplayer_1').jPlayer('stop');
                                                }
                                                else{
                                                    $jp.jPlayer( "play",selectTime);
                                                    Status = 'play' ;
                                                }

                                                ayaDir = parseInt(audioData[SoraCounter].ayat[AyaCounter].ayah) ;
                                                $('#select2-AyaData-container').text(ayaDir);
                                                $('#select2-AyaMobile-container').text(ayaDir);
                                                $("#AyaData").val(ayaDir).trigger('change');
                                                $("#AyaMobile").val(ayaDir).trigger('change');
                                                $('.aya-data').val(ayaDir);
                                            }
                                            else if(typeof audioData[SoraCounter - 1] != 'undefined'){
                                                SoraCounter = SoraCounter - 1 ;
                                                AyaCounter = 0 ;
                                                selectTime = parseInt(audioData[SoraCounter].ayat[AyaCounter].time) / 1000 ;
                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                    Status = 'stop' ;
                                                    myPlaylist.previous();
                                                    $('#jquery_jplayer_1').jPlayer('stop');
                                                }
                                                else{
                                                    myPlaylist.previous();
                                                    Status = 'play' ;
                                                }
                                                ayaDir = parseInt(audioData[SoraCounter].ayat[AyaCounter].ayah) ;
                                                $('#select2-AyaData-container').text(ayaDir);
                                                $('#select2-AyaMobile-container').text(ayaDir);
                                                $("#AyaData").val(ayaDir).trigger('change');
                                                $("#AyaMobile").val(ayaDir).trigger('change');
                                                $('.aya-data').val(ayaDir);
                                                $('.soraid').val(audioData[SoraCounter].soraId);
                                                $("#suraData").val(audioData[SoraCounter].soraId).trigger('change');
                                                $("#suraMobile").val(audioData[SoraCounter].soraId).trigger('change');
                                            }
                                            else{
                                                var id = parseInt($('#nextPage').data('id')) - 1;
                                                if(id != 0){
                                                    if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                        Status = 'stop' ;
                                                    }
                                                    else{
                                                        Status = 'play' ;
                                                    }

                                                    GetPage(id, 'null', 'null', Status);
                                                }
                                            }
                                        });

                                    }
                                    else{
                                        var audioData = res ;
                                        var startTime = res.start[0].time;
                                        var endTime = res.end[0].time ;
                                        var counter = 0 ;
                                        if(ayaSelector != 'null'){
                                            for (var i =0 ; i < res.ayat.length ; i++){
                                                if(res.ayat[i].ayah == ayaSelector){
                                                    startTime = res.ayat[i].time;
                                                    counter = i ;
                                                }
                                            }

                                        }
                                        var tLeft = 0;
                                        var id = parseInt($('#nextPage').data('id')) +1 ;
                                        var $jp = $('#jquery_jplayer_1');
                                        var AyatSora = res.ayat ;
                                        var Status = status ;
                                        $('.qarytime').val(endTime);
                                        var EndT = endTime;
                                        if(suraData < 10){
                                            suraData = '00'+suraData ;
                                        }
                                        else if (suraData < 100){
                                            suraData = '0'+suraData ;
                                        }
                                        else{
                                            suraData = suraData ;
                                        }
                                        $jp.jPlayer({
                                            ready: function () {
                                                $(this).jPlayer("setMedia", {
                                                    mp3: audioUrl+suraData+".mp3"
                                                });
                                                $jp.jPlayer( "play", startTime/1000);
                                                $('.spinner-layer').fadeOut(500);

                                            },
                                            timeupdate: function(event) {
                                                if(event.jPlayer.status.duration > 0) {
                                                    tLeft = event.jPlayer.status.currentTime ;
                                                    if((tLeft * 1000)  > EndT){
                                                        if(id <= 604){
                                                            GetPage(id,'null', 'null',Status);
                                                        }else{
                                                            $jp.jPlayer('stop');
                                                            GetPage(1,'null', 'null','stop');
                                                        }
                                                    }
                                                    if(typeof AyatSora[counter] != 'undefined'){
                                                        if(tLeft * 1000 > AyatSora[counter].time ){
                                                            ayaDir = parseInt(AyatSora[counter].ayah) ;
                                                            $('#select2-AyaData-container').text(ayaDir);
                                                            $('#select2-AyaMobile-container').text(ayaDir);
                                                            $("#AyaData").val(ayaDir).trigger('change');
                                                            $("#AyaMobile").val(ayaDir).trigger('change');
                                                            $('.aya-data').val(ayaDir);
                                                            counter = counter + 1 ;
                                                        }

                                                    }
                                                }

                                            },
                                            play:function(){
                                                if(Status == 'stop'){
                                                    $("#jquery_jplayer_1").jPlayer("pause");
                                                    Status = 'play';
                                                    $('.jp-play').hide();
                                                    $(".jp-pause").removeClass('hidden');
                                                    $(".jp-pause").show();

                                                }
                                            },
                                            pause:function () {
                                                Status = 'play' ;
                                            },
                                            swfPath: "js",
                                            supplied: "mp3"
                                        });

                                        $('.next-btn').on('click',function(){
                                            if(typeof AyatSora[counter] != 'undefined'){
                                                var selectTime = parseInt(AyatSora[counter].time) / 1000 ;
                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                    $jp.jPlayer( "play",selectTime);
                                                    $("#jquery_jplayer_1").jPlayer("pause");
                                                    Status = 'stop' ;
                                                }
                                                else{
                                                    $jp.jPlayer( "play",selectTime);
                                                    Status = 'play' ;

                                                }

                                                ayaDir = parseInt(AyatSora[counter].ayah) ;
                                                $('#select2-AyaData-container').text(ayaDir);
                                                $('#select2-AyaMobile-container').text(ayaDir);
                                                $("#AyaData").val(ayaDir).trigger('change');
                                                $("#AyaMobile").val(ayaDir).trigger('change');
                                                $('.aya-data').val(ayaDir);
                                                counter = counter +1 ;
                                            }
                                            else{
                                                var id = parseInt($('#nextPage').data('id')) + 1;
                                                if(id <= 604){
                                                    GetPage(id, 'null', 'null', 'play');
                                                }
                                            }

                                        });

                                        $('.previous-btn').on('click',function(){
                                            var ayaVal = $('.aya-data').val() - 1;
                                            $jp.jPlayer('pause');
                                            if(typeof AyatSora[counter] != 'undefined'){
                                                counter = counter -2 ;
                                            }
                                            else{
                                                counter = counter -1 ;
                                            }
                                            if(typeof AyatSora[counter] == 'undefined' ){
                                                if(id != 0){
                                                    var ayaSelect = 1 ;
                                                    if(ayaVal != 0 ) {ayaSelect = ayaVal} ;
                                                    var sora =  $('.soraid').val();
                                                    var path = '/aya/'+ayaSelect+'/'+sora ;
                                                    var oldPage =  $('#nextPage').data('id');

                                                    $.ajax({
                                                        type: 'GET',
                                                        url: path,
                                                        success: function (res) {
                                                            var page = res[0].page;
                                                            $('.aya-data').val(ayaSelect);
                                                            if(oldPage != page){
                                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                                    Status = 'stop' ;
                                                                }
                                                                else{
                                                                    Status = 'play' ;
                                                                }

                                                                GetPage(page , sora , ayaSelect , Status);
                                                            }
                                                            else{
                                                               for (var i =0 ; i < audioData.ayat.length ; i++){
                                                                        if(audioData.ayat[i].ayah == ayaSelect){
                                                                            startTime = audioData.ayat[i].time;
                                                                            counter = i ;
                                                                        }
                                                                    }
                                                                if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                                    $jp.jPlayer( "play",startTime);
                                                                    $("#jquery_jplayer_1").jPlayer("pause");
                                                                    Status = 'stop' ;
                                                                }
                                                                else{
                                                                    $jp.jPlayer( "play",startTime);
                                                                    Status = 'play' ;

                                                                }

                                                            }
                                                        }
                                                    });

                                                    $('#select2-AyaData-container').text(ayaSelect);
                                                    $('#select2-AyaMobile-container').text(ayaSelect);
                                                    $("#AyaData").val(ayaSelect).trigger('change');
                                                    $("#AyaMobile").val(ayaSelect).trigger('change');
                                                    $('.aya-data').val(ayaSelect);
                                                }
                                            }
                                            else{
                                                var PageId = $('#nextPage').data('id');
                                                $.ajax({
                                                    url:'/getAyatPage/'+PageId+'/'+qaryId ,
                                                    type:'GET',
                                                    success:function(data){
                                                        for (var i =0 ; i < data.length ; i++){
                                                            if(data[i].ayah == ayaVal){
                                                                startTime = data[i].time / 1000;
                                                            }
                                                        }

                                                        if($("#jquery_jplayer_1").data().jPlayer.status.paused == true){
                                                            $jp.jPlayer( "play",startTime);
                                                            $("#jquery_jplayer_1").jPlayer("pause");
                                                            Status = 'stop' ;
                                                        }
                                                        else{
                                                            $jp.jPlayer( "play",startTime);
                                                            Status = 'play' ;

                                                        }

                                                        $('#select2-AyaData-container').text(ayaVal);
                                                        $('#select2-AyaMobile-container').text(ayaVal);
                                                        $("#AyaData").val(ayaVal).trigger('change');
                                                        $("#AyaMobile").val(ayaVal).trigger('change');
                                                        $('.aya-data').val(ayaVal);

                                                    }
                                                });

                                            }

                                        });

                                    }
                                }
                            });

                        }
                    }
                })
            }
    }

    /*Set AYat list to select2*/
    function ayaList(soraid){
        var aya = $('.aya-data').val();
        var $remote = '';
        if(screen.width > 768){
            $remote = $('#AyaData');
            $('#AyaData').html('');
        }else{
            $remote = $('#AyaMobile');
            $('#AyaMobile').html('');
        }
        $remote.select2('data', null);
        $.ajax({
            type:"GET",
            url:'/getAyat/'+soraid ,
            success:function(res){
                var data = [];
                for(var i=0 ; i < res.length ; i++){
                    data.push({id :res[i].ayaid , text:res[i].ayaid});
                }
                if(screen.width > 768){
                    $('#AyaData').select2({
                        data: data,
                        dir: "rtl"
                    });
                    $('#select2-AyaData-container').text(aya);
                    $("#AyaData").val(aya).trigger('change');

                }
                else{
                    $('#AyaMobile').select2({
                        data: data,
                        dir: "rtl",
                        minimumResultsForSearch: -1
                    });
                    $('#select2-AyaMobile-container').text(aya);
                    $("#AyaMobile").val(aya).trigger('change');

                }



            }
        }).done(function (){
            $('#select2-AyaData-container').text(aya);
            $("#AyaData").val(aya).trigger('change');
            $('#select2-AyaMobile-container').text(aya);
            $("#AyaMobile").val(aya).trigger('change');
        });

    }
    /*end ayat list */

    /*Qary event selector*/
    function Qary(elementId) {
        $(elementId).on("select2:select select2:unselect", function (e) {
            //this returns all the selected item
            var id= $(this).val();
            $('.qary-change').attr('data-id',id);
            $('.qaryid').val(id);
            var pageId = $('#nextPage').data('id');
            ChangeAudio(pageId , 'stop','null');


        });
    }
    /*end qary event*/

    /*Sora Event Selector*/
    function SuraData(elementId) {
        $(elementId).on("select2:select select2:unselect", function (e) {
            var id= $(this).val();
            var path = '/sura/'+id ;
            $('#select2-suraData-container').attr('data-id',id);
            $('.sura-data').attr('data-id',id);
            $('.soraid').val(id);
            $('.aya-data').val(1);

            $.ajax({
                type: 'GET',
                url: path,
                success: function (res) {
                    var page = res[0].page;
                    GetPage(page,id, 'null','stop');

                }
            });
            ayaList(id);

        });
    }
    /*end Sora Event*/

    /*Joza Event Selector*/
    function JozaData(elementId){
        $(elementId).on("select2:select select2:unselect", function (e) {
            //this returns all the selected item
            var id= $(this).val();
            $('select2-jozaData-container').attr('data-id',id);
            $('select2-jozaMobile-container').attr('data-id',id);
            $('.jozaid').val(id);

            var path = '/joza/'+id ;
            $.ajax({
                type: 'GET',
                url: path,
                success: function (res) {
                    var page = res[0].page;
                    $('.aya-data').val(res[0].ayaid);

                    GetPage(page,'null', 'null','stop');

                }
            });


        });
    }
    /*End joza Event*/

    /*Ayat Event Selector*/
    function Ayat(elementId){
        $(elementId).on("select2:select select2:unselect", function (e) {
            var id= $(this).val();
            var sora =  $('.soraid').val();
            var path = '/aya/'+id+'/'+sora ;
            var oldPage =  $('#nextPage').data('id');
            $(this).attr('data-id',id);
            $('.aya-data').val(id);
            $.ajax({
                type: 'GET',
                url: path,
                success: function (res) {
                    var page = res[0].page;
                    $('.aya-data').val(id);
                    if(oldPage != page){
                        GetPage(page , sora , id , 'stop');
                    }else{
                        ChangeAudio(page , 'stop',id);

                    }

                }
            });


        });
    }
    /*end ayat Event*/

    /*Init Player Data*/
    function InitData(){
        var page = $('.page-data').val();
        var aya = $('.aya-data').val();
        var sora = $('.soraid').val();
        var tef = $('#tefseerid').val();
        $('select2-tefseer-container').attr('data-id',tef);
        GetPage(page , sora,aya ,'stop');

    }
    /*end Init*/

    /*Page Next And Previous Event*/
    $('body').on('click','#nextPage',function(){
        var id = parseInt($(this).data('id')) +1 ;
        if(id < 605){
            GetPage(id,'null' , 'null' ,'stop');
        }

    });
    $('body').on('click','#prevPage',function(){
        var id = parseInt($(this).data('id')) -1 ;
        if(id != 0){
            GetPage(id,'null', 'null','stop');
        }
    });
    $(".quran-border").on("swiperight",function(){
        var id = parseInt($('#nextPage').data('id')) +1 ;
        if(id < 605){
            GetPage(id,'null' , 'null' ,'stop');
        }
    });
    $(".quran-border").on("swipeleft",function(){
        var id = parseInt($('#nextPage').data('id')) -1 ;
        if(id != 0){
            GetPage(id,'null', 'null','stop');
        }
    });
    /*End Page Events*/

    /*Desktop element */
    Qary("#qaryMobile");
    SuraData("#suraMobile");
    JozaData("#jozaMobile");
    Ayat("#AyaMobile");
    /*end desktop element*/

    /*Mobile Elemnt*/
    Qary("#qary-change");
    SuraData("#suraData");
    JozaData("#jozaData");
    Ayat("#AyaData");
    /*end Mobile Element*/


    /*Tafaseer Selector Event*/
    $("#tefseer").on("select2:select select2:unselect", function (e) {
        //this returns all the selected item
        var id= $(this).val();
        $('#tefseerid').val(id);
        var page = $('.page-data').val();
        var path = '/tafseer/'+id+'/'+page ;
        $.ajax({
            type: 'GET',
            url: path,
            success: function (res) {
                $('.tafseer-table').html('');
                $.each(res,function(key , val){

                    $(".tafseer-table").append("<tr><td>" +
                        "<p class='block-par'>" +
                        val.tafseer + "</p></div>");

                });
            }
        });


    });
    /*End Tafaseer Event*/

    $(".jp-pause").click(function(){
        $(this).hide();
        $(".jp-play").show();
    });

    $(".jp-play").click(function(){
        $(this).hide();
        $(".jp-pause").removeClass('hidden');
        $(".jp-pause").show();
    });

    InitData();
    $('.btn-toggle').click(function(){
        $( $(this).children()).toggleClass("glyphicon-chevron-up glyphicon-chevron-down");
    });
    if(window.screen < 768){
        $('.del-player').remove();
    }

    function getIdNumber(id){
        var Page = 0 ;
        if(id < 10){
            Page = '00'+id ;
        }else if (id < 100){
            Page = '0'+id ;
        }else{
            Page = id ;
        }
        return Page ;

    }


});

