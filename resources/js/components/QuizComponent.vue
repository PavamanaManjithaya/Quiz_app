<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online Exam
                        <span class="float-right">{{questionIndex}}/{{questions.length}}</span>
                    </div>

                    <div class="card-body">
                        <div v-for="(question,index) in questions" :key="index">
                            <div v-show="index===questionIndex">
                           {{question.question}}
                           <ol>
                           <li v-for="choice in question.answers" :key="choice">
                               <label for="">
                                   <input type="radio" name="" class="">{{choice.answer}}
                               </label>
                           </li>
                           </ol>
                        
                        <button class="btn btn-success float-right" @click="prev"> Prev</button>
                         <button class="btn btn-success float-left" @click="next"> Next</button>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['quizId','quizQuestions','hasQuizPlayes','times'],
        data(){
            return{
                    questions:this.quizQuestions,
                    questionIndex:1,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            next(){
                this.questionIndex++
            },
            prev(){
                this.questionIndex--
            }
        }
    }
</script>
