<template>
<v-layout>
    <v-flex xs12 sm4 offset-sm4>
      <v-card class="login-template ">
        <v-card-title primary-title>
          <div align="center" class="md-title"> 
            <label> Sign In </label> 
          </div>
        </v-card-title>
        <v-card-text>
        <v-form width="100%" >
            <v-container :class="{'has-error':errorEmail}" md-has-email>
                <span v-if="errorEmail" class="help-block">
                    <strong>{{emailError}}</strong>
                </span>
                <v-text-field prepend-icon="email" id="email" label="Email" type="email" name="email" v-model="response.email" required autofocus></v-text-field>
            </v-container>
            <v-container :class="{'has-error':errorPassword}" md-has-password>
                <span v-if="errorPassword" class="help-block">
                    <strong>{{ passwordError }}</strong>
                </span>
                <v-text-field prepend-icon="lock" id="password" label="Password" type="password" name="password" v-model="response.password" required></v-text-field>
            </v-container>
            <v-container style="display:inline-block">
                <v-btn @click.prevent="loginPost" ref="send" class="green" type="submit" >Send</v-btn>
                <v-checkbox name="remember" v-model="response.remember" label="Remember"></v-checkbox>
            </v-container>
              <center>
                  <a href="/register">Sign Up</a>
                  <br>
                  <a  href="#">Forgout your password?</a>
              </center>
            <header v-if="showSlider" class="bar_progress">
                <div aria-busy="true" aria-label="Loading, please wait." role="progressbar"></div> 
            </header>
        </v-form>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
    export default {
        data(){
            return{
                response:{
                    email:'',
                    password:'',
                    remember:true
                },
                errorEmail:false,
                errorPassword:false,
                emailError:null,
                passwordError:null,
                showSlider:false
            }
            
        },
        methods:{
            loginPost(){
                let vm = this;
                vm.$refs.send.$el.disabled=true
                vm.showSlider=true;
                vm.errorEmail=false;
                vm.errorPassword=false;
                axios.post('/login',vm.response)
                .then(function(res){
                    location.href='/home';
                })
                .catch(function(error){
                    var errors = error.response
                    if(errors.statusText === 'Unprocessable Entity' || errors.status === 422){
                        if (errors.data) {
                            if (errors.data.email) {
                                vm.errorEmail = true;
                                vm.emailError = _.isArray(errors.data.email) ? errors.data.email[0]:errors.data.email
                            }
                            if (errors.data.password) {
                                vm.errorPassword = true;
                                vm.passwordError = _.isArray(errors.data.password) ? errors.data.password[0]:errors.data.password
                            } 
                            vm.showSlider=false;
                            vm.$refs.send.$el.disabled=false
                        }
                    }
                })
            }
        }
    }
</script>
