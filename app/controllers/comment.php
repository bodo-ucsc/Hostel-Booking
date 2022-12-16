<?php



    class Comment extends Controller
    {
        public function addComment()
        {

            if (isset($_POST['postid'])) {
                $commenttext = $_POST['comment'];
                $PostId = $_POST['postid'];
                $commentorid = $_SESSION['userid'];
                $this->model('addModel')->addAComment($commenttext,$PostId,$commentorid);
               
            }
        }


//         public function viewComments()
//         {
//             $data = $this->model('viewModel');
//             $this->view('comment/comment');
//         }

        public function deleteComment($post_id)
        {
             if (isset($post_id)) {
                $this->model('deleteModel')->deleteComment($post_id);
            }
        }
    }

