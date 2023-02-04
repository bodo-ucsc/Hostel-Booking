<?php


class friends extends Controller
{

    public function index()
    {
        $this->view('friends/index');
    }

    public function friendrequest($sender,$receiver){
        $result = $this->model('addModel')->sendfriendrequest($sender,$receiver);
        return $result;
    }

    public function peopleYouMayKnow($university,$userid){
        $data1 = $this->model('viewModel')->getPeopleYouMayKnow($university);
        $data2 = $this->model('viewMdoel')->getfriends($userid);
        
    }



}
