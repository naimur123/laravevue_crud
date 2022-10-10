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
            <button class="col-md-4 my-2 btn btn-success" @click="save" >{{ isEdit ? 'Update': 'Save' }}</button>
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
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <!-- <tbody v-for="student in list" :key="student.id"> -->
                    <!-- <tbody v-for="student in list" :key="student.id"> -->
                    <tbody v-for="(student,key) in list" :key="student.id">
                        <tr>
                            <td >{{ key }}</td>
                            <td>{{ student.name }}</td>
                            <td>{{ student.subject }}</td>
                            <td>{{ student.number }}</td>
                            <td>
                                <button
                                    class="btn btn-warning pl-2"
                                    @click="updateStudent(student,student.id)"
                            >Edit</button>
                                <button
                                        class="btn btn-danger"
                                        @click="deleteStudent(student.id)"
                                >Delete</button>
                            </td>
                            
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
                
                list:[],

                item:{
                    name:'',
                    subject:'',
                    number:''
                },
                isEdit: false,
                temp_id: null

            }

        },
        mounted() {
            this.fetchAll()
        },
        methods:{
          fetchAll(){
            try{
                axios.get('/student')
               .then(res=> this.list = res.data)
            }catch(e){
               console.log(e)
            }
               
            },
           save(){
            let method = axios.post;
            let url = '/student/store';
            if(this.temp_id != null){
                method = axios.post;
                url = `/student/update/${this.temp_id}`
            }
            try{
                // axios.post('/student/store', this.item)
                // .then(res=>(
                //      this.fetchAll()
                // ))
                method(url, this.item).then(res => {
                        this.fetchAll()
                        this.item = {
                            name: "",
                            subject: "",
                            number: ""
                        }
                        this.temp_id = null
                        this.isEdit = false
                    })


            }catch(e){
                console.log(e)
            }
           },
           updateStudent(student,id){
            console.log(id)
              this.item ={
                name : student.name,
                subject: student.subject,
                number: student.number


              }
              this.isEdit = true
              this.temp_id = id
            //   try{
            //     axios.put(`/student/update/${id}`,this.item).then(
            //         res=>(
            //             this.fetchAll()
            //         )
            //     )

            //   }catch(e){
            //     console.log(e)
            //   }

           },
           
           deleteStudent(id){
            console.log(id)
            try{
                axios.post(`/student/delete/${id}`).then(res=> {
                this.fetchAll()
               })
            }catch(e){
                console.log(e)
            }
               
           }
        }
        
    }
</script>