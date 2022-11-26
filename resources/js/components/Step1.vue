<template>
  <div id="">
    <div class="row">
      <div class="col">
        <div class="form-section">
          <div class="errors" v-if="stepErrors.length > 0">
            <p class="text-danger" v-for="error in stepErrors">{{error}}</p>
          </div>
          <div v-for="(question,index) in questions.slice(0, 5)" :key="index" class="row">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
              <div class="py-2 h5"><b v-html="index + 1  + '.   '+ question.question + ' ?'"></b></div>
              <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                <label v-for="(answer,key) in question.answers" :key="key" class="options">{{answer.answer}}
                  <input  v-on:change="setQuestionAnswer(question.id,answer.id)" type="radio" :name="question.id" :value="answer.id" v-model="question.user_answer" required>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="form-actions">
          <div class="row">
            <div class="col">
              <a href="/" class="btn btn-outline-gray"><i class="far fa-times mr-2"></i>Cancel</a>
            </div>
            <div class="col text-right">
              <SubmitButton text="Next" faIconRight="chevron-right" @clickEvent="submit" :loading="isLoading"></SubmitButton>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Step1",
  data: () => ({
    stepErrors: [],
    isLoading: false
  }),
  props:['questions'],
  async mounted() {

  },
  methods: {
    async submit() {
      let pass=true;
      for (let i=0; i < 5;i++){
        if(typeof this.questions[i].user_answer == 'undefined'){
          pass=false;
        }
      }
      if(pass){
        this.$emit('updateStep','Step2');
      }
    },
    setQuestionAnswer(question_id,answer_id){
      const index = this.questions.findIndex(object => {
        return object.id === question_id;
      });
      this.questions[index].user_answer=answer_id;
    }
  }
}
</script>

<style scoped>

</style>