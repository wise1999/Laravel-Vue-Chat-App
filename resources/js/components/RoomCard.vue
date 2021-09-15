<template>
    <div class="m-6">
        <div
            class="
                bg-white
                rounded-lg
                shadow
                px-6
                py-6
                flex
                justify-between
                items-center
            "
        >
            <Link
                class="
                    block
                    text-blue-500
                    hover:text-blue-600
                    font-semibold
                    text-lg
                    md:text-base
                    lg:text-lg
                "
                :href="route('show', { id: room.id })"
            >
                {{ room.name }}
            </Link>
            <Link :href="route('show', { id: room.id })">
                Join {{ room.name }}
            </Link>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    props: ["roomData"],
    components: {
        Link,
    },
    data() {
        return {
            room: this.roomData,
        };
    },
};
</script>
