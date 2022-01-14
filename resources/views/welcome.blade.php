<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="author" content="" />
        <title>Landing Page - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('frontend') }}/css/styles.css" rel="stylesheet" />
        
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
               
               
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h5 class="mb-5">Find your new domain name. Enter your domain name with extension below to check availability.</h5>
                           
                            <form method="post" action="{{url('hosdf')}}">
                                <!-- Email address input-->
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-lg" id="domain" name="domain"  placeholder="Find Your New Domain Name" data-sb-validations="required,email" />
                                       
                                    </div>
                                    <div class="col-auto"> <button type="button" class="btn btn-success" id="searchbtn">Search</button></div>
                                </div>
                          
                            
                            </form>
                          
                        </div><br>
                         <h3> <div class="text-danger" id="result"></div></h3>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
       
        <!-- Call to Action-->
        <section class="call-to-action text-white text-center" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">Ready to get started? To check your Domain</h2>
                       
                       
                    </div>
                </div>
            </div>
        </section>
      
       
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $('body').on('click','#searchbtn',function(){

             $('#result').val('');
             let domain=$('#domain').val();
            if(domain==''){
                $('#result').html('please enter doamin');
            }
            else{
                $('#result').html('<img src="{{asset('img/loader.gif')}}">');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    type:'POST',
                    datatype:'json',
                    data:{domain:domain},
                    url:"domain/check",
                    success:function(data){
                        if(data.messages){
                             $('#result').html(data.messages);
                        }
                        if(data.DomainInfo.domainAvailability=="AVAILABLE"){
                             $('#result').html('Congratulations Domain Is'+'   '+data.DomainInfo.domainAvailability);

                        }else{
                             $('#result').html('Sorry Domain Is'+'   '+data.DomainInfo.domainAvailability);

                        }
                    }
                   
                })
            }
        })
    })
</script>
