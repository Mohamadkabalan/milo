<template>
  <div class="custom-form-container">
    <form  method="post" data-vv-scope="login-form" @submit.prevent="loginAction('login-form')">
      <div class="form-group margin_b_20" :class="[errors.has('email', 'login-form') ? 'has-error' : '' ]">
        <label for="email" class="mandatory label-style form-labels">Email or username</label>
        <input type="email" id="email" name="email" placeholder="Email or username" class="form-control" v-model="email" v-validate="'required'" data-vv-as="&quot;Email&quot;">
        <span class="control-error"  v-text="errors.first('email','login-form')"></span>
      </div>
      <div class="form-group" :class="[errors.has('password','login-form') ? 'has-error' : '' ]" >
        <label for="password" class="mandatory label-style">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" class="form-control" v-model="password" v-validate="'required'" data-vv-as="&quot;Password&quot;">
        <span class="control-error"  v-text="errors.first('password','login-form')"></span>
      </div>
      <div>
        <p class="control-error" v-text="errorMessage"></p>
      </div>
      <div class="submit-container box-section__action">
        <input id="custom-submit-button" type="submit" value="Sign In" class="btn btn-primary">
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: null,
      password: null,
      errorMessage:null
    }
  },
  mounted() {
    console.log('Component mounted.')
  },
  methods: {
    loginAction(formScope) {
      console.log('form submitted');
      this.$validator.validateAll(formScope).then(result => {
        if(result){
          this.$http.post('/users/login-action', {email:this.email,password:this.password}).then(response => {
             console.log(response);
             if(response.data.status=='success'){
                  window.location='/users/home';
             }else{
               this.errorMessage=response.data.message;
             }
          }).catch(error => {

          })
        }
      });
    }
  }

}
</script>