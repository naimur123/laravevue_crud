<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center text-success">Input Student</h1>
            <div class="col-md-8 form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Enter name" class="form-control" v-model="item.name">
                
            </div>
            <div class="col-md-8 form-group">
                <label for="name">Subject</label>
                <input type="text" id="subject" placeholder="Enter subject" class="form-control" v-model="item.subject">
                
            </div>
            <div class="col-md-8 form-group">
                <label for="name">Number</label>
                <input type="number" id="number" class="form-control" v-model="item.number">
                
            </div>
            
            
            &nbsp;
            <button class="col-md-4 my-2 btn btn-success" @click="save">Submit</button>
        </div>
        <div class="row justify-content-center" v-if="list.length>0">
            <div class="col-md-8">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Number</th>
                        </tr>
                    </thead>
                    <!-- <tbody v-for="student in list" :key="student.id"> -->
                    <!-- <tbody v-for="student in list" :key="student.id"> -->
                    <tbody v-for="(student,key) in list" :key="student.key">
                        <tr>
                            <td >{{ key }}</td>
                            <td>{{ student.name }}</td>
                            <td>{{ student.subject }}</td>
                            <td>{{ student.number }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>


    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                count: 0,
                list:[],

                item:{
                    name:'',
                    subject:'',
                    number:''
                }
            }

        },
        mounted() {
            this.fetchAll()
        },
        methods:{
            increment(){
                this.count++
            },
          fetchAll(){
            try{
                axios.get('/student')
               .then(res=> this.list = res.data)
            }catch(e){
               console.log(e)
            }
               
            },
           save(){
            try{
                axios.post('/student/store', this.item)
                .then(res=>({

                }))

            }catch(e){
                console.log(e)
            }
           }
        }
        
    }
</script>