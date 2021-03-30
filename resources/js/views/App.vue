<template>
    <div class="d-flex justify-content-center">
        <div class="container row mt-5">
            <div class="alert alert-danger" v-if="Object.keys(errors).length > 0">
                <ul>
                    <template v-for="error in errors">
                        <li v-for="message in error" :key="message">
                            {{message}}
                        </li>
                    </template>
                </ul>
            </div>
            <div class="alert alert-success" v-if="message.length">
                <span>{{message}}</span>
            </div>
            <form @submit.prevent="sendRequest" class="w-100">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="form-control" v-model="request.name">
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="tel" name="phone" id="phone" class="form-control" v-model="request.phone">
                </div>
                <div class="form-group">
                    <label for="text">Текст</label>
                    <textarea name="text" id="text" class="form-control" v-model="request.text"></textarea>
                </div>
                <button class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>

</template>
<script>


export default {
    computed: {},
    data() {
        return {
            request:{},
            errors:{},
            message:'',

        }
    },
    methods:{
        sendRequest(){
            axios.post('/', this.request)
            .then(response => {
                const data = response.data
                if (!data.success){
                    this.message = ''
                    return  this.errors = data.errors
                }
                this.errors = {}
                this.message = data.message
                this.request = {}
            })
        }
    }
};
</script>
