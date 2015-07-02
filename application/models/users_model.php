<?php

class Users_model extends CI_Model {



	public function __construct()

	{

		$this->load->database();

	}

	public function get_level($level=NULL)

	{

		/*$this->load->library('session');

        $userid=$this->session->userdata('userid');

		$userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));

		$level=1;

		if($userdata->num_rows()>0)

		{

			$row=$userdata->row_array();

			$level=$row['level'];

		}*/
		if($level==NULL)
			return NULL;

		$leveldata=$this->db->get_where('levels',array('level'=>$level));

		if($leveldata->num_rows()>0)

		{

			$row=$leveldata->row_array();

			if($row['active']==0)

			{

				return NULL;

			}

			return $row;

		}

		return NULL;

	}

	public function get_levels()

	{

		$this->db->order_by('level desc'); 

		$leveldata=$this->db->get('levels');

		return $leveldata->result_array();

	}

	public function get_userdata($userid=FALSE)

	{

		$userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));

		if($userdata->num_rows()>0)

		{

			$row=$userdata->row_array();

			return $row;

		}

		return FALSE;

	}

	public function create($userdata=FALSE)

	{

		$org_time=time();

		$ind_time=$org_time+19800;

		$time1=date("Y-m-d H:i:s",$ind_time);

		$data=array(

			'fb_userid'=>$userdata['id'],

			'name'=>$userdata['name'],

			'user_profile'=>$userdata['link'],

			'level'=>'1',

			'pass_time'=>$time1,

			'college'=>$this->input->post('college',TRUE),

			'emailid'=>$this->input->post('emailid',TRUE),

			'mobileno'=>$this->input->post('mobileno',TRUE),

			'status'=>'1'

			);

		$data1=array(

			'userid'=>$userdata['id'],

			'cluebox'=>1);

		$this->db->insert('userlist',$data);

 		$this->db->insert('userstats',$data1);

 		return;

	}

	public function check_answer($answer=' ')

	{

		$this->load->library('session');

        $userid=$this->session->userdata('userid');

		$userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));

		if($userdata->num_rows()>0)

		{

			$userrow=$userdata->row_array();

			$level=$userrow['level'];

		}

		else

		{

			redirect('','location');

		}

		$answer = (strlen($answer) > 30) ? substr($answer,0,30): $answer;

		$answer=preg_replace('/\s+/','',$answer);
		  $answer=preg_replace("/[^A-Za-z0-9 ]/", '', $answer);

		$answer=strtolower($answer);

		$org_time=time();

		$ind_time=$org_time+19800;

		$time1=date("Y-m-d H:i:s",$ind_time);

		$data=array(

			'user_id'=>$userrow['fb_userid'],

			'name'=>$userrow['name'],

			'level'=>$level,

			'answer'=>$answer,

			'time'=>$time1

			);

		$this->db->insert('answer_log',$data);

		$leveldata=$this->db->get_where('levels',array('level'=>$level));

		if($leveldata->num_rows()>0)

		{

			$row=$leveldata->row_array();

			if($row['active']==0)

			{

				return FALSE;

			}

		}

		else

		{

			return FALSE;

		}

		$org=$row['answer'];

		if(md5($answer)==$org)

		{

			$userrow['level']=$userrow['level']+1;

			$userrow['pass_time']=$time1;

			$this->db->where('fb_userid',$userrow['fb_userid']);

			$this->db->update('userlist',$userrow);

			return $row['finish'];

		}

		else

		{

			return FALSE;

		}

	}

	public function get_clues($level=FALSE)

	{

		if($level!=FALSE)

		{

			$cluedata=$this->db->get_where('clues',array('level'=>$level));

			if($cluedata->num_rows()>0)

			{

				$row=$cluedata->row_array();

				return $row;

			}

			else

			{

				return FALSE;

			}



		}

		$this->load->library('session');

        $userid=$this->session->userdata('userid');

        $userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));

		if($userdata->num_rows()>0)

		{

			$row=$userdata->row_array();

			$level=$row['level'];			

		}

		else

		{

			return FALSE;

		}

		$leveldata=$this->db->get_where('levels',array('level'=>$level));

		$row=$leveldata->row_array();

		if($leveldata->num_rows()<0)

		{

			return NULL;

		}

		if($row['active']==0)

		{

			return NULL;

		}

		$cluedata=$this->db->get_where('clues',array('level'=>$level));

		if($cluedata->num_rows()>0)

		{

			$row=$cluedata->row_array();

			return $row;

		}

		return NULL;

	}

	public function get_rank()

	{

		$this->load->library('session');

        $userid=$this->session->userdata('userid');

        if($userid==FALSE)

        {

        	return FALSE;

        }

        $userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));

        if($userdata->num_rows()==0)

        {

        	return FALSE;

        }

        $userrow=$userdata->row_array();

        $this->db->where('level >',$userrow['level']);

        $this->db->where('status =','1');

        $res1=$this->db->get('userlist');

		$this->db->where('level =',$userrow['level']);

		$this->db->where('pass_time <',$userrow['pass_time']);

        $this->db->where('status =','1');

        $res2=$this->db->get('userlist');

        $rank=$res1->num_rows()+$res2->num_rows()+1;

        return $rank;

	}

	public function get_userlist()

	{

		$this->db->order_by('level desc, pass_time asc'); 

		$userdata=$this->db->get_where('userlist',array('status'=>'1'));

		if($userdata->num_rows()>0)

		{

			return $userdata->result_array();

		}

		else

		{

			return FALSE;

		}

	}

	public function get_question()

	{

		$this->load->library('session');

        $userid=$this->session->userdata('userid');

		$userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));

		$level=1;

		if($userdata->num_rows()>0)

		{

			$row=$userdata->row_array();

			$level=$row['level'];

		}

		$leveldata=$this->db->get_where('levels',array('level'=>$level));

		if($leveldata->num_rows()>0)

		{

			$row=$leveldata->row_array();

			if($row['active']==0)

			{

				return NULL;

			}

		}

		else

		{

			return 'level';

		}

		$question=$row['question'];

		return $question;

	}

	public function get_finish()

	{

		$this->load->library('session');

        $userid=$this->session->userdata('userid');

		$userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));

		$level=1;

		if($userdata->num_rows()>0)

		{

			$row=$userdata->row_array();

			$level=$row['level'];

		}

		$level=$level-1;

		if($level==0)

		{

			return 'finish';

		}

		$leveldata=$this->db->get_where('levels',array('level'=>$level));

		if($leveldata->num_rows()>0)

		{

			$row=$leveldata->row_array();

			if($row['active']==0)

			{

				return NULL;

			}

		}

		$finish=$row['finish'];

		return $finish;

	}

	public function story_count($userid=NULL)

	{

		if($userid==NULL)

			return;

		$this->db->where('fb_userid',$userid);

		$row=$this->db->get('userlist');

		if($row->num_rows()>0)

	    {

	    	$row=$row->row_array();

	    }

    	$level=$row['level'];

	    $this->db->where('storylevel <=',$level);

	    $row=$this->db->get('story');

	    if($row->num_rows()>0)

	    {

	    	return $row->num_rows();

	    }

        return NULL;

	}

	public function get_story($userid=NULL,$pageno=NULL)

	{

		if($userid==NULL)

			return;

		$this->db->where('fb_userid',$userid);

		$row=$this->db->get('userlist');

		if($row->num_rows()>0)

	    {

	    	$row=$row->row_array();

	    }

    	$level=$row['level'];

	    $this->db->where('storylevel <=',$level);

	    $this->db->where('id',$pageno);

	    $row=$this->db->get('story');

	    if($row->num_rows()>0)

	    {

	    	return $row;

	    }

        return NULL;

	}

	public function get_storylevel($id=NULL)

	{

		if($id==NULL)

			return;

	    $this->db->where('id',$id);

	    $row=$this->db->get('story');

	    if($row->num_rows()>0)

	    {

	    	$row=$row->row_array();

	    	return $row['storylevel'];

	    }

        return NULL;

	}

	public function is_story_level($level=NULL)

	{

		if($level==NULL)

			 return;

		$this->db->where('storylevel',$level);

		$row=$this->db->get('story');

	    if($row->num_rows()>0)

	    {

	    	$res=$row->row_array();

	    	return $res;

	    }

	    return FALSE;





	}
	public function nextphase($userid=NULL)
	{
		if($userid==NULL)
			return;
		$userdata=$this->db->get_where('userlist',array('fb_userid'=>$userid));
		if($userdata->num_rows()>0)
		{
			$userrow=$userdata->row_array();
		}

		else

		{

			redirect('','location');

		}
		if(($userrow['level']<=16)&&($userrow['phase']!=1))
		{
			$userrow['level']=16;

			$userrow['phase']=1;
			$org_time=time();

		$ind_time=$org_time+19800;

		$time1=date("Y-m-d H:i:s",$ind_time);
		$userrow['pass_time']=$time1;

			$this->db->where('fb_userid',$userrow['fb_userid']);

			$this->db->update('userlist',$userrow);
		}
		

	}

	

}