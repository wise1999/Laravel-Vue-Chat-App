<template>
    <div class="h-96 w-full">
        <div class="h-full p-2 flex flex-col-reverse overflow-y-scroll">
            <div v-for="(message, index) in messages" :key="index">
                <div>{{ message.user.name }}: {{ message.message }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["messages"],
};
</script>
