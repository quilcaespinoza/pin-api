<?php

namespace App\Http\Controllers\Ping;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;


class PingController extends Controller
{
    public  function index() {

        $ping =  shell_exec("ping www.google.com" );

       if($a = strpos($ping, "Media")) {
           $ar = explode("Media =",$ping);
           $ms = explode("ms",$ar[1]);
           $msMedia = trim($ms[0]);
//           $newCadena = explode('ms',$ar);
            $response = array(
                'ping' =>$msMedia

            );
       }else {
           $response = array(
               'ping' => 0
           );
       }
        return Response::json($response, 200);
    }
}
