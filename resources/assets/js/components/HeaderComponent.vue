<template>
<div >
    <md-layout class="header-component"  md-align="end" md-gutter>
      <md-menu md-size="4">
        <md-button class="md-icon-button" md-menu-trigger>
          <md-icon>phone</md-icon>
        </md-button>
        <md-menu-content>
          <md-menu-item>
            <md-icon>phone</md-icon>
            <span>My Item 1</span>
          </md-menu-item>
          <md-menu-item>
            <md-icon>phone</md-icon>
            <span>My Item 2</span>
          </md-menu-item>
          <md-menu-item>
            <md-icon>phone</md-icon>
            <span>My Item 3</span>
          </md-menu-item>
        </md-menu-content>
      </md-menu>

      <md-menu md-direction="bottom left" md-size="4">
        <md-button class="md-icon-button" md-menu-trigger>
          <md-icon>near_me</md-icon>
        </md-button>
        <md-menu-content>
          <md-menu-item>
            <span>Find on map</span>
            <md-icon>near_me</md-icon>
          </md-menu-item>
          <md-menu-item>
            <span>Call</span>
            <md-icon>phone</md-icon>
          </md-menu-item>
        </md-menu-content>
      </md-menu>

      <md-menu md-size="4" ref="menu">
        <md-button class="md-icon-button" md-menu-trigger>
          <md-icon>account_circle</md-icon>
        </md-button>
        <md-menu-content>
          <div class="author-card">
            <md-avatar class="md-large">
              <img src="https://images.alphacoders.com/486/thumb-1920-486997.png" width="20" height="20" alt="Marcos Moura">
            </md-avatar>

            <div class="author-card-info">
              <span>Marcos Moura</span>
              <div class="author-card-links">
                <router-link to="/profile">Profile</router-link>
                <a @click='logout' href="javascript:false;">Logout</a> 
              </div>
            </div>
          </div>
        </md-menu-content>
      </md-menu>

    </md-layout>
    <br>
    <div class="container">
        <router-view></router-view>
    </div>
</div>
</template>

<script>
    export default {
        methods:{
            logout(){
                let vm = this;
                axios.post('/logout')
                .then(function(res){
                    location.href='/login';
                })
                .catch(function(error){
                    console.log(error)
                })
            }
        }
    }
</script>
