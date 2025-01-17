
<template>
    <main>
        <div>
            <b-navbar toggleable="lg" type="dark" variant="dark">
                <b-navbar-brand href="#">ASSETS</b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <!-- <b-nav-item href="#">
                        <router-link to="/login" class="nav-link">
                            <span>Login</span>
                        </router-link>
                    </b-nav-item> -->
                    <b-nav-item href="#">
                        <router-link to="/register" class="nav-link">
                            <span>Register</span>
                        </router-link>
                    </b-nav-item>
                </b-navbar-nav>

                </b-collapse>
            </b-navbar>
            <div class="body">
                <div class="container">
                    <div class="screen">
                        <div class="screen__content">
                            <div class="login" id="RegisterForm">
                                <h3 class="form-title">Create an Account</h3>
                                <div class="login__field">
                                    <i class="login__icon fas fa-user"></i>
                                    <input class="login__input" placeholder="Name" v-model="registerData.name">
                                </div>
                                <div class="login__field">
                                    <i class="login__icon fas fa-user"></i>
                                    <input class="login__input" placeholder="Username" v-model="registerData.username">
                                </div>
                                <div class="login__field">
                                    <i class="login__icon fas fa-lock"></i>
                                    <input type="password" class="login__input" placeholder="Password" v-model="registerData.password">
                                </div>
                                <!-- <div class="login__field">
                                    <i class="login__icon fas fa-lock"></i>
                                    <input type="password" class="login__input" placeholder="Confirm Password" v-model="registerData.confirmPassword">
                                </div> -->
                                <b-form-group class="group" id="form_externalEventDate">
                                    <!-- <label for="entryDate" class="label" style="color:black; font-weight: bold">Event Category:</label> -->
                                    <b-form-select class="login__input"  v-model="selected_category_album" :options="options_category_album" required></b-form-select>
                                </b-form-group> 
                                <button class="button login__submit" @click="saveRegisterForm()">
                                    <span class="button__text">Create</span>
                                    <i class="button__icon fas fa-chevron-right"></i>
                                </button>				
                            </div>
                        </div>
                        <div class="screen__background">
                            <span class="screen__background__shape screen__background__shape4"></span>
                            <span class="screen__background__shape screen__background__shape3"></span>		
                            <span class="screen__background__shape screen__background__shape2"></span>
                            <span class="screen__background__shape screen__background__shape1"></span>
                        </div>		
                    </div>
                </div>
            </div>
        </div>
                <b-modal id="modal_savedSuccessfully" ref="modal_savedSuccessfully" centered title="Success" hide-footer no-close-on-backdrop
                :header-bg-variant="headerBG_savedSuccessfully" :header-text-variant="headerText_savedSuccessfully">
                    <div>
                        <h5>User account was created successfully!</h5>
                    </div>
                    <div>
                        <b-button class="mt-3" variant="primary" @click="reloadPage()">Okay</b-button>
                    </div>
                </b-modal>
        <!-- <FlashMessage position="right bottom"> </FlashMessage> -->
    </main>
</template>

<script>

    import router from '../../router';
    import * as auth_service from '../../services/auth_service';


    export default {
        data(){
            return {
                headerBG_savedSuccessfully: 'success',
                headerText_savedSuccessfully: 'light',
                registerData: {
                    name: '',
                    username: '',
                    password: '',
                    confirmPassword: ''
                },
                selected_category_album: null,
                options_category_album: [
                    { value: null, text: 'Please select User role', disabled: true},
                    // { value: '1', text: 'Super Admin' },
                    { value: '2', text: 'Admin' },
                    { value: '3', text: 'Encoder' },
                    { value: '4', text: 'Publisher' },
                ],
            }
        },
        methods:{
            saveRegisterForm: async function(){
                console.log(this.registerData.name);
                console.log(this.registerData.username);
                console.log(this.registerData.password);
                console.log(this.registerData.confirmPassword);
                console.log(this.registerData);

                try{

                    let formData_userData = new FormData();
                    formData_userData.append('name', this.registerData.name);
                    formData_userData.append('username', this.registerData.username);
                    formData_userData.append('password', this.registerData.password);
                    formData_userData.append('role', this.selected_category_album);
                    
                    const response_userData = await auth_service.addRegisteredUsers(formData_userData);
                    
                    this.$refs.modal_savedSuccessfully.show()

                }catch(error){

                }
                 
            },
            reloadPage() {
                this.$refs.modal_savedSuccessfully.hide()
                window.location.reload();
            },
        }
    }


</script>

<style scoped>

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
        /* height: 600px; */
        width: 50%;	
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
        /* width: 320px; */
        padding: 30px;
        padding-top: 60px;
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
</style>>