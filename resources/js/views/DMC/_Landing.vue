<template>
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="empty">
          <div class="empty-img"><img src="tabler/static/illustrations/undraw_quitting_time_dm8t.svg" height="128" alt="">
          </div>
          <p class="empty-title">Temporarily down for maintenance</p>
          <p class="empty-subtitle text-secondary">
            Sorry for the inconvenience but we’re performing some maintenance at the moment. We’ll be back online shortly!
          </p>
          <div class="empty-action">
            <!-- <a href="./." class="btn btn-primary"> -->
              <router-link to="/login" class="btn btn-primary nav-link">
              <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
              Go to Login 
            </router-link>
            <!-- </a> -->
          </div>
        </div>
      </div>
    </div>
</template>