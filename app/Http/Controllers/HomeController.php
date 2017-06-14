<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Cookie ;
use Carbon\Carbon ;
use App ;
class HomeController extends Controller
{
    public function index(){
        $data = Cookie::get('data');
        if(count($data) > 1){
            $sora = DB::connection('quran')->select('select * from sora');
            $aya = DB::connection('quran')->select('select * from aya where ayaid != 0 and soraid = '.$data[1]);
            $audio = DB::connection('quran')->select('select * from audio');
            $tefseer = DB::connection('quran')->select('select * from tafaseer');
            $joza = DB::connection('quran')->select('select distinct joza from aya');
            $page = DB::connection('quran')->select('select distinct page from aya');
            $main = DB::connection('quran')->select('select * from aya where ayaid != 0 and page = '.$data[0] .'');
            $soraName = DB::connection('quran')->select('select * from sora WHERE soraid ='.$main[0]->soraid);
            $soraName =  $soraName[0]->name ;
            $tefseerName = DB::connection('quran')->select('select * from tafaseer WHERE id = '.$data[6]);
            $tefseerName = $tefseerName[0]->title ;
            $soraDesc = '';
            foreach ($main as $row){
                $soraDesc .= ' ' .$row->searchtext ;
            }
            $pageid = $data[0];
            $soraid = $data[1];
            $ayaid = $data[2];
            $jozaid = $data[3];
            $rob3id = $data[4];
            $hezbid = $data[5];
            $tefseerid = $data[6];
            $qaryid = $data[7];
            $suraId = $main[0]->soraid ;
            if($pageid < 10){
            $img = "00". $pageid ;
            }elseif($pageid < 100){
                $img = "0". $pageid ;
            }else{
                $img =$pageid ;
            }
            $ayaId = [];
            foreach($main as $row){
                    array_push($ayaId ,$row->ayaid);
            }
            $arr = implode(',',$ayaId) ;
            $res = DB::connection("tafseer$data[6]")->select("select * from ayatafseer where soraid = $suraId and ayaid in ($arr)");

        }
        else{
            $sora = DB::connection('quran')->select('select * from sora');
            $aya = DB::connection('quran')->select('select * from aya where soraid = 1');
            $soraName = DB::connection('quran')->select('select * from sora WHERE soraid =1');
            $soraName =  $soraName[0]->name ;
            $tefseerName = DB::connection('quran')->select('select * from tafaseer WHERE id = 38 ');
            $tefseerName = $tefseerName[0]->title ;

            $soraDesc = '';
            foreach ($aya as $row){
                $soraDesc .= ' ' .$row->searchtext ;
            }
            $audio = DB::connection('quran')->select('select * from audio');
            $tefseer = DB::connection('quran')->select('select * from tafaseer');
            $joza = DB::connection('quran')->select('select distinct joza from aya');
            $page = DB::connection('quran')->select('select distinct page from aya');
            $res = DB::connection("tafseer38")->select("select * from ayatafseer where soraid = 1 and ayaid in (1,2,3,4,5,6,7)");
            $pageid = 1;
            $soraid = 1;
            $ayaid = 1;
            $jozaid = 1;
            $rob3id = 1;
            $hezbid = 1;
            $tefseerid = 38;
            $qaryid = 1;
            $img = "001";

        }
        return view('index',compact('sora','tefseerName','aya','audio','tefseer','page','joza','res'
        ,'pageid','soraid','ayaid','jozaid','soraName','rob3id','hezbid','tefseerid','qaryid','img' ,'soraDesc'));
    }
    public function changeSura($_id){
        $id =(int)$_id ;
        $aya = DB::connection('quran')->select('select * from aya where soraid = '.$id .' and ayaid > 0 limit 1');
        return $aya ;

    }
    public function getAyat($id){
        $aya = DB::connection('quran')->select('select ayaid from aya where ayaid != 0 and soraid ='.$id);
        return $aya ;
    }
    public function changeJoza($_id){
        $id =(int)$_id ;
        $aya = DB::connection('quran')->select('select * from aya where joza = '.$id .' limit 1');
        return $aya ;
    }
    public function changePage($_id,$sora){
        $id =(int)$_id ;
        if($sora != 'null'){
            $aya = DB::connection('quran')->select('select * from aya where page = '.$id .' and soraid = '.$sora.' and ayaid > 0 limit 1');
        }else{
            $aya = DB::connection('quran')->select('select * from aya where page = '.$id .' and ayaid > 0 limit 1');

        }
        return $aya ;

    }
    public function changeAya($_id,$_sora){
        $id =(int)$_id ;
        $sora =(int)$_sora ;
        $aya = DB::connection('quran')->select('select * from aya where ayaid = '.$id .' and soraid = '.$sora.' limit 1');
        return $aya ;

    }
    public function changeAudio($_id){
        $id =(int)$_id ;
        $aya = DB::connection('quran')->select('select * from audio where id = '.$id .' limit 1');
        return $aya ;

    }
    public function getPageAudio($page,$aya ,$sora){
        $aya = intval($aya) ;
        $sora = intval($sora) ;
        $ayat = DB::connection('quran')->
        select("select * from aya where page = $page and ayaid >= $aya and ayaid !=0 and soraid >= $sora");
        $ayaArr = [];
        foreach ($ayat as $row){
            if($row->ayaid < 10){
                $ayaId = '00'. $row->ayaid ;
            }
            elseif ($row->ayaid < 100){
                $ayaId = '0'. $row->ayaid ;
            }else{
                $ayaId = $row->ayaid ;
            }
            if($row->soraid < 10){
                $soraId = '00'. $row->soraid ;
            }
            else if ($row->soraid < 100){
                $soraId = '0' . $row->soraid ;
            }else{
                $soraId = $row->soraid ;
            }

            array_push($ayaArr , $soraId . $ayaId .'.mp3');
        }
        return $ayaArr ;

    }
    public function getSuraAudio($page,$qary,$aya,$sora){

        $allSoura = DB::connection('quran')->
        select("select * from aya where page = $page  and soraid >= $sora GROUP BY soraid");
        $data = [];
        if(count($allSoura) > 1){
            foreach ($allSoura as $row){
                $ayat = DB::connection('quran')->
                select("select * from aya where page = $page and ayaid != 0 and soraid = $row->soraid ORDER  BY ayaid  DESC limit 1");
                $ayaVal = $ayat[0]->ayaid ;

                if($aya == 'null'){
                    $stratTime = DB::connection('qary'.$qary)
                        ->select("select * from timings where sura = $row->soraid and ayah = 1 ");
                }
                else{
                    $stratTime = DB::connection('qary'.$qary)
                        ->select("select * from timings where sura = $row->soraid and ayah = $aya ");

                }
                $endtime = DB::connection('qary'.$qary)
                    ->select("select * from timings where sura = $row->soraid and ayah > $ayaVal limit 1 ");
                $ayat = DB::connection('quran')->
                select("select ayaid , page , soraid from aya where page = $page and ayaid >= $aya and soraid = $row->soraid ");
                $ayaList = [];
                foreach ($ayat as $row){
                    array_push($ayaList , $row->ayaid);
                }
                $arr = implode(',',$ayaList) ;
                $ayat = DB::connection('qary'.$qary)->
                select("select * from timings where sura = $row->soraid and ayah in ($arr)");

                array_push($data , ["soraId"=>(int)$row->soraid ,"start"=> $stratTime ,"end"=>$endtime ,"ayat"=>$ayat]);
            }
            return $data ;

        }
        else{
            $ayat = DB::connection('quran')->
            select("select * from aya where page = $page and ayaid != 0 ORDER  BY ayaid  DESC limit 1");
            $sora = $ayat[0]->soraid ;
            $ayaVal = $ayat[0]->ayaid ;

            if($aya == 'null'){
                $stratTime = DB::connection('qary'.$qary)
                    ->select("select * from timings where sura = $sora and ayah = 1 ");
            }
            else{
                $stratTime = DB::connection('qary'.$qary)
                    ->select("select * from timings where sura = $sora and ayah = $aya ");

            }
            $endtime = DB::connection('qary'.$qary)
                ->select("select * from timings where sura = $sora and ayah > $ayaVal limit 1 ");
            $ayat = DB::connection('quran')->
            select("select ayaid from aya where page = $page and ayaid >= $aya");
            $ayaList = [];
            foreach ($ayat as $row){
                array_push($ayaList , $row->ayaid);
            }
            $arr = implode(',',$ayaList) ;
            $ayat = DB::connection('qary'.$qary)->
            select("select * from timings where sura = $sora and ayah in ($arr)");

            array_push($data , ["soraId"=>(int)$sora ,"start"=> $stratTime ,"end"=>$endtime ,'ayat'=>$ayat]);

            return $data[0] ;

        }

    }
    public function changeTafseer($_id,$_pageId){
        $page = (int)$_pageId;
        $id = (int)$_id;
        $dataset = [] ;
        $soraid = DB::connection('quran')->select('select distinct soraid from aya where page = '.$page.'');
        foreach ($soraid as $row){
            $main = DB::connection('quran')->select('select soraid ,ayaid , page from aya where page = '.$page .' and soraid ='.$row->soraid);
            array_push($dataset , $main);

        }
        $ayaId = [];
        $res = [] ;
        foreach($dataset as $row){
            foreach ($row as $data){
                array_push($ayaId ,$data->ayaid);
                $soraid = $data->soraid ;
            }
            $arr = implode(',',$ayaId) ;
            $save = DB::connection("tafseer$id")->select("select * from ayatafseer where soraid = $soraid and ayaid in ($arr)");
            array_push($res ,$save);
            $ayaId = [];
        }

            return array_flatten($res) ;



    }

    public function getAyatPageAudio($id ,$qary){
        $ayat = DB::connection('quran')->select('select ayaid , soraid from aya where page = '.$id);
        $ayaList = [];
        foreach ($ayat as $row){
            array_push($ayaList , $row->ayaid);
        }
        $arr = implode(',',$ayaList) ;
        $sora = $ayat[0]->soraid ;
        $ayat = DB::connection('qary'.$qary)->
        select("select * from timings where sura = $sora and ayah in ($arr)");
        return $ayat ;

    }
    public function getAyatSuraAudio($id){
        $ayat = DB::connection('quran')->select('select ayaid , soraid from aya where ayaid > 0 and soraid = '.$id);
        return $ayat ;

    }

    public function suraIndex($name,$id){

            $sora = DB::connection('quran')->select('select * from sora');
            $aya = DB::connection('quran')->select('select * from aya where ayaid != 0 and soraid = '.$id);
            $audio = DB::connection('quran')->select('select * from audio');
            $tefseer = DB::connection('quran')->select('select * from tafaseer');
            $joza = DB::connection('quran')->select('select distinct joza from aya');
            $page = DB::connection('quran')->select('select distinct page from aya');
            $pageid = DB::connection('quran')->select('select distinct page , joza ,hezb ,quarter from aya where soraid ='.$id. ' limit 1');
            $pageData = collect($pageid) ;
            $main = DB::connection('quran')->select('select * from aya where ayaid != 0 and page = '.$pageData[0]->page);
            $soraName = DB::connection('quran')->select('select * from sora WHERE soraid ='.$main[0]->soraid);
            $soraName =  $soraName[0]->name ;
            $tefseerName = DB::connection('quran')->select('select * from tafaseer WHERE id = 38');
            $tefseerName = $tefseerName[0]->title ;

            $soraDesc = '';
            foreach ($main as $row){
                $soraDesc .= ' ' .$row->searchtext ;
            }
            $pageid = $pageData[0]->page;
            $soraid = $id;
            $ayaid = 1;
            $jozaid = $pageData[0]->joza;
            $rob3id = $pageData[0]->quarter;
            $hezbid = $pageData[0]->hezb;
            $tefseerid = 38;
            $qaryid = 1;
            $suraId = $main[0]->soraid ;
            if($pageid < 10){
                $img = "00". $pageid ;
            }elseif($pageid < 100){
                $img = "0". $pageid ;
            }else{
                $img =$pageid ;
            }
            $ayaId = [];
            foreach($main as $row){
                array_push($ayaId ,$row->ayaid);
            }
            $arr = implode(',',$ayaId) ;
            $res = DB::connection("tafseer38")->select("select * from ayatafseer where soraid = $suraId and ayaid in ($arr)");

        return view('index',compact('sora','tefseerName','soraName','aya','audio','tefseer','page','joza','res'
            ,'pageid','soraid','ayaid','jozaid','rob3id','hezbid','tefseerid','qaryid','img','soraDesc'));

    }
    public function ayaIndex($name , $ayaid ,$sura){

            $sora = DB::connection('quran')->select('select * from sora');
            $aya = DB::connection('quran')->select('select * from aya where ayaid != 0 and soraid = '.$sura);
            $audio = DB::connection('quran')->select('select * from audio');
            $tefseer = DB::connection('quran')->select('select * from tafaseer');
            $joza = DB::connection('quran')->select('select distinct joza from aya');
            $page = DB::connection('quran')->select('select distinct page from aya');
            $pageid = DB::connection('quran')->select('select distinct page , joza ,hezb ,quarter from aya where soraid ='.$sura. ' and ayaid ='.$ayaid. ' limit 1');
            $pageData = collect($pageid) ;
            $main = DB::connection('quran')->select('select * from aya where ayaid != 0 and page = '.$pageData[0]->page);
            $soraName = DB::connection('quran')->select('select * from sora WHERE soraid ='.$main[0]->soraid);
            $soraName =  $soraName[0]->name ;
            $tefseerName = DB::connection('quran')->select('select * from tafaseer WHERE id = 38');
            $tefseerName = $tefseerName[0]->title ;

        $soraDesc = '';
            foreach ($main as $row){
                $soraDesc .= ' ' .$row->searchtext ;
            }

            $pageid = $pageData[0]->page;
            $soraid = $sura;
            $jozaid = $pageData[0]->joza;
            $ayaid = $ayaid ;
            $rob3id = $pageData[0]->quarter;
            $hezbid = $pageData[0]->hezb;
            $tefseerid = 38;
            $qaryid = 1;
            $suraId = $main[0]->soraid ;
            if($pageid < 10){
                $img = "00". $pageid ;
            }elseif($pageid < 100){
                $img = "0". $pageid ;
            }else{
                $img =$pageid ;
            }
            $ayaId = [];
            foreach($main as $row){
                array_push($ayaId ,$row->ayaid);
            }
            $arr = implode(',',$ayaId) ;
            $res = DB::connection("tafseer38")->select("select * from ayatafseer where soraid = $suraId and ayaid in ($arr)");

        return view('index',compact('sora','tefseerName','soraName','aya','audio','tefseer','page','joza','res'
            ,'pageid','soraid','ayaid','jozaid','rob3id','hezbid','tefseerid','qaryid','img','soraDesc'));

    }
    public function tefseerIndex($sura ,$ayaid , $name , $Tafid){

            $sora = DB::connection('quran')->select('select * from sora');
            $aya = DB::connection('quran')->select('select * from aya where ayaid != 0 and soraid = '.$sura);
            $audio = DB::connection('quran')->select('select * from audio');
            $tefseer = DB::connection('quran')->select('select * from tafaseer');
            $joza = DB::connection('quran')->select('select distinct joza from aya');
            $page = DB::connection('quran')->select('select distinct page from aya');
            $pageid = DB::connection('quran')->select('select distinct page , joza ,hezb ,quarter from aya where soraid ='.$sura. ' and ayaid ='.$ayaid. ' limit 1');
            $pageData = collect($pageid) ;
            $main = DB::connection('quran')->select('select * from aya where ayaid != 0 and page = '.$pageData[0]->page);
            $soraName = DB::connection('quran')->select('select * from sora WHERE soraid ='.$main[0]->soraid);
            $soraName =  $soraName[0]->name ;
            $tefseerName = DB::connection('quran')->select('select * from tafaseer WHERE id = '.$Tafid);
            $tefseerName = $tefseerName[0]->title ;

        $soraDesc = '';
            foreach ($main as $row){
                $soraDesc .= ' ' .$row->searchtext ;
            }

            $pageid = $pageData[0]->page;
            $soraid = $sura;
            $ayaid = $ayaid ;
            $jozaid = $pageData[0]->joza;
            $rob3id = $pageData[0]->quarter;
            $hezbid = $pageData[0]->hezb;
            $tefseerid = $Tafid;
            $qaryid = 1;
            $suraId = $main[0]->soraid ;
            if($pageid < 10){
                $img = "00". $pageid ;
            }elseif($pageid < 100){
                $img = "0". $pageid ;
            }else{
                $img =$pageid ;
            }
            $ayaId = [];
            foreach($main as $row){
                array_push($ayaId ,$row->ayaid);
            }
            $arr = implode(',',$ayaId) ;
            $res = DB::connection("tafseer$Tafid")->select("select * from ayatafseer where soraid = $suraId and ayaid in ($arr)");

        return view('index',compact('sora','tefseerName','soraName','aya','audio','tefseer','page','joza','res'
            ,'pageid','soraid','ayaid','jozaid','rob3id','soraDesc','hezbid','tefseerid','qaryid','img'));

    }
    public function qaryIndex($id,$name){

        $sora = DB::connection('quran')->select('select * from sora');
        $aya = DB::connection('quran')->select('select * from aya where soraid = 1');
        $soraName = DB::connection('quran')->select('select * from sora WHERE soraid =1');
        $soraName =  $soraName[0]->name ;
        $tefseerName = DB::connection('quran')->select('select * from tafaseer WHERE id = 38');
        $tefseerName = $tefseerName[0]->title ;

        $soraDesc = '';
        foreach ($aya as $row){
            $soraDesc .= ' ' .$row->searchtext ;
        }
        $audio = DB::connection('quran')->select('select * from audio');
        $tefseer = DB::connection('quran')->select('select * from tafaseer');
        $joza = DB::connection('quran')->select('select distinct joza from aya');
        $page = DB::connection('quran')->select('select distinct page from aya');
        $res = DB::connection("tafseer38")->select("select * from ayatafseer where soraid = 1 and ayaid in (1,2,3,4,5,6,7)");
        $pageid = 1;
        $soraid = 1;
        $ayaid = 1;
        $jozaid = 1;
        $rob3id = 1;
        $hezbid = 1;
        $tefseerid = 38;
        $qaryid = $id;
        $img = "001";

        return view('index',compact('sora','soraName','tefseerName','aya','audio','tefseer','page','joza','res'
            ,'pageid','soraid','ayaid','jozaid','rob3id','soraDesc','hezbid','tefseerid','qaryid','img'));

    }
    public function tafaseerIndex($id , $name){

        $sora = DB::connection('quran')->select('select * from sora');
        $aya = DB::connection('quran')->select('select * from aya where soraid = 1');
        $soraName = DB::connection('quran')->select('select * from sora WHERE soraid =1');
        $soraName =  $soraName[0]->name ;
        $tefseerName = DB::connection('quran')->select('select * from tafaseer WHERE id = '.$id);
        $tefseerName = $tefseerName[0]->title ;

        $soraDesc = '';
        foreach ($aya as $row){
            $soraDesc .= ' ' .$row->searchtext ;
        }

        $audio = DB::connection('quran')->select('select * from audio');
        $tefseer = DB::connection('quran')->select('select * from tafaseer');
        $joza = DB::connection('quran')->select('select distinct joza from aya');
        $page = DB::connection('quran')->select('select distinct page from aya');
        $res = DB::connection("tafseer38")->select("select * from ayatafseer where soraid = 1 and ayaid in (1,2,3,4,5,6,7)");
        $pageid = 1;
        $soraid = 1;
        $ayaid = 1;
        $jozaid = 1;
        $rob3id = 1;
        $hezbid = 1;
        $tefseerid = $id;
        $qaryid = 1;
        $img = "001";

        return view('index',compact('sora','tefseerName','soraName','aya','audio','tefseer','page','joza','res'
            ,'pageid','soraid','ayaid','jozaid','soraDesc','rob3id','hezbid','tefseerid','qaryid','img'));

    }


    public function setCookiesData($page , $sora , $aya , $hezb ,$rob3, $joza , $tefseer , $qary){
        Cookie::queue('data',[$page , $sora , $aya , $joza ,$rob3 ,$hezb, $tefseer , $qary ]);
        return (Cookie::get('data'));
    }

    public function SiteMap(){
        $sitemap = App::make ("sitemap");

        $sitemap_quran = App::make("sitemap");

        $sora = DB::connection('quran')->select('select distinct aya.soraid , sora.name , sora.soraid from aya 
                                                LEFT JOIN sora ON sora.soraid = aya.soraid');
        foreach ($sora as $row)
        {
            $sitemap_quran->add('http://quran.islam-db.com/soura/'.$row->name.'/'.$row->soraid, Carbon::now(),'1.0' ,'monthly');
        }
        // create file sitemap-books.xml in your public folder (format, filename)
        $sitemap_quran->store('xml','sitemaps/sitemap-0');

        $sitemap_aya = App::make("sitemap");

        $aya = DB::connection('quran')->select('select aya.ayaid , aya.soraid , aya.page , sora.name , sora.soraid from aya
                              LEFT JOIN sora ON sora.soraid = aya.soraid');
        foreach ($aya as $row)
        {
            $sitemap_aya->add('http://quran.islam-db.com/aya/'.$row->name.'/'.$row->ayaid .'/'.$row->soraid, Carbon::now(),'1.0' ,'monthly');
        }

        // create file sitemap-books.xml in your public folder (format, filename)
        $sitemap_aya->store('xml','sitemaps/sitemap-1');



        $sitemap_qary = App::make("sitemap");
        $qary = DB::connection('quran')->select('select * from audio');

        foreach ($qary as $row)
        {
            $sitemap_qary->add('http://quran.islam-db.com/qary/'.$row->id.'/'.$row->name, Carbon::now(),'1.0' ,'monthly');
        }

        // create file sitemap-books.xml in your public folder (format, filename)
        $sitemap_qary->store('xml','sitemaps/sitemap-2');

        $sitemap_tafaseer = App::make("sitemap");
        $sitemap_tefseer = App::make("sitemap");
        $tafaseer = DB::connection('quran')->select('select * from tafaseer');
        $counter = 4 ;
        foreach ($tafaseer as $row)
        {
            $sitemap_tafaseer->add('http://quran.islam-db.com/tafaseer/'.$row->id.'/'.$this->slug_title($row->title), Carbon::now(),'1.0' ,'monthly');
            $table = DB::connection("tafseer$row->id")->select('select * from ayatafseer');
            foreach ($table as $tef){
                $sitemap_tefseer->add('http://quran.islam-db.com/tefseer/'.$tef->soraid.'/'.$tef->ayaid.'/'.$this->slug_title($row->title).'/'.$row->id, Carbon::now(),'1.0' ,'monthly');
            }
            $sitemap_tefseer->store('xml','sitemaps/sitemap-'.$counter);
            $sitemap->addSitemap('http://quran.islam-db.com/sitemaps/sitemap-'.$counter.'.xml');
            $sitemap_tefseer->model->resetItems();
            $counter ++ ;
        }
        $sitemap_tafaseer->store('xml','sitemaps/sitemap-3');

        $sitemap->addSitemap('http://quran.islam-db.com/sitemaps/sitemap-0.xml');
        $sitemap->addSitemap('http://quran.islam-db.com/sitemaps/sitemap-1.xml');
        $sitemap->addSitemap('http://quran.islam-db.com/sitemaps/sitemap-2.xml');
        $sitemap->addSitemap('http://quran.islam-db.com/sitemaps/sitemap-3.xml');

        // create file sitemap.xml in your public folder (format, filename)
        $sitemap->store('sitemapindex','sitemaps/sitemap');

    }
    public function robot(){

        Robots::addUserAgent('*');
        Robots::addSitemap('sitemaps/sitemap.xml');
        Robots::addAllow('/','Allow');


        return Response::make(Robots::generate(), 200, array('Content-Type' => 'text/plain'));
    }
    public function slug_title($text){
        $_title = explode(' ' ,$text);
        $_title = implode('-',$_title);
        return $_title ;
    }


}
