<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->model("home");
        $result =$this->home->get();
        $viewData = array("res" => $result);
		$this->load->view('home_v', $viewData);
	}
    public function search($q){
        $this->load->model("home");
        return $this->home->find($q);
    }
    public function paramControl(){
        $q=$this->input->post("search");
        if($q!=null){
            $search=$this->search($q);
            if($search!=null){
                    echo "<div class='col-md-12 text-center'><b>Arama Sonuçları:</b> <hr></div>";
                    foreach ($search as $find){ ?>
                <div class="col-md-3 col-sm-6 datacard-border">
                    <div class="datacard">
                        <b><?php echo $find->name;?></b>
                        <i class="datacard-body">
                            <?php echo $find->content;?>
                        </i>
                    </div>
            </div>
            <?php                                 
                }
                
            }else{
                 echo "<div class='col-12 text-center'><b>Arama Sonuçları:</b><hr>Sonuç Yok</div>";
            }    
        }else{
            return "null";
        }
    }
}
