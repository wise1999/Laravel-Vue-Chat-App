<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ this.room.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <message-container :messages="messages" />
                    <input-message
                        :room="this.room"
                        v-on:messageSent="getMessages()"
                    />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import MessageContainer from "./messageContainer.vue";
import InputMessage from "./inputMessage.vue";
import axios from "axios";

export default {
    components: { AppLayout, MessageContainer, InputMessage },
    data: function () {
        return {
            currentRoom: [],
            messages: [],
        };
    },
    watch: {
        messages: function (oldVal, newVal) {
            this.getMessages();
        },
    },
    props: {
        room: Object,
    },
    methods: {
        connect() {
            if (this.room.id) {
                let vm = this;
                this.getMessages();
                window.Echo.private("chat." + this.room.id).listen(
                    ".message.new",
                    (e) => {
                        vm.getMessages();
                    }
                );
            }
        },
        disconnect(room) {
            window.Echo.leave("chat." + room.id);
        },
        setRoom(room) {
            this.currentRoom = room;
        },
        getMessages() {
            axios
                .get("/chat/room/" + this.room.id + "/messages")
                .then((response) => {
                    this.messages = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.getMessages();
    },
};
</script>
