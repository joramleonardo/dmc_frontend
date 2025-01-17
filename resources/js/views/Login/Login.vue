
<template>
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="card card-md event-card">
                <div class="card-body">
                  <h2 class="h2 text-center mb-4">Login to your account</h2>
                  <!-- <form action="./" method="get" autocomplete="off" novalidate> -->
                    <!-- <form> -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Your username" v-model="user.username" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control"  placeholder="Your password"  v-model="user.password" autocomplete="off">
                                <span class="input-group-text">
                                    <a  class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button @click="loginUser" type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    <!-- </form> -->
                  <!-- </form> -->
                </div>
              </div>
              <!-- <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
              </div> -->
            </div>
          </div>
          <div class="col-lg d-none d-lg-block">
            <img src="tabler/static/illustrations/undraw_secure_login_pdn4.svg" height="300" class="d-block mx-auto" alt="">
            <!-- <img src="images/stii-logo.png" height="300" class="d-block mx-auto" alt=""> -->
          </div>
        </div>
      </div>
    </div>
</template>

<script>

    import * as auth_service from '../../services/auth_service.js';

    export default {
        data(){
            return {
                user: {
                    username: '',
                    password: ''
                },
                isLogging: false
            }
        },
        methods:{
            loginUser: async function(){

                try{
                    let formData_eventData = new FormData();
                    formData_eventData.append('username', this.user.username);
                    formData_eventData.append('password', this.user.password);
                    // console.log(formData_eventData);

                    const response = await auth_service.validateUser(formData_eventData);
                    let role_data = response.data.token_scope;
                    // console.log(response.data.token_scope);

                    if(role_data == 'superadmin'){
                        this.$router.push('/pub/dashboard');
                    } 
                    else if(role_data == 'admin'){
                        this.$router.push('/admin/home/dashboard');
                    } 
                    else if(role_data == 'encoder'){
                        // this.$router.push('/author/home/dashboard');
                        this.$router.push('/author/events');
                    } 
                    else if(role_data == 'publisher'){
                        this.$router.push('/publisher/events');
                    } 
                }catch(error){

                }

                // try {
                //     const response = await authServices.login(this.user);

                //     if(response.token_scope == 'encoder'){
                //         this.$router.push('/ticket/superadmin/status');
                //     } 
                //     else if(response.token_scope == 'publisher'){
                //         this.$router.push('/ticket/admin/dashboard');
                //     } 
                //     else if(response.token_scope == 'admin'){
                //         this.$router.push('/ticket/staff/status');
                //     }
                //     else if(response.token_scope == 'superadmin'){
                //         this.$router.push('/ticket/staff/status');
                //     }

                //     let a_username = this.user.username;
                //     let activity_id = 1;
                //     let activity_date = activityDate;

                //     let formData_activityLog = new FormData();
                //     formData_activityLog.append('username', a_username);
                //     formData_activityLog.append('activity_id', activity_id);
                //     formData_activityLog.append('activity_date', activity_date);
                //     const response_activityLog = await ticket_service.addActivityLog(formData_activityLog);
                    

                // } catch(error) {
                //         this.flashMessage.error({
                //         message: 'Some error occured! Please try again.',
                //         time: 5000
                //         });
                // }
                
                

                // await router.push('/event/dashboard');
            }
        }
    }


</script>

<style scoped>


    .event-card {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .body{
        background: linear-gradient(90deg, #6c92b4, #337ab8);	
    }
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .screen {		
        background: linear-gradient(90deg, #6c92b4, #337ab8);		
        position: relative;	
        height: 600px;
        width: 360px;	
        box-shadow: 0px 0px 24px #81a5c5;
    }

    .screen__content {
        z-index: 1;
        position: relative;	
        height: 100%;
    }

    .screen__background {		
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        -webkit-clip-path: inset(0 0 0 0);
        clip-path: inset(0 0 0 0);	
    }

    .screen__background__shape {
        transform: rotate(45deg);
        position: absolute;
    }

    .screen__background__shape1 {
        height: 520px;
        width: 520px;
        background: #FFF;	
        top: -50px;
        right: 120px;	
        border-radius: 0 72px 0 0;
    }

    .screen__background__shape2 {
        height: 220px;
        width: 220px;
        background: #337ab8;	
        top: -172px;
        right: 0;	
        border-radius: 32px;
    }

    .screen__background__shape3 {
        height: 540px;
        width: 190px;
        background: linear-gradient(270deg, #6c92b4, #337ab8);
        top: -24px;
        right: 0;	
        border-radius: 32px;
    }

    .screen__background__shape4 {
        height: 400px;
        width: 200px;
        background: #337ab8;	
        top: 420px;
        right: 50px;	
        border-radius: 60px;
    }

    .login {
        width: 320px;
        padding: 30px;
        padding-top: 156px;
    }

    .login__field {
        padding: 20px 0px;	
        position: relative;	
    }

    .login__icon {
        position: absolute;
        top: 30px;
        color: #337ab8;
        margin-left: 4px;
    }

    .form-title{
        
        color: #337ab8;
    }

    .login__input {
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 700;
        width: 75%;
        transition: .2s;
    }

    .login__input:active,
    .login__input:focus,
    .login__input:hover {
        outline: none;
        border-bottom-color: #6c92b4;
    }

    .login__submit {
        background: #fff;
        font-size: 14px;
        margin-top: 30px;
        padding: 16px 20px;
        border-radius: 26px;
        border: 1px solid #D4D3E8;
        text-transform: uppercase;
        font-weight: 700;
        display: flex;
        align-items: center;
        width: 100%;
        color: #337ab8;
        box-shadow: 0px 2px 2px #6c92b4;
        cursor: pointer;
        transition: .2s;
    }

    .login__submit:active,
    .login__submit:focus,
    .login__submit:hover {
        border-color: #6c92b4;
        outline: none;
    }

    .button__icon {
        font-size: 24px;
        margin-left: auto;
        color: #337ab8;
    }

    .social-login {	
        position: absolute;
        height: 140px;
        width: 160px;
        text-align: center;
        bottom: 0px;
        right: 0px;
        color: #fff;
    }

    .social-icons {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-login__icon {
        padding: 20px 10px;
        color: #fff;
        text-decoration: none;	
        text-shadow: 0px 0px 8px #337ab8;
    }

    .social-login__icon:hover {
        transform: scale(1.5);	
    }
</style>