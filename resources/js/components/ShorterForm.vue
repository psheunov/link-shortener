<template>
    <form class="flex-column" @submit.prevent="submit">
        <div v-if="data.error" class="alert alert-danger" role="alert">
            {{ data.error }}
        </div>

        <div class="row g-3 d-flex">
            <div class="col-auto">
                <label for="link" class="visually-hidden">Link</label>
                <input v-model="data.link" type="text" class="form-control" id="link" placeholder="Link">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Сократить</button>
            </div>
        </div>
    </form>
</template>

<script>
import {reactive} from "vue"
import axios from "axios"

export default {
    name: "LinkForm",
    props: {
        action: {
            type: String,
            default: ''
        },
    },
    setup(props, {emit}) {
        const data = reactive({
            link: '',
            error: '',
            apiLoaded: false
        })

        async function submit() {
            data.error = '';
            axios.post(props.action, {original_link: data.link})
                .then(response => {
                    emit('afterSend')
                    data.link = '';
                })
                .catch(error => {
                    data.error = error.response.data.message;
                })
        }

        return {
            data,
            submit
        }
    }
}
</script>
