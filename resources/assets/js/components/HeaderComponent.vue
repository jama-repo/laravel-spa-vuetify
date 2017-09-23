<template>
<div>
  <v-toolbar dark class="primary">
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title class="white--text">Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
      <v-btn to="/profile" flat>Profile</v-btn>
    </v-toolbar-items>
    <v-btn icon>
      <v-icon>search</v-icon>
    </v-btn>
    <v-btn icon>
      <v-icon>apps</v-icon>
    </v-btn>
    <v-btn  @click='logout' class="red darken-1 white--text">Logout
      <v-icon dark right>power_settings_new</v-icon>
    </v-btn>
  </v-toolbar>
  <v-container>
      <router-view></router-view>
  </v-container>

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
