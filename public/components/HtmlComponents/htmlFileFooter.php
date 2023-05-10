<?php

class HTMLFooter
{

    public function __construct($alert = null, $message = null)
    {
        $base = BASEURL;

        $suprole = $_SESSION['role'];
        $supuserid = $_SESSION['UserId'];
        if (isset($_SESSION['UserId'])) {
            if ($suprole == 'Admin' || $suprole == 'Manager' || $suprole == 'VerificationTeam') {
                echo "";
            } else {
                echo "
        <script src='https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js'></script>
        <script src='https://unpkg.com/filepond@^4/dist/filepond.js'></script>
        
        <script>
        
            document.getElementById('currUrl').value = window.location.href;
        
            function openSupportModal() {
                document.getElementById('supportModal').classList.remove('display-none');
            }
            
            function closeSupportModal() {
                document.getElementById('supportModal').classList.add('display-none');
            }
            
            window.onclick = function (event) {
                modal = document.getElementById('supportModal');
                if (event.target == modal) {
                    modal.classList.add('display-none');
        
                }
            }
        
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.create(document.getElementById('supportimage'), {
                server: '<?php echo BASEURL ?>/imageUpload/support',
                allowImagePreview: false
            });
        
            // console log file path after submit
            document.getElementById('supportimage').addEventListener('FilePond:processfile', function (e) {
                const serverId = e.detail.file.serverId;
                console.log(serverId);
                // parse the JSON object
                const jsonResponse = JSON.parse(serverId);
                // access the filepath
                const filepath = jsonResponse.filepath;
                console.log(filepath);
                if (filepath != null) {
                    document.getElementById('supportImages').value = filepath;
                }
            });
        </script>
        ";
            }
        } else {
            echo "
        
        <script>
        function openSupportModal() {
                Swal.fire({
                    title: 'Contact Support',
        
                    html:
                        '<div class=\"row no-gap\">' +
                        '<div class=\"col-12 fill-container left\">' +
                        '<label for=\"email-from\">Your Email Address</label>' +
                        '<input type=\"email\" class=\"fill-container\" id=\"email-from\" placeholder=\"Your email address\"/>' +
                        // '<label for=\"email-to\">To</label>'+
                        '<input type=\"hidden\" class=\"fill-container\" id=\"email-to\" value=\"jvatsbodo@gmail.com\"/>' +
                        '<label for=\"email-subject\">Subject</label>'+
                        '<input type=\"text\" class=\"fill-container\" id=\"email-subject\" placeholder=\"Enter subject here\" value=\"\"/>' +
                        '<label for=\"email-text\">Message</label>'+
                        '<textarea class=\"fill-container\" id=\"email-text\" rows=\"10\" placeholder=\"Enter your message here\"></textarea>' +
                        '</div>' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonText: 'Send',
        
        
                }).then((result) => {
                    if (result.isConfirmed) {
                        const data = {
                            emailFrom: document.getElementById('email-from').value,
                            emailTo: document.getElementById('email-to').value,
                            emailSubject: document.getElementById('email-subject').value,
                            emailText: document.getElementById('email-text').value,
                        };
        
                        fetch(\"$base/support/email/\", {
                            method: \"POST\",
                            headers: {
                                \"Content-Type\": \"application/json\"
                            },
                            body: JSON.stringify(data)
                        }).then(response => response.json())
                            .then(json => {
                                if (json.Status === 'Success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Email Sent',
                                        text: 'Email sent successfully!',
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!'
                                    })
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!'
                                })
                            });
                    }
                });
        
            }
            </script>
        ";
        }

        echo "

            <script src='https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

            <script> 


            function toggleNav(openElement,closeElement) {
                document.getElementById(openElement).classList.add('display-block');
                document.getElementById(closeElement).classList.add('display-none'); 
                document.getElementById(openElement).classList.remove('display-none');
                document.getElementById(closeElement).classList.remove('display-block'); 
              } 
              
               
              ";

        if (isset($alert) && isset($message)) {
            $title = ucfirst($alert);
            echo "
                Swal.fire({
                    icon: '$alert',
                    title: '$title',
                    text: '$message'
                })";
        }
        echo "
                feather.replace();

            </script>
        </body>
        
        </html>
            
            ";


    }
}


?>