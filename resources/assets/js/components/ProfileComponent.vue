<template >
<div class="template">
    <div class="template-title"  >
        <b> User Profile </b>
    </div>
     <v-container fluid grid-list-md text-xs-center>
        <v-tabs dark fixed centered>
            <v-tabs-bar class="cyan darken-3">
              <v-tabs-slider class="yellow"></v-tabs-slider>
              <v-tabs-item href="#tab1">
                Data
              </v-tabs-item>
              <v-tabs-item href="#tab2">
                Settings
              </v-tabs-item>
            </v-tabs-bar>
            <v-tabs-items>
              <v-tabs-content id="tab1">
                <v-card flat>
                  <v-card-text>
                    <form method="post">
                    <v-layout row wrap>
                      <v-flex xs12 sm12 md4  >
                        <v-text-field label="Name" v-model="save.name" id="name" name="name"></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm12 md4  >
                        <v-text-field label="Email" v-model="save.email" id="email" name="email"></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm12 md3 offset-md1 >
                        <div>
                            <img  src="http://m1.sinaimg.cn/maxwidth.360/m1.sinaimg.cn/012a3a04ef4e48a5814d2a2aaa676f9b_500_333.jpg" width="180px" height="120px" >
                            <div style="display:grid;float:right">
                                <v-btn outline  fab class="red--text">
                                  <v-icon>delete</v-icon>
                                </v-btn>
                                <v-btn outline  fab class="green--text">
                                  <v-icon>edit</v-icon>
                                </v-btn>
                            </div>
                        </div>
                      </v-flex>
                       <v-btn round @click.prevent="updateUser" ref="send" type="submit" primary dark>Done</v-btn>
                    </v-layout>
                    </form>
                  </v-card-text>
                </v-card>
              </v-tabs-content>
              <v-tabs-content id="tab2">
                <v-card flat>
                    <v-card-text>
                        <form method="post">
                            <v-layout row wrap>
                                <v-flex xs12 sm12 md5 offset-md4 >
                                    <v-text-field label="Current password" v-model="change.currentPassword" required id="currentPassword" ></v-text-field>
                                    <v-text-field label="New password" v-model="change.newPassword" required id="newPassword"></v-text-field>
                                    <v-text-field label="Confirm password" v-model="change.passwordConfirmation" required id="passwordConfirmation"></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-btn round @click.prevent="changePasword" ref="send" type="submit" class="deep-orange">Change</v-btn>
                        </form>
                    </v-card-text>
                </v-card>
              </v-tabs-content>
            </v-tabs-items>
          </v-tabs>
      </v-container>     
</div>
<!-- 
    <div class="template" >


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




      

  
    </div>  -->
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
                axios.patch('update/user/&',vm.save)
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