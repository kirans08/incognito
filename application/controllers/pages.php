<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    function _construct()
    {
        parent::_construct();
        $this->load->helper('url');
         $this->load->model('users_model');

    }

    public function view($page = 'home')
    {
        

       $this->load->library('session');
       $this->load->library('facebook');
       $this->load->model('users_model');
       $this->load->helper('url');
       $this->load->helper('form');
       $this->load->library('form_validation');
       $this->form_validation->set_rules('college', 'College', 'required');
       $this->form_validation->set_rules('emailid', 'Email ID', 'required');
       $data['acthome']='active';
       $data['actleaderboard']='';
       $data['actcluebox']='';
       $data['actrules']='';
       $data['actprof']='';
       $data['actstory']='';

       $userid=$this->session->userdata('userid');
       $userdata=$this->users_model->get_userdata($userid);
       $data['phase']=$userdata['phase'];
        if($userid==FALSE)
        {
           
            $data['login_url'] = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('pages/login'), 
            'scope' => 'email, publish_actions',
                                            'display' => 'page' 
            ));
            $data['title']='Login';
            $page='home';  
            

        }
        else
        {
            
            $level_data=$this->users_model->get_level($userdata['level']);
            if($level_data['title_clue']!=NULL)
            {
                $data['title']=$level_data['title_clue'];
            }
            else
            {
                $data['title']='Level '.$level_data['level'];
            }
            $data['level']=$level_data;
            if($level_data['cookie_clue']!=NULL)
            {
                $cookie = array(
                 'name'   => 'EULC',
                 'value'  =>  $level_data['cookie_clue'],
                 'expire' => '300',
                 'domain' => '',
                 'path'   => '/',
                 'prefix' => '',
                 'secure' => FALSE
                );
                $this->input->set_cookie($cookie); 
            }
            if($level_data!=NULL)
            {
                $page='arena'; 
                if(($userdata['level']==16)&&($userdata['phase']!=1))
                {
                    $data['title']='Start Phase 2';
                    $page='jump';
                }
            }
            else
            {
                $state='0';
                $leveldata=$this->users_model->get_levels();
                foreach($leveldata as $level)
                {
                    if($level['active']==1)
                    {
                        $state='1';
                        break;
                    }
                } 
                if($state==1)
                {
                    $data['title']='Congratulations';
                    $page='top';
                }
                else
                {
                    $data['title']='Sorry';
                    $page='update';
                }
            }                   
        }
        
        if($userdata['status']==-1)
        {
            $page='banned';
            $data['title']='BANNED';
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);           
    }
    public function login()
    {

        $this->load->library('session');
        $this->load->library('facebook');
        $this->load->model('users_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('college', 'College', 'required');
        $this->form_validation->set_rules('emailid', 'Email ID', 'required');
        $data['acthome']='active';
        $data['actleaderboard']='';
        $data['actcluebox']='';
        $data['actrules']='';
        $data['actprof']='';
        $data['actstory']='';
        $user = $this->facebook->getUser();        
        if ($user) 
        {
            try 
            {
                $data['user_profile'] = $this->facebook->api('/me');
            } 
            catch (FacebookApiException $e) 
            {
                redirect('','location');
                /*$data['title']='Login';
                $page='home';  
                $this->load->view('templates/header', $data);
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer', $data);*/
                $user=FALSE;
            }
            if($user!=FALSE)
            {
                $this->load->model('users_model');
                $login_data=$data['user_profile'];
                $userdata=$this->users_model->get_userdata($login_data['id']);
                if($userdata!=FALSE)
                {
                    $newdata = array(
                    'username'  => $userdata['name'],
                    'userid'     => $userdata['fb_userid'],
                    'status' => $userdata['status']
                    );
                    $this->session->set_userdata($newdata);
                    redirect('','location');
                }
                else
                {                        
                    $data['title']='Sign Up';
                    $page='signup';
                    $this->load->view('templates/header', $data);
                    $this->load->view('pages/'.$page, $data);
                    $this->load->view('templates/footer', $data);
                }
            }            
        }
        else 
        {
            redirect('','location');
            /*$data['title']='Login';
            $page='home';  
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);*/
        }
            
    }

    public function create()
    {
        $this->load->library('session');
        $this->load->library('facebook');
        $this->load->model('users_model');
        $this->load->helper('url');
        try
        {
            $userdata=$this->facebook->api('/me');
        }
        catch (FacebookApiException $e) 
        {
            $userdata=FALSE;
            redirect('','location'); 
        }  
        $college=$this->input->post('college',TRUE);
        $college=preg_replace('/\s+/','',$college);
        if($college!=''&&$college!=FALSE)
        {   
        $this->users_model->create($userdata);
         $newdata = array(
                        'userid'=> $userdata['id']
                        );
        $this->session->set_userdata($newdata);
        $this->posttofb();
        redirect('pages/viewstory','location');
        }
        else
        {
            redirect('pages/login','location');
        }

    }
    public function jslogin()
    {
        redirect('','location');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('college', 'College', 'required');
        $this->form_validation->set_rules('emailid', 'Email ID', 'required');
        $userid=$this->input->post('userid',TRUE);
        $username=$this->input->post('name',TRUE);
        $userprofile=$this->input->post('userprofile',TRUE);
        $data['acthome']='active';
        $data['actleaderboard']='';
        $data['actcluebox']='';
        $data['actrules']='';
        $data['actprof']=''; 
        $data['actstory']='';     
        if ($userid!=NULL) 
        {
           
            $this->load->model('users_model');
            $userdata=$this->users_model->get_userdata($userid);
            if($userdata!=FALSE)
            {
                $newdata = array(
                'username'  => $userdata['name'],
                'userid'     => $userdata['fb_userid'],
                'status' => $userdata['status']
                );
                $this->session->set_userdata($newdata);
                redirect('','location');
            }
            else
            {          
                $data['userid']=$userid;
                $data['name']=$username;
                $data['userprofile']=$userprofile;              
                $data['title']='Sign Up';
                $page='jssignup';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer', $data);
            }
                       
        }
        else 
        {
            $data['title']='Login';
            $page='jslogin';  
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function jscreate()
    {
        redirect('','location');
        $this->load->library('session');
        $this->load->model('users_model');
        $userdata['id']=$this->input->post('userid',TRUE);
        $userdata['name']=$this->input->post('name',TRUE);
        $userdata['link']=$this->input->post('userprofile',TRUE);
        $this->users_model->create($userdata);
         $newdata = array(
                        'userid'=> $userdata['id']
                        );
        $this->session->set_userdata($newdata);
        redirect('','location');
    }
    public function logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('userid');
        redirect('','location');
    }


    public function answer()
    {
        $this->load->model('users_model');
        $this->load->library('session');

        $answer=$this->input->post('answer',TRUE);
        $result=$this->users_model->check_answer($answer);
        $data['img']=FALSE;
        $data['acthome']='active';
        $data['actleaderboard']='';
        $data['actcluebox']='';
        $data['actrules']='';
        $data['actprof']='';
        $data['actstory']='';
        if($result!=FALSE)
        {
             $data['img']=$result;
             $result=TRUE;
             $cookie = array(
                 'name'   => 'EULC',
                 'value'  =>  '',
                 'expire' => '-300',
                 'domain' => '',
                 'path'   => '/',
                 'prefix' => '',
                 'secure' => FALSE
                );
                     $userid=$this->session->userdata('userid');

            $this->input->set_cookie($cookie); 
            $userdata=$this->users_model->get_userdata($userid);
            $this->posttofb('pass',$userdata['level']);

        }

        $data['result']=$result;
        $data['title']='Answer';
        $page='answer';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);

    }
     public function posttofb($type='',$level='')
    {
               $this->load->library('session');
       $this->load->library('facebook');
               $this->load->model('users_model');
        $userid = $this->session->userdata('userid');
        if($userid!=FALSE)
        {
         $userdata=$this->users_model->get_userdata($userid);
        }
        else
        {
            return NULL;
        }
        if($userdata['status']!=1)
        {
            return NULL;
        }
        $level=$level-1;



        $token = NULL;
        try {
            $token = $this->facebook->getAccessToken();
            if(!$token) {
                return NULL;
            }
        }catch (FacebookApiException $e){
            return NULL;
        }
    
        if($type!='pass'){
            $msg = array(
                'access_token'  => $token,
                'message' => 'Try out an exciting online treasure hunt!',
                'link' => 'http://incognito.tezoro.org'
                );
        }else{
            $msg = array(
                'access_token'  => $token,
                'message' => 'I\'ve finished Level '.$level.' of this awesome online treasure hunt.',
                'link' => 'http://incognito.tezoro.org'
                );
        }
   
     

           
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://graph.facebook.com/' . $userid . '/feed');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //to suppress the curl output
    $result = curl_exec($ch);
    curl_close($ch);

    }
    public function leaderboard()
    {
        $this->load->library('session');
        $this->load->model('users_model');
        $this->config->load('leaderboard');
        $data['acthome']='';
        $data['actleaderboard']='active';
        $data['actcluebox']='';
        $data['actrules']='';
        $data['actprof']='';
        $data['actstory']='';
        $page='leaderboard';
        $data['title']='Leaderboard';
        $data['nop']=$this->config->item('leaderboard');
        $userdata=$this->users_model->get_userlist();
        $rank=1;
            $regdata = array(
            'rank' => NULL,
            'name' => NULL,
            'level' => NULL,
            'college' => NULL
        );
        $tkmdata = array(
            'rank' => NULL,
            'name' => NULL,
            'level' => NULL
        );

        if($userdata!=NULL)
        {
        foreach ($userdata as $user) {

            $tkm=strtoupper($user['college']);
            if(strpos($tkm,"T K M")===false&&strpos($tkm,"TKM")===false&&strpos($tkm,"T.K.M")===falsE&&strpos($tkm,"TKMCE")===false&&strpos($tkm,"THANGAL")===false)
            {
                 $details['rank']=$rank;
                $details['name']=$user['name'];
                $details['level']=$user['level'];
                $details['college']=$user['college'];
                array_push($regdata,$details);
               

            }
            else
            {
              $details1['rank']=$rank;
                $details1['name']=$user['name'];
                $details1['level']=$user['level'];
                array_push($tkmdata,$details1);  

            }
            $rank++;
        }
        }
        $data['tkm']=$tkmdata;
        $data['reg']=$regdata;
        $data['userdata']=$userdata;







        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);

    }
    public function clues()
    {
        redirect('https://www.facebook.com/incognito.tezoro','location');
        /*$this->load->library('session');
        $this->load->model('users_model');
        $data['clue_data']=$this->users_model->get_clues();
        $data['acthome']='';
        $data['actleaderboard']='';
        $data['actclues']='active';
        $data['actrules']='';
        $data['actprof']='';
        $data['title']='Clues';
        $page='clues';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);*/

    }
    public function rules()
    {
        $this->load->library('session');
        $page='rules';
        $data['title']='Rules';
        $data['acthome']='';
        $data['actleaderboard']='';
        $data['actcluebox']='';
        $data['actrules']='active';
        $data['actprof']='';
        $data['actstory']='';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);

    }
    public function profile()
    {
        $this->load->library('session');
        $this->load->model('users_model');
        $userid=$this->session->userdata('userid');
        if($userid==FALSE)
        {
            redirect('','location');
        }
        $page='profile';
        $data['title']='Profile';
        $data['acthome']='';
        $data['actleaderboard']='';
        $data['actcluebox']='';
        $data['actrules']='';
        $data['actprof']='active';      
        $data['actstory']='';
        $data['userdata']=$this->users_model->get_userdata($userid);
        $data['rank']=$this->users_model->get_rank();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
    public function story()
    {
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('users_model');
        $userid=$this->session->userdata('userid');


        if($userid==FALSE)
        {
            redirect('','location');
        }
        $config = array();
        $config["base_url"] = base_url() . "index.php/story";
        $total_row = $this->users_model->story_count($userid);
        $config["total_rows"] = $total_row;
        $config["per_page"] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 15;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['uri_segment'] = 2;
        
        $this->pagination->initialize($config);
        if($this->uri->segment(2)){
        $pageno = ($this->uri->segment(2)) ;
        if($pageno>$total_row)
        {
            redirect('','location');
        }
          }
        else{
               $pageno = 1;
        }
        $stdata=$this->users_model->get_story($userid,$pageno);
        if($stdata!=NULL)
        {
            $data['storydata'] = $stdata->result_array();
        }
        else
        {
            $data['storydata']=NULL;
        }
        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $data['total']=$total_row;





        $page='story';
        $data['title']='Story so far';
        $data['acthome']='';
        $data['actleaderboard']='';
        $data['actcluebox']='';
        $data['actrules']='';
        $data['actprof']='';      
        $data['actstory']='active';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function viewstory()
    {
        $this->load->model('users_model');
        $this->load->library('session');
        $userid=$this->session->userdata('userid');
        $userdata=$this->users_model->get_userdata($userid);
        if($userdata['status']==-1)
        {
            redirect('','location');
        }
        $story=$this->users_model->is_story_level($userdata['level']);
        if($story!=FALSE)
         $total_row = $this->users_model->story_count($userid); 
        else
          redirect('','location');
        redirect(base_url('index.php/story/'.$story['id']),'location');
   }
   public function jumptonext()
   {
          $this->load->model('users_model');
        $this->load->library('session');
        $userid=$this->session->userdata('userid');
        $this->users_model->nextphase($userid);
        redirect('pages/viewstory','location');

   }

    public function levels(){
        $file_name=$this->uri->segment(2, 0);
        $this->load->library('session');
        $userid=$this->session->userdata('userid');
        $this->load->model('users_model');
        $userdata=$this->users_model->get_userdata($userid);
        if (file_exists('./assets/levels/'.$file_name) && isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
        {
            header('HTTP/1.0 304 Not Modified');
            header("Cache-Control: max-age=12096000, public");
            header("Expires: Tue, 23 Jun 2020 00:00:00 GMT");
            header("Pragma: cache");
            exit;
        }
        if($userdata['status']==-1)
        {
            redirect('','location');
        }
        $question='level_'.$userdata['level'].'.jpg';
        $finish='finish_'.($userdata['level']-1).'.jpg';
        if(!strcmp($file_name,$question)||!strcmp($file_name,$finish))
        {
            if(!file_exists('./assets/levels/'.$file_name))
            {
                header('HTTP/1.0 404 Not Found');
                return;
            }
            else
            {
                header("Content-type: image/jpeg");
                header("Cache-Control: max-age=12096000, public");
                header("Expires: Sat, 26 Jul 2015 00:00:00 GMT");
                header("Pragma: cache");
                echo file_get_contents('./assets/levels/'.$file_name);
            }
        }
        else
        {
             redirect('','location');
        }      
    }

    public function storyimg(){
        $stno=$this->uri->segment(3, 0);
        $this->load->library('session');
        $userid=$this->session->userdata('userid');
        $this->load->model('users_model');
        if($userid==NULL)
            redirect('','location');
        $userdata=$this->users_model->get_userdata($userid);
        $story=$this->users_model->get_story($userid,$stno);
        if($story==NULL)
        {
            redirect('','location');
        }
        if($story->num_rows()>0)
        {
            $story=$story->row_array();
        }
        else
        {
            redirect('','location');
        }
        if (file_exists('./assets/story/story'.$story['storyid'].$story['imgid'].'.jpg') && isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
        {
            header('HTTP/1.0 304 Not Modified');
            header("Cache-Control: max-age=12096000, public");
            header("Expires: Tue, 23 Jun 2020 00:00:00 GMT");
            header("Pragma: cache");
            exit;
        }
        if($userdata['status']==-1)
        {
            redirect('','location');
        }
        $stlevel=$this->users_model->get_storylevel($stno);

        if($stlevel<=$userdata['level'])
        {
            if(!file_exists('./assets/story/story'.$story['storyid'].$story['imgid'].'.jpg'))
            {
                header('HTTP/1.0 404 Not Found');
                return;
            }
            else
            {
                header("Content-type: image/jpeg");
                header("Cache-Control: max-age=12096000, public");
                header("Expires: Sat, 26 Jul 2015 00:00:00 GMT");
                header("Pragma: cache");
                echo file_get_contents('./assets/story/story'.$story['storyid'].$story['imgid'].'.jpg');
            }
        }
        else
        {
             redirect('','location');
        }      
    }



}
