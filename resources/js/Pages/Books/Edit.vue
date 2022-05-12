<template>
    <Head>
        <title>User更新</title>
    </Head>
    <form @submit.prevent="submit">
        <div>
            Title:
            <input v-model="form.title" type="text">
            <span v-if="form.errors.title">{{ form.errors.title }}</span>
        </div>
        <div>
            Author:
            <input v-model="form.author" type="text">
            <span v-if="form.errors.author">{{ form.errors.author }}</span>
        </div>
        <div>
            <button type="submit" :disabled="form.processing">Submit</button>
        </div>
    </form>
</template>

<script setup lang="ts">
import { useForm, Head } from '@inertiajs/inertia-vue3';

interface BookModel {
    id: number;
    title: string;
    author: string;
}

interface Props {
    book: BookModel;
}

const props = defineProps<Props>();

let form = useForm({
    title: props.book.title,
    author: props.book.author,
});

let submit = () => {
    form.patch(`/books/${props.book.id}`);
};
</script>