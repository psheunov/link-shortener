<template>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <p class="h2 mb-3">Сокрощатель ссылок</p>
        <shorter-form
            @afterSend="afterSend"
            :action="createAction"
        />

        <div v-for="item in data.items">
            <a target="_blank" :href="item.short_link">{{ item.short_link }}</a>
        </div>
    </div>
</template>

<script>
import ShorterForm from "./ShorterForm.vue";
import {onMounted, reactive} from "vue";

import axios from "axios";

export default {
    name: "Shortener",
    components: {ShorterForm},

    props: {
        createAction: {
            type: String,
            default: ''
        },

        latestAction: {
            type: String,
            default:
                ''
        }
    },

    setup(props) {
        const data = reactive({
            items: [],
            apiLoaded: false
        })

        onMounted(() => {
            getLatestLinks();
        })

        async function getLatestLinks() {
            axios.get(props.latestAction)
                .then(response => {
                    data.items = response.data;
                })
                .catch(error => {

                })
        }

        function afterSend() {
            getLatestLinks()
        }

        return {
            data,
            getLatestLinks,
            afterSend
        }
    }
}

</script>
