  <!-- NEWSLETTER SECTION START -->
            <div class="newsletter-section section-bg-tb pt-60 pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-xs-12">
                            <div class="newsletter">
                                <div class="newsletter-info text-center">
                                    <h2 class="newsletter-title">get a newsletter</h2>
                                    <p>Make sure that you never miss our interesting news <br class="hidden-xs">by joining our newsletter program.</p>
                                </div>
                                <div class="subcribe clearfix">
                                   
                                        <input type="text" name="email" id="subscriber_email" placeholder="Enter your email here..."/>
                                        <button class="submit-btn-2 btn-hover-2" onclick="newsletter_subscription()">subcribe</button>
                                   
                                </div>
                                <div id="messageSubscription" style="text-align: center; margin-top: 15px; color:green;"></div>
                                <div id="messageSubscription_error" style="text-align: center; margin-top: 15px; color:red;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!-- NEWSLETTER SECTION END -->     
           
           
           
           
           
           <script>
           function newsletter_subscription(){
           $.ajax({
                        type:'post',
                        url:'/user-subscription',

                        data:{
                          "_token": "{{ csrf_token() }}",
                          'subscriber_email':$('#subscriber_email').val()
                          
                        },

                        success: function (response) {
                                console.log(response.success);
                                if(response.success) {
                                document.getElementById("messageSubscription").innerHTML = response.success;
                                }
                                else {
                                    document.getElementById("messageSubscription_error").innerHTML = response.error;
                                }
                                
                        }
                    });
                }
                   
           
           </script>