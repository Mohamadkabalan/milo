<template>
  <div class="custom-form-container">
    <form  method="post" data-vv-scope="register-form" @submit.prevent="registerAction('register-form')">
      <div class="form-group margin_b_20" :class="[errors.has('name', 'register-form') ? 'has-error' : '' ]">
        <label for="name" class="mandatory label-style form-labels">Name</label>
        <input type="text" id="name" name="name" placeholder="Full Name" class="form-control" v-model="name" v-validate="'required'" data-vv-as="&quot;Name&quot;">
        <span class="control-error"  v-text="errors.first('name','register-form')"></span>
      </div>
      <div class="form-group margin_b_20" :class="[errors.has('email', 'register-form') ? 'has-error' : '' ]">
        <label for="email" class="mandatory label-style form-labels">Email or username</label>
        <input type="email" id="email" name="email" placeholder="Email or username" class="form-control" v-model="email" v-validate="'required'" data-vv-as="&quot;Email&quot;">
        <span class="control-error"  v-text="errors.first('email','register-form')"></span>
      </div>
      <div class="form-group" :class="[errors.has('password','register-form') ? 'has-error' : '' ]" >
        <label for="password" class="mandatory label-style">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" class="form-control" v-model="password" v-validate="'required'" data-vv-as="&quot;Password&quot;">
        <span class="control-error"  v-text="errors.first('password','register-form')"></span>
      </div>
      <div>
<!--      <div class="form-group" :class="[errors.has('password_confirmation','register-form') ? 'has-error' : '']">
         <label for="password_confirmation" class="mandatory label-style">Password Confirmation</label>
         <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" v-model="password_confirmation" v-validate="'required|min:6|confirmed:password'" placeholder="Password Confirmation" data-vv-as="&quot;Password Confirmation&quot;">
         <span class="control-error" v-show="errors.has('password_confirmation','register-form')" v-text="errors.first('password_confirmation','register-form')"></span>
      </div>-->
        <p class="control-error" v-text="errorMessage"></p>
      </div>
      <div class="submit-container box-section__action">
        <input id="custom-submit-button" type="submit" value="Sign Up" class="btn btn-primary">
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: null,
      name: null,
      password: null,
      password_confirmation: null,
      errorMessage:null
    }
  },
  mounted() {
    console.log('Component mounted.')
  },
  methods: {
    registerAction(formScope) {
      console.log('form submitted');
      this.$validator.validateAll(formScope).then(result => {
        if(result){
          this.$http.post('/users/register-action', {email:this.email,password:this.password,name:this.email}).then(response => {
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