<?php

class feedbackForm
{
    public function __construct()
    {
        $base = BASEURL;
        echo "
        <div class='corner padding-3 bg-white-hover shadow border-circle' onclick='clickFunction()'>
            <i class = ' black-hover' data-feather='send'></i>
        </div>   
        
        <div id='submitForm' class='feedback-form shadow padding-2 border-rounded bg-white'>
            <form action='$base/feedback/sendFeedback' method='post'>
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

            var url = '$base/feedback/sendFeedback/'.concat(name).concat('/').concat(email).concat('/').concat(message);        
            console.log(url);
            fetch(url)
                .then((response) => response.json())
                .then((json) => {
                });

                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('message').value = '';
        }
        </script>        
        ";
    }
}