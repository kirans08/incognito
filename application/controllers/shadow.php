<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Shadow extends CI_Controller {



    function _construct()

    {

        parent::_construct();

        $this->load->helper('url');

        $this->load->model('users_model');

        $this->load->library("pagination");



    }

	public function status()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='active';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['title']='Status';

            $page='status';

            $data['leveldata']=$this->shadow_model->get_levels();

            $data['top']=$this->shadow_model->get_top();

            $data['topper']=$this->shadow_model->get_topper();

            $data['userno']=$this->shadow_model->get_usercount();

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);  

        }

    

    }

    public function levellog()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='active';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $level=$this->input->post('loglevel',TRUE);

            $data['title']='Answer Log';

            $page='levellog';

            $data['level']=$level;

            $data['answerlog']=$this->shadow_model->get_levellog($level);

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);  

        }

    

    }

    public function upload()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->library('form_validation');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='active';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['title']='Upload Level';

            $page='upload';

            $data['leveldata']=$this->shadow_model->get_levels();

            $data['top']=$this->shadow_model->get_maxlevel();

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data); 

        }



    }

    public function do_upload()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $uploadtype=$this->input->post('uploadtype',TRUE);

            if($uploadtype==1)

            {

                $filename='level_';

            }

            else if($uploadtype==2)

            {

                $filename='finish_';

            }

            $level=$this->input->post('level',TRUE);

            $filename=$filename.$level.'.jpg';

            $config['file_name']=$filename;

            $config['upload_path'] = './assets/levels/';

            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';

            $config['max_size'] = '2048';

            $config['max_width']  = '2600';

            $config['max_height']  = '1600';

            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())

            {

                $error = array('error' => $this->upload->display_errors());

                redirect(base_url('index.php/shadow/upload'),'refresh');

            }

            redirect(base_url('index.php/shadow/manage'),'refresh');

        }

    }

    public function manage()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='active';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['top']=$this->shadow_model->get_top();

            $data['nextlevel']=$this->shadow_model->get_maxlevel()+1;

            $data['title']='Manage Level';

            $page='manage';

            $data['leveldata']=$this->shadow_model->get_levels();

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data); 

        }



    }

    public function storyman()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

          $this->load->helper('form');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='active';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data1=$this->shadow_model->get_nextstory();

            if($data1!=NULL)

            {

          $data['cur']=$data1;

                        $data1['storyid']++;

                        $data1['imgid']=1;

                        $data['next']=$data1;

                    }

                    else

                    {

                        $data['cur']=NULL;

                        $data['next']=NULL;

                    }

            $data['title']='Create Story';

            $data['leveldata']=$this->shadow_model->get_levels();



            $page='storyman';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data); 

        }



    }

    public function storyup()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

          $this->load->helper('form');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='active';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['title']='Upload Story';

            $page='storyup';

            $data['storydata']=$this->shadow_model->get_story();

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data); 

        }



    }

      public function createcur()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->createcur();

            redirect('shadow/storyman','location');







        }

    }

          public function createnext()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $level=$this->input->post('level',TRUE);

            if($level!=NULL)

            {

                $this->shadow_model->createnext($level);

            }

            redirect('shadow/storyman','location');



        }

    }

    /*  public function deletestory()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {







        }

    }*/



     public function story_upload()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $story=$this->input->post('story',TRUE);

            $filename='story'.$story.'.jpg';

            $config['file_name']=$filename;

            $config['upload_path'] = './assets/story/';

            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';

            $config['max_size'] = '2048';

            $config['max_width']  = '2600';

            $config['max_height']  = '1600';

            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())

            {

                $error = array('error' => $this->upload->display_errors());

                redirect(base_url('index.php/shadow/storyup'),'refresh');

            }

            redirect(base_url('index.php/shadow/storyman'),'refresh');

        }

    }

    public function createlevel()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->createlevel();

            redirect(base_url('index.php/shadow/manage'),'refresh');

        }



    }

    public function modify()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->modify_user();

            $userid=$this->input->get('userid', TRUE);

            redirect(base_url('index.php/shadow/userdetails?userid='.$userid),'refresh');

        }





    }

    public function levelact()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->level_act();

            redirect(base_url('index.php/shadow/manage'),'refresh');

        }





    }

    public function leveledit()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->library('form_validation');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='active';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['title']='Edit Level';

            $level=$this->input->get('level',TRUE);

            $page='leveledit';

            $data['cluedata']=$this->users_model->get_clues($level);

            $data['leveldata']=$this->shadow_model->get_levels($level);

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data); 

        }

    }

    public function updatelevel()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->level_update();

            redirect(base_url('index.php/shadow/manage'),'refresh');

        }

    }

    public function swap()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='active';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['leveldata']=$this->shadow_model->get_levels();

            $data['title']='Swap Levels';

            $page='swap';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);

        }

    }

    public function swaplevels()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->swap_levels();

            redirect(base_url('index.php/shadow/manage'),'refresh');

        }

    }

    public function users()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $this->load->library('table');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='active';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $usdata=$this->shadow_model->get_userlist();

            $data['userlist']=$usdata;

            $data['title']='User List';

            $page='users';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data); 

        }

    }

    

    public function userdetails()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='active';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $userid=$this->input->get('userid', TRUE);

            $data['answerlog']=$this->shadow_model->get_answerlog($userid);

            $data['user']=$this->users_model->get_userdata($userid);

            $data['title']='Answer Log';

            $page='userdetails';

           



            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data); 

        }

    }

    public function site()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='active';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['leveldata']=$this->shadow_model->get_levels();

            $data['title']='Manage Site';

            $page='site';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);

        }

    }

    public function deact()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->deactivate_all();

            redirect(base_url('index.php/shadow/status'),'refresh');

        }

    }

    public function act()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->activate_all();

            redirect(base_url('index.php/shadow/status'),'refresh');

        }

    }

    public function test()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='active';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['leveldata']=$this->shadow_model->get_levels();

            $data['title']='Test Site';

            $page='test';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);

        }

    }

    public function testlevel()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='active';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $level=$this->input->post('testlevel',TRUE);

            if($level==0)

            {

                redirect(base_url('index.php/shadow/test'),'refresh');

            }

            $leveldata=$this->shadow_model->get_levels($level);

            $data['level']=$leveldata;

            if($leveldata['title_clue']!=NULL)

            {

                $data['title']=$leveldata['title_clue'];

            }

            else

            {

                $data['title']='Level '.$leveldata['level'];

            }

            if($leveldata['cookie_clue']!=NULL)

            {

                $cookie = array(

                 'name'   => 'EULC',

                 'value'  =>  $leveldata['cookie_clue'],

                 'expire' => '300',

                 'domain' => 'localhost',

                 'path'   => '/',

                 'prefix' => '',

                 'secure' => FALSE

                );

                $this->input->set_cookie($cookie); 

            }

            $page='testarena';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);

        }

    }

     public function testanswer()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='active';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $level=$this->input->post('testlevel',TRUE);

            $answer=$this->input->post('answer',TRUE);

        $answer=preg_replace("/[^A-Za-z0-9 ]/", '', $answer);
        $answer=preg_replace('/\s+/','',$answer);
        
        $answer=strtolower($answer);

            $leveldata=$this->shadow_model->get_levels($level);

            if(md5($answer)==$leveldata['answer'])

            {

                $data['result']=TRUE;

                $data['img']=$leveldata['finish'];

            }

            else

            {

                $data['result']=FALSE;

                $data['level']=$level;

            }



            $data['title']='Answer';

            $page='testanswer';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);

        }

    }

    public function hide()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='active';

            $data['actforcereset']='';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $this->config->load('leaderboard');

            $data['nop']=$this->config->item('leaderboard');

            $data['title']='Hide Leaderboard';

            $page='hide';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);

        }



    }

    public function hidelb()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $nop=$this->input->post('nop',TRUE);

            if($nop=='-1')

            {

                $cus=$this->input->post('custom',TRUE);

                $cus=preg_replace('/\s+/','',$cus);

                if($cus!='')

                {

                    $nop=$cus;

                }

                else

                {

                    $nop='0';

                }

            }

            $out='';

            $pattern='$config[\'leaderboard\']';

            $filename="application/config/leaderboard.php";

            if(file_exists($filename))

            {

                $file=fopen($filename, 'w+');

                $out='<?php $config[\'leaderboard\'] = \''.$nop.'\'; ?>';

                fputs($file,$out);

                fclose($file);

            }

            redirect(base_url('index.php/leaderboard/'.$nop),'refresh');

        }





    }

    public function forcereset()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='active';

            $data['actforceset']='';

            $data['userdata']=$userdata;

            $data['leveldata']=$this->shadow_model->get_levels();

            $data['top']=$this->shadow_model->get_top();

            $data['title']='Force Reset';

            $page='forcereset';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);

        }





    }

    public function forceset()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $data['actstatus']='';

            $data['actupload']='';

            $data['actmanage']='';

            $data['actsto']='';

            $data['actstoup']='';

            $data['actswap']='';

            $data['actusers']='';

            $data['acttest']='';

            $data['actsite']='';

            $data['acthide']='';

            $data['actforcereset']='';

            $data['actforceset']='active';

            $data['userdata']=$userdata;

            $data['leveldata']=$this->shadow_model->get_levels();

            $data['top']=$this->shadow_model->get_top();

            $data['title']='Force Set';

            $page='forceset';

            $this->load->view('shadow/header', $data);

            $this->load->view('shadow/'.$page, $data);

            $this->load->view('templates/footer', $data);

        }





    }

    public function resetlevels()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->reset_levels();

            redirect(base_url('index.php/shadow/users'),'refresh');

        }

    }

    public function setlevels()

    {

        $this->load->library('session');

        $this->load->helper('form');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $this->shadow_model->set_levels();

            redirect(base_url('index.php/shadow/users'),'refresh');

        }

    }

    public function shadowaccess()

    {

        $this->load->library('session');

        $this->load->model('users_model');

        $this->load->model('shadow_model');

        $userid=$this->session->userdata('userid');

        $userdata=$this->users_model->get_userdata($userid);

        if($userdata['status']!=2)

        {

            redirect('','location');

        }

        else

        {

            $file_name=$this->uri->segment(3, 0);

            $this->load->library('session');

            $userid=$this->session->userdata('userid');

            $this->load->model('users_model');

            $userdata=$this->users_model->get_userdata($userid);

            if($userdata['status']!=2)

            {

                redirect('','location');

            }

            if(!file_exists('./assets/levels/'.$file_name))

            {

                header('HTTP/1.0 404 Not Found');

                return;

            }

            else

            {

                header("Content-type: image/jpeg");

                echo file_get_contents('./assets/levels/'.$file_name);

            }

        }    

    }

}