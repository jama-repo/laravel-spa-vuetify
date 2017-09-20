<template >
    <div class="template" >
    
    <md-layout class="template-title" md-align="center" >
        <b> User Profile </b>
    </md-layout>

<md-tabs md-centered>
  <md-tab md-label="Basic Data" md-icon="account_box">
    <form>
    <md-layout md-align="center" md-gutter>
      <md-layout md-flex-xsmall="80"  md-flex-medium="80"  md-flex="30">
          <md-input-container >
            <label>Name</label>
            <md-input v-model="save.name" id="name" name="name"></md-input>
          </md-input-container>

          <md-input-container >
            <label>Email</label>
            <md-input v-model="save.email" id="email" name="email"></md-input>
          </md-input-container>
      </md-layout>
  
      <md-layout md-align="center" md-flex-xsmall="80"  md-flex-medium="80" md-flex="20">
        <center>
        <hr>
        <div>
            <img  src="http://m1.sinaimg.cn/maxwidth.360/m1.sinaimg.cn/012a3a04ef4e48a5814d2a2aaa676f9b_500_333.jpg" width="180px" height="120px" >
        </div>
        <hr>
            <md-button class="md-icon-button md-raised md-primary">
              <md-icon>add</md-icon>
            </md-button>
            <md-button class="md-icon-button md-raised md-accent">
              <md-icon>delete</md-icon>
            </md-button>
        </center>
      </md-layout>
    </md-layout>

    <md-button @click.prevent="updateUser" ref="send" type="submit" class="md-raised md-primary">Save</md-button>

</form>
</md-tab>

  <md-tab md-label="Change Pasword" md-icon="vpn_key">
    <form>
    <md-layout md-align="center" md-gutter>
      <md-layout align="center" md-flex-xsmall="80" md-flex-medium="50" md-flex="30">
            <md-input-container  class="md-input-invalid">
                <label>Current Password</label>
                <md-input v-model="change.currentPassword" id="currentPassword" name="currentPassword" required></md-input>
              </md-input-container>

            <md-input-container  class="md-input-invalid">
                <label>New Password</label>
                <md-input v-model="change.newPassword" id="newPassword" name="newPassword" required></md-input>
              </md-input-container>

            <md-input-container  class="md-input-invalid">
                <label>Confirm Password</label>
                <md-input v-model="change.passwordConfirmation" id="passwordConfirmation" name="passwordConfirmation" required></md-input>
              </md-input-container>

      </md-layout>
    </md-layout>

    <md-button @click.prevent="changePasword" ref="send" type="submit" class="md-raised md-primary">Save password</md-button>

    </form>
  </md-tab>


</md-tabs>




      

  
    </div> 
</template>

<script>
    document.title='User Profile';
    export default {
        data(){
            return{
                save:{
                    name:'jaja ',
                    email:'jojo'
                },
                change:{
                    password:'',
                    newPassword:'',
                    passwordConfirmation:''
                },
                errorChange:null,
                errorSave:null
            }
        },
        methods:{
            updateUser(){
                let vm = this;
                axios.patch('update/user/{}',vm.save)
                .then(function(res){
                    console.log(res)
                })
                .catch(function(error){
                    console.log(error)
                })
            },
            changePasword(){
                let vm = this;
                console.log(vm)
            }
        }
    }
</script>

<style>
.container{
    width:75% ;
}
</style>