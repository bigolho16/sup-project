<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// arrumar um jeito mais bonito de instanciar isto:
use App\Http\Controllers\Templates\CategoryController;
// arrumar um jeito mais bonito de instanciar isto.

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index () {

        // echo count($_GET);

        if ($this->isAjax()) {
            // medidas p/ garantir que os dados não foram alterados:
            $temformatodaclasse = $this->has_the_class_format();
            // medidas p/ garantir que os dados não foram alterados.

            if (isset($_GET["tcat"]) && isset($_GET["tsub_cat"]) && count($_GET) == 2 && $temformatodaclasse == true) {
                dd("deu certo!");

                // $this->protegendo_dados_externos($_GET);

                // $_GET['tcat'] = $this->before_selecting_separate_id();
                
                // dd($this->select_subcat_to_the_ajx());

            }

        }else {
            // dados da categoria na lateral do site:
            $categories = (new CategoryController)->index();
            return view("app", compact("categories"));
            // dados da categoria na lateral do site.
        }
    }

    public function isAjax () {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

    }

    public function protegendo_dados_externos($datas) {
        $varlimpa = array();
        foreach($datas as $data){
            // array_push($varlimpa, htmlspecialchars($data)); // convert. caract. esperc. p/ realidade html ex:< => &lt;
        }

        // foreach


        print_r($varlimpa);

        // $variavelLimpa = htmlspecialchars($_GET['tcat']); // tag html convertida para string

    }

    public function has_the_class_format() {
        // $reqget = array();
        $reqget = $_GET;

        // print_r(end($reqget));
        foreach ($reqget as $value) {
            if (preg_match("/^[a-z]{3,7}-[0-9]+$/", $value) > 0) { // 0 e 1 são os valores retornados
                if (end($reqget) == $value) {
                    return true;
                }
                // print_r(end(array_keys($reqget)));
                
                // print_r(is_int(preg_match("/^[a-z]{3,7}-[0-9]+$/", $valor)));
                // $valor possui número...
            }else { break; return false; }
        }
    }

    public function before_selecting_separate_id() {
        $result = preg_replace("/[^\d]/", '', $_GET['tcat']);
        
        if (!empty($result)) {
            return $result;
        } // agora caso meu $result for vazio não faça nada
    }
    
    public function select_subcat_to_the_ajx() {
        return DB::select('select * from smarket_catalog where parentid=' .$_GET['tcat'], [1]);
    }

}
