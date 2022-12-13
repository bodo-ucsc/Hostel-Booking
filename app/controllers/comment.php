<?php

if (isset($_SESSION['username'])) {

    class Comment extends Controller
    {

        public function addComment()
        {
            $session_name = $_SESSION['username'];

            if (isset($_POST['postid'])) {
                $commenttext = $_POST['description'];
                $postid = $_POST['postid'];
                $commentorid = $_SESSION['userid'];
            }


        }


        public function viewComments()
        {
//             $data = $this->model('viewModel');
            $this->view('comment/comment');
        }

        public function deleteComment()
        {
             if (isset($post_id)) {
                $this->model('deleteModel')->deleteComment($post_id);
            }
            $this->viewComments();

        }
    }
}
