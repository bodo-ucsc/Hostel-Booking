<?php

class feedbackForm
{
    public function __construct()
    {
        $base = BASEURL;
        $nullval = NULL;

        if(isset($_SESSION['UserId'])){

            $userid = $_SESSION['UserId'];

            echo "
            <div class='corner padding-3 bg-white-hover shadow border-circle' onclick='clickFunction()'>
                <i class = ' black-hover' data-feather='send'></i>
            </div>   
            
            <div id='submitForm' class='feedback-form shadow padding-4 border-rounded bg-white'>
                <form action='$base/feedback/sendFeedback' method='post'>
                <input type='hidden' id='userid' name='userid' value=$userid>
                <input type='hidden' id='email' name='email' value=$nullval>
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>Name</lable><br>
                            <input class=' margin-top-1 margin-bottom-2 ' type = 'text' id='name' name='name'>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>Feedback Type</lable><br>
                            <select class=' margin-top-1 margin-bottom-2 '  id='feedbacktype' name='feedbacktype'>
                                <option value='' disabled selected>Feedback Type</option>
                                <option value='Suggestion'>Suggestion</option>
                                <option value='Issue'>Issue</option>
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>Topic</lable><br>
                            <input class=' margin-top-1 margin-bottom-2 ' type = 'text' id='topic' name='topic'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>Message</lable><br>
                            <textarea class=' margin-top-1 margin-bottom-2 ' type = 'text' id='message' name='message'></textarea>
                        </div>
                    </div>
                </form>
                <div class='row'>
                    <div class='col-12 margin-right-2 margin-left-3 fill-container'>    
                    <button type='submit' class='bg-blue-hover padding-horizontal-5 border-rounded  white-hover' onclick='submitFeedback()'>Send</button>
                    </div>
                </div>
               
            </div>
    
            <script>
    
            var display = false;
    
            function clickFunction(){
                if(display){
                    document.getElementById('submitForm').style.display = 'none';
                    display = false
                }else{
                    document.getElementById('submitForm').style.display = 'block';
                    display = true
                }
            }
    
            function submitFeedback(){
    
                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let message = document.getElementById('message').value;
                let type = document.getElementById('feedbacktype').value;
                let topic = document.getElementById('topic').value;
                let uid = document.getElementById('userid').value;
                
    
                var url = '$base/feedback/sendFeedback/'.concat(name).concat('/').concat(email).concat('/').concat(message).concat('/').concat(type).concat('/').concat(uid).concat('/').concat(topic);        
                console.log(url);
                fetch(url)
                    .then((response) => response.json())
                    .then((json) => {
                    });
    
                    document.getElementById('name').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('message').value = '';
                    document.getElementById('feedbacktype').value = '';
                    document.getElementById('topic').value = '';
            }
            </script>        
            ";

        }else{
            echo "
            <div class='corner padding-3 bg-white-hover shadow border-circle' onclick='clickFunction()'>
                <i class = ' black-hover' data-feather='send'></i>
            </div>   
            
            <div id='submitForm' class='feedback-form shadow padding-4 border-rounded bg-white'>
                <form action='$base/feedback/sendFeedback' method='post'>
                    <input type='hidden' id='userid' name='userid' value=$nullval>
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>Name</lable><br>
                            <input class=' margin-top-1 margin-bottom-2 ' type = 'text' id='name' name='name'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>E mail</lable><br>
                            <input class=' margin-top-1 margin-bottom-2 ' type = 'text' id='email' name='email'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>Feedback Type</lable><br>
                            <select class=' margin-top-1 margin-bottom-2 '  id='feedbacktype' name='feedbacktype'>
                                <option value='' disabled selected>Feedback Type</option>
                                <option value='Suggestion'>Suggestion</option>
                                <option value='Issue'>Issue</option>
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>Topic</lable><br>
                            <input class=' margin-top-1 margin-bottom-2 ' type = 'text' id='topic' name='topic'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12 fill-container'>    
                            <lable for='name'>Message</lable><br>
                            <textarea class=' margin-top-1 margin-bottom-2 ' type = 'text' id='message' name='message'></textarea>
                        </div>
                    </div>
                </form>
                <div class='row'>
                    <div class='col-12 margin-right-2 margin-left-3 fill-container'>    
                    <button type='submit' class='bg-blue-hover padding-horizontal-5 border-rounded  white-hover' onclick='submitFeedback()'>Send</button>
                    </div>
                </div>
               
            </div>
    
            <script>
    
            var display = false;
    
            function clickFunction(){
                if(display){
                    document.getElementById('submitForm').style.display = 'none';
                    display = false
                }else{
                    document.getElementById('submitForm').style.display = 'block';
                    display = true
                }
            }
    
            function submitFeedback(){
    
                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let message = document.getElementById('message').value;
                let type = document.getElementById('feedbacktype').value;
                let topic = document.getElementById('topic').value;
                let uid = document.getElementById('userid').value;
                
    
                var url = '$base/feedback/sendFeedback/'.concat(name).concat('/').concat(email).concat('/').concat(message).concat('/').concat(type).concat('/').concat(uid).concat('/').concat(topic);        
                console.log(url);
                fetch(url)
                    .then((response) => response.json())
                    .then((json) => {
                    });
    
                    document.getElementById('name').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('message').value = '';
                    document.getElementById('feedbacktype').value = '';
                    document.getElementById('topic').value = '';
            }
            </script>        
            ";
        }

       
    }
}