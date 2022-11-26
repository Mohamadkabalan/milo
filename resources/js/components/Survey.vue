<template>
  <div class="container py-5 seller-signup">

    <form id="survey-form"  method="post" data-vv-scope="survey-form" @submit.prevent="surveyAction('survey-form')">
      <div class="row">
        <div class="steps">
          <div class="step-item" :class="currentStep=='Step1' ? 'step-item--active' : '' ">
            <a href="#" class="btn btn-link step-item__link"><i class="far fa-ballot-check mr-2"></i>Step1</a>
          </div>
          <div class="step-item" :class="currentStep=='Step2' ? 'step-item--active' : '' ">
            <a href="#" class="btn btn-link step-item__link"><i class="far fa-credit-card mr-2"></i>Step2</a>
          </div>
        </div>
      </div>
      <Step1 v-show="currentStep == 'Step1'" :questions="questions"  @updateStep="updateStep"></Step1>
      <Step2 v-show="currentStep == 'Step2'" :questions="questions"  @back="back"></Step2>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      errorMessage:null,
      currentStep:'Step1',
    }
  },
  props:['questions'],
  mounted() {

  },
  methods: {
    updateStep(step){
      this.currentStep=step;
    },
    surveyAction(formScope) {
      if(this.currentStep=='Step2'){
        this.$validator.validateAll(formScope).then(result => {
          if(result){
            this.$http.post('/users/submit-survey', {questions:this.questions}).then(response => {
              console.log(response);
              if(response.data.status=='success'){
                window.location='/users/statistics';
              }else{
                this.errorMessage=response.data.message;
              }
            }).catch(error => {

            })
          }
        });
      }
    },
    back(){
      this.currentStep='Step1';
    }

  }

}
</script>