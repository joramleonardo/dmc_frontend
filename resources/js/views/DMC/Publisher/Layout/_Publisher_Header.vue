<template>
    <div class="tabler-container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a >
                <!-- <img src="tabler/static/logo-stii.png" style="width: 10%;" alt="Tabler" class=""> -->
                <span style="color: #4299e1;">
                    DOST MULTIMEDIA COLLECTION
                </span>
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm">
                    <!-- <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-square-rounded">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                        <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                    </svg> -->
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                        <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                    </svg>

                </span>
                <div class="d-none d-xl-block ps-2">
                  <div>
                    {{this.displayName}}
                  </div>
                  <div class="mt-1 small text-secondary">
                    <span v-if="this.role === '1'">
                        Super Admin
                    </span>
                    <span v-if="this.role === '2'">
                        Admin
                    </span>
                    <span v-if="this.role === '3'">
                        Author
                    </span>
                    <span v-if="this.role === '4'">
                        Publisher
                    </span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" data-bs-theme="light">
                
                <!-- <a href="./sign-in.html" class="dropdown-item">Settings</a> -->
                <router-link to="/login" class="nav-link">
                  
                  <a class="dropdown-item">Logout</a>
                </router-link>
              </div>
            </div>
          </div>
        </div>
</template>

<script type="text/javascript">

    import * as auth_service from '../../../../services/auth_service.js';

    export default {
        data() {
            return {
                displayName: '',
                role: ''
            }
        },
        mounted(){
            this.userData();
        },
        methods: {
            userData: async function(){
                try{

                    
                    const response = await auth_service.getUserData();
                    
                    this.displayName=response.data.user.name;
                    this.role=response.data.user.role;
                } catch(error) {
                    this.flashMessage.error({
                    message: 'Some error occured! Please try again.',
                    time: 5000
                    });
                }
            }
        }
    }
</script>