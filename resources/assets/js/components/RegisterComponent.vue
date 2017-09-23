<template>
<v-layout>
    <v-flex xs12 sm4 offset-sm4>
      <v-card class="register-template">
        <v-card-title primary-title>
          <div align="center" class="md-title"> 
            <label> Sign Up </label> 
          </div>
        </v-card-title>
        <v-card-text>
        <v-form width="100%" >

            <v-container >
                <div>
                    <span v-if="errorName" class="text-error">
                        <strong>{{nameError}}</strong>
                    </span>
                    <v-text-field prepend-icon="person"  label="Name" type="text" name="name" v-model="response.name" required autofocus></v-text-field>
                </div>

                <div>
                    <span v-if="errorEmail" class="text-error">
                        <strong>{{emailError}}</strong>
                    </span>
                    <v-text-field prepend-icon="email" label="Email" type="email" name="email" v-model="response.email" required></v-text-field>
                </div>

                <div :class="{'has-error':errorPassword}" md-has-password>
                    <span v-if="errorPassword" class="text-error">
                        <strong>{{ passwordError }}</strong>
                    </span>
                    <v-text-field prepend-icon="lock"  label="Password" type="password" name="password" v-model="response.password" required></v-text-field>
                </div>

                <div :class="{'has-error':errorPassword}" md-has-password>
                    <span v-if="errorPassword" class="text-error">
                        <strong>{{ passwordError }}</strong>
                    </span>
                    <v-text-field prepend-icon="lock"  label="Password Confirmation" type="password" name="password_confirmation" v-model="response.password_confirmation" required></v-text-field>
                </div>

                <v-btn block @click.prevent="registerPost"  class="primary" type="submit" >Send</v-btn>
                <br>
                <v-btn outline round  block class="cyan" href="/login">Sign In</v-btn>

            </v-container>

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
                    name:'',
                    email:'',
                    password:'',
                    password_confirmation:''
                },
                errorName:false,
                errorEmail:false,
                errorPassword:false,
                nameError:null,
                emailError:null,
                passwordError:null,
                showSlider:false
            }
            
        },
        methods:{
            registerPost(){
                let vm = this;
                vm.showSlider=true;
                vm.errorEmail=false;
                vm.errorPassword=false;
                axios.post('/register',vm.response)
                .then(function(res){
                    location.href='/home';
                })
                .catch(function(error){
                    var errors = error.response
                    if(errors.statusText === 'Unprocessable Entity' || errors.status === 422){
                        if (errors.data) {
                            if (errors.data.name) {
                                vm.errorName = true;
                                vm.nameError = _.isArray(errors.data.name) ? errors.data.name[0]:errors.data.name
                            }
                            if (errors.data.email) {
                                vm.errorEmail = true;
                                vm.emailError = _.isArray(errors.data.email) ? errors.data.email[0]:errors.data.email
                            }
                            if (errors.data.password) {
                                vm.errorPassword = true;
                                vm.passwordError = _.isArray(errors.data.password) ? errors.data.password[0]:errors.data.password
                            } 
                            vm.showSlider=false;
                        }
                    }
                })
            }
        }
    }
</script>
