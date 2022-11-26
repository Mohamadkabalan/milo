<template>
  <div class="container py-5 seller-signup">
    <h2>Add Question</h2>
    <form  method="post" data-vv-scope="question-form" @submit.prevent="questionAction('question-form')">
      <div class="form-group margin_b_20" :class="[errors.has('question.question', 'question-form') ? 'has-error' : '' ]">
        <label for="question" class="mandatory label-style form-labels">Question</label>
        <input type="text" id="question" name="question" placeholder="Question" class="form-control" v-model="question.question" v-validate="'required'" data-vv-as="&quot;Question&quot;" required style="width:80%;">
        <span class="control-error"  v-text="errors.first('question.question','question-form')"></span>
      </div>

      <div class="form-group margin_b_20" :class="[errors.has('question.weight', 'question-form') ? 'has-error' : '' ]">
        <label for="weight" class="mandatory label-style form-labels">Weight</label>
        <input type="number" id="weight" name="weight" placeholder="Weight" class="form-control" v-model="question.weight" v-validate="'required'" data-vv-as="&quot;Weight&quot;" required style="width:80%;">
        <span class="control-error"  v-text="errors.first('question.weight','question-form')"></span>
      </div>

      <p>Answers</p>
      <div v-for="(answer,index) in question.answers" :key="index" class="form-group margin_b_20" :class="[errors.has(question.answers[index].answer, 'question-form') ? 'has-error' : '' ]">
        <input type="text" id="" :name="`question`+index" placeholder="Answer" class="form-control" v-model="question.answers[index].answer" v-validate="'required'" data-vv-as="&quot;Question&quot;" required style="width:80%;display:inline;margin-right: 20px;">
        <span class="far fa-trash-alt" v-on:click="removeAnswer(index)" style="cursor:pointer;"></span>
      </div>
      <div>

        <span class="fas fa-plus" v-on:click="addAnswer()" style="cursor:pointer;">Add Answer</span>
      </div>
      <div>
        <p class="control-error" v-text="errorMessage"></p>
      </div>
      <div class="submit-container box-section__action">
        <input id="custom-submit-button" type="submit" value="Save" class="btn btn-primary">
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props:['data'],
  data() {
    return {
         question:{
           weight:'',
           question:'',
           answers:[]
         },
         errorMessage:''
     }
  },
  mounted() {
    if(typeof this.data != 'undefined'){
      this.question=this.data;
    }
  },
  methods: {
    questionAction(formScope) {
      console.log('form submitted');
      this.$validator.validateAll(formScope).then(result => {
        if(result){
          if(this.question.answers.length >= 3){
            let url ='';
            if(typeof this.question.id != "undefined"){
              url='/users/question/edit/'+this.question.id;
            }else{
              url='/users/question/create';
            }
            this.$http.post(url, {question:this.question}).then(response => {
              console.log(response);
              if(response.data.status=='success'){
                window.location='/users/questions';
              }else{
                this.errorMessage=response.data.message;
              }
            }).catch(error => {
            })
          }else{
            alert("you need to add at list 3 answers");
          }

        }
      });
    },
    addAnswer(){
      var obj = {};
      obj["answer"] = "";
      this.question.answers.push(obj);
    },
    removeAnswer(index){
      if(confirm('Are you sure you want delete the answer')){
        if (index > -1) { // only splice array when item is found
          this.question.answers.splice(index, 1); // 2nd parameter means remove one item only
        }
      }
    }
  }

}
</script>