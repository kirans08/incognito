<?php
class Shadow_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_levels($level=FALSE)
	{
		if($level!=FALSE)
		{
			$this->db->where('level',$level);
			$leveldata=$this->db->get('levels');
			return $leveldata->row_array();
		}
		$this->db->order_by('level desc'); 
		$leveldata=$this->db->get('levels');
		return $leveldata->result_array();
	}
	public function get_top()
	{
		$this->db->select_max('level');
		$this->db->where('status','1');
		$result=$this->db->get('userlist');
		$row=$result->row_array();
		$top=$row['level'];
		return $top;
	}
	public function get_maxlevel()
	{
		$this->db->select_max('level');
		$result=$this->db->get('levels');
		$row=$result->row_array();
		$top=$row['level'];
		return $top;
	}
	public function get_usercount()
	{
		$this->db->order_by('level desc, pass_time asc'); 
		$userdata=$this->db->get_where('userlist',array('status'=>'1'));
		if($userdata->num_rows()>0)
		{
			 $result['normal']=$userdata->num_rows();
		}
		else
		{
			 $result['normal']=0;;
		}
		$userdata=$this->db->get_where('userlist',array('status'=>'2'));
		if($userdata->num_rows()>0)
		{
			$result['admin']=$userdata->num_rows();
		}
		else
		{
			$result['admin']=0;;
		}
		$userdata=$this->db->get_where('userlist',array('status'=>'-1'));
		if($userdata->num_rows()>0)
		{
			$result['banned']=$userdata->num_rows();
		}
		else
		{
			$result['banned']=0;;
		}
		$result['total']=$result['normal']+$result['admin']+$result['banned'];
		return $result;
	}
	public function get_topper()
	{
		$this->db->order_by('level desc, pass_time asc'); 
		$this->db->where('status','1');
		$userdata=$this->db->get('userlist',1);
		if($userdata->num_rows()>0)
		{
			return $userdata->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	public function get_userlist()
	{
		$this->db->order_by('status desc,level desc, pass_time asc'); 
		$userdata=$this->db->get('userlist');
		if($userdata->num_rows()>0)
		{
			return $userdata->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	public function get_answerlog($userid=FALSE)
	{
		$this->db->order_by('time desc'); 
		$this->db->where('user_id',$userid);
		$result=$this->db->get('answer_log');
		if($result->num_rows()>0)
		{
			return $result->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	public function get_levellog($level=FALSE)
	{
		$this->db->order_by('time desc'); 
		$this->db->where('level',$level);
		$result=$this->db->get('answer_log');
		if($result->num_rows()>0)
		{
			return $result->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	public function modify_user()
	{
		$this->load->library('session');
		$this->config->load('decepto');
        $masterid=$this->config->item('masterid');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$userid=$this->input->get('userid', TRUE);
	        $status=$this->input->get('status', TRUE);
    	    $userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));
			if($userdata->num_rows()>0)
			{
				$userrow=$userdata->row_array();
			}
			if($userrow['status']!=2)
			{
				$userrow['status']=$status;
	        	$this->db->where('fb_userid',$userid);
		    	$this->db->update('userlist',$userrow);
		    }
		    else if(($reqrow['fb_userid']==$masterid)&&($userrow['fb_userid']!=$masterid))
		    {
		    	$userrow['status']=$status;
	        	$this->db->where('fb_userid',$userid);
		    	$this->db->update('userlist',$userrow);
		    }
		}
		else
		{
			redirect('','location');
		}
	}
	public function level_act()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$level=$this->input->get('level', TRUE);
	        $active=$this->input->get('active', TRUE);
    	    $leveldata=$this->db->get_where('levels',array('level'=>$level));
			if($leveldata->num_rows()>0)
			{
				$levelrow=$leveldata->row_array();
			}
			$levelrow['active']=$active;
	       	$this->db->where('level',$level);
		   	$this->db->update('levels',$levelrow);
		}
		else
		{
			redirect('','location');
		}
	}
	public function level_update()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$level=$this->input->post('level',TRUE);
			$answer=$this->input->post('answer',TRUE);
			$title_clue=$this->input->post('title_clue',TRUE);
			$html_clue=$this->input->post('html_clue',TRUE);
			$textbox_clue=$this->input->post('textbox_clue',TRUE);
			$cookie_clue=$this->input->post('cookie_clue',TRUE);
			$difficulty=$this->input->post('difficulty',TRUE);
			$clue_status=$this->input->post('clue_status',TRUE);
			$clue1=$this->input->post('clue1',TRUE);
			$clue2=$this->input->post('clue2',TRUE);			
			$clue3=$this->input->post('clue3',TRUE);
			$clue4=$this->input->post('clue4',TRUE);
			$leveldata=$this->db->get_where('levels',array('level'=>$level));
		    $levelrow=$leveldata->row_array();
		    $cluedata=$this->db->get_where('clues',array('level'=>$level));
		    $cluerow=$cluedata->row_array();
		    if($answer!='')
		    {
		    	$levelrow['answer']=md5($answer);
		    }
		    if($title_clue!='')
		    {
		    	$temptitle=preg_replace('/\s+/','',$title_clue);
		    	if($temptitle!='')
		    		$levelrow['title_clue']=$title_clue;
		    	else
		    		$levelrow['title_clue']=NULL;
		    }
		    if($html_clue!='')
		    {
		    	$levelrow['html_clue']=$html_clue;
		    }
		    if($textbox_clue!='')
		    {
		    	$levelrow['textbox_clue']=$textbox_clue;
		    }
		    if($cookie_clue!='')
		    {
		    	$tempcookie=preg_replace('/\s+/','',$cookie_clue);
		    	if($tempcookie!='')
		    		$levelrow['cookie_clue']=$cookie_clue;
		    	else
		    		$levelrow['cookie_clue']=NULL;
		    }
		    if($difficulty!='')
		    {
		    	$levelrow['difficulty']=$difficulty;
		    }
		    if($clue_status!='')
		    {
		    	$cluerow['clue_status']=$clue_status;
		    }
		    if($clue1!='')
		    {
		    	$cluerow['clue1']=$clue1;
		    }
		    if($clue2!='')
		    {
		    	$cluerow['clue2']=$clue2;
		    }
		    if($clue3!='')
		    {
		    	$cluerow['clue3']=$clue3;
		    }
		    if($clue4!='')
		    {
		    	$cluerow['clue4']=$clue4;
		    }		    
	        $this->db->where('level',$level);
		   	$this->db->update('levels',$levelrow);
		   	$this->db->where('level',$level);
		   	$this->db->update('clues',$cluerow);
		}
		else
		{
			redirect('','location');
		}

	}
	public function swap_levels()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$source=$this->input->post('sourcelevel',TRUE);
			$target=$this->input->post('targetlevel',TRUE);
			if($source!=$target)
			{
				$source_file='./assets/levels/level_'.$source.'.jpg';
				$temp_file='./assets/levels/temp.jpg';
				$target_file='./assets/levels/level_'.$target.'.jpg';
				rename($source_file,$temp_file);
				rename($target_file,$source_file);
				rename($temp_file,$target_file);
				$source_file='./assets/levels/finish_'.$source.'.jpg';
				$temp_file='./assets/levels/temp.jpg';
				$target_file='./assets/levels/finish_'.$target.'.jpg';
				rename($source_file,$temp_file);
				rename($target_file,$source_file);
				rename($temp_file,$target_file);
				$sourceclue=$this->db->get_where('clues',array('level'=>$source));
				$srow=$sourceclue->row_array();
				$targetclue=$this->db->get_where('clues',array('level'=>$target));
				$trow=$targetclue->row_array();
				$temp=$srow;
				$srow['clue_status']='0';
				$trow['clue_status']='0';
				$srow['clue1']=$trow['clue1'];
				$srow['clue2']=$trow['clue2'];
				$srow['clue3']=$trow['clue3'];
     			$srow['clue4']=$trow['clue4'];
				$trow['clue1']=$temp['clue1'];
				$trow['clue2']=$temp['clue2'];
				$trow['clue3']=$temp['clue3'];
				$trow['clue4']=$temp['clue4'];
				$this->db->where('level',$source);
				$this->db->update('clues',$srow);
				$this->db->where('level',$target);
		   		$this->db->update('clues',$trow);
		   		$sourcelevel=$this->db->get_where('levels',array('level'=>$source));
				$srow=$sourcelevel->row_array();
				$targetlevel=$this->db->get_where('levels',array('level'=>$target));
				$trow=$targetlevel->row_array();
				$temp=$srow;
				$srow['title_clue']=$trow['title_clue'];
				$srow['answer']=$trow['answer'];
				$srow['html_clue']=$trow['html_clue'];
     			$srow['textbox_clue']=$trow['textbox_clue'];
     			$srow['cookie_clue']=$trow['cookie_clue'];
     			$srow['difficulty']=$trow['difficulty'];
				$trow['title_clue']=$temp['title_clue'];
				$trow['answer']=$temp['answer'];
				$trow['html_clue']=$temp['html_clue'];
				$trow['textbox_clue']=$temp['textbox_clue'];
				$trow['cookie_clue']=$temp['cookie_clue'];
				$trow['difficulty']=$temp['difficulty'];
				$this->db->where('level',$source);
				$this->db->update('levels',$srow);
				$this->db->where('level',$target);
		   		$this->db->update('levels',$trow);
			}

		}
		else
		{
			redirect('','location');
		}
	}	
	public function reset_levels()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$resetlevel=$this->input->post('resetlevel',TRUE);
			if($resetlevel!=0)
			{
				$this->db->where('level >=',$resetlevel);
				$leveldata=$this->db->get('levels');
				$leveldata= $leveldata->result_array();
				foreach ($leveldata as $level) 
				{
					$level['active']='0';
					$this->db->where('level',$level['level']);
					$this->db->update('levels',$level);
				}
				$userdata=$this->db->get('userlist');
				$userdata=$userdata->result_array();
				foreach($userdata as $user)
				{
					$user['level']=$resetlevel;
					$this->db->where('fb_userid',$user['fb_userid']);
					$this->db->update('userlist',$user);
				}
			}
		}
		else
		{
			redirect('','location');
		}
	}
	public function set_levels()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$setlevel=$this->input->post('setlevel',TRUE);
			$this->db->where('level <=',$setlevel);
			$leveldata=$this->db->get('levels');
			$leveldata= $leveldata->result_array();
			foreach ($leveldata as $level) 
			{
				$level['active']='1';
				$this->db->where('level',$level['level']);
				$this->db->update('levels',$level);
			}
			$this->db->where('level <',$setlevel);
			$userdata=$this->db->get('userlist');
			$userdata=$userdata->result_array();
			foreach($userdata as $user)
			{
				$user['level']=$setlevel;
				$this->db->where('fb_userid',$user['fb_userid']);
				$this->db->update('userlist',$user);
			}
		}
		else
		{
			redirect('','location');
		}
	}
	public function deactivate_all()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$leveldata=$this->db->get('levels');
			$leveldata= $leveldata->result_array();
			foreach ($leveldata as $level) 
			{
				$level['active']='0';
				$this->db->where('level',$level['level']);
				$this->db->update('levels',$level);
			}
		}
		else
		{
			redirect('','location');
		}
	}
	public function activate_all()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$leveldata=$this->db->get('levels');
			$leveldata= $leveldata->result_array();
			foreach ($leveldata as $level) 
			{
				$level['active']='1';
				$this->db->where('level',$level['level']);
				$this->db->update('levels',$level);
			}
		}
		else
		{
			redirect('','location');
		}
	}
	public function createlevel()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$this->db->select_max('level');
			$result=$this->db->get('levels');
			$row=$result->row_array();
			$level=$row['level'];
			$level=$level+1;
			$leveldata=array(
						'level'=>$level,
						'question'=>'level_'.$level.'.jpg',
						'answer'=>'',
						'finish'=>'finish_'.$level.'.jpg',
						'title_clue'=>'',
						'html_clue'=>'',
						'cookie_clue'=>'',
						'textbox_clue'=>'',
						'active'=>'0',
						'difficulty'=>'');
			$this->db->insert('levels',$leveldata);
			$cluedata=array(
						'level'=>$level,
						'clue_status'=>'0',
						'clue1'=>'',
						'clue2'=>'',
						'clue3'=>'',
						'clue4'=>'');

			$this->db->insert('clues',$cluedata);
		}
		else
		{
			redirect('','location');
		}

	}
	public function get_nextstory()
	{

		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{

			$id=0;
			$img=0;

			$this->db->order_by('storyid desc,imgid desc');
			 $row=$this->db->get('story');
			 if($row->num_rows()>0)
			 {
			  $row=$row->row_array();
			  $data['storyid']=$row['storyid'];
			  $data['imgid']=$row['imgid']+1;
			  $data['level']=$row['storylevel'];
			 }
			 else 
			 {
			 	return NULL;
			 }

			return $data;		
	    }
	}
	public function createcur()
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			 $this->db->order_by('storyid desc,imgid desc');
			 $row=$this->db->get('story');
			 if($row->num_rows()>0)
			 {
			 $row=$row->row_array();
			 $data['storyid']=$row['storyid'];
			 $data['imgid']=$row['imgid']+1;
			 $data['storylevel']=$row['storylevel'];
			 $this->db->insert('story',$data);
			 }
			 else 
			 {
			 	return NULL;
			 }

	
	    }

	}
		public function createnext($level)
	{
		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			 $this->db->order_by('storyid desc,imgid desc');
			 $row=$this->db->get('story');
			 if($row->num_rows()>0)
			 {
			 $row=$row->row_array();
			 $data['storyid']=$row['storyid']+1;
			 $data['imgid']=1;
			 $data['storylevel']=$level;
			 $this->db->insert('story',$data);
			  }
			 else 
			 {
			 	$data['storyid']=1;
			    $data['imgid']=1;
			    $data['storylevel']=$level;
			    $this->db->insert('story',$data);
			 }

	
	    }

	}
	public function get_story()
	{

		$this->load->library('session');
        $reqid=$this->session->userdata('userid');
        $reqdata=$this->db->get_where('userlist',array('fb_userid'=>$reqid));
		if($reqdata->num_rows()>0)
		{
			$reqrow=$reqdata->row_array();
		}
		if($reqrow['status']==2)
		{
			$row=$this->db->get('story');
			return $row->result_array();
	    }
	}
}