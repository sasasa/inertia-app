<template>
    <Head>
        <title>User新規作成</title>
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

let form = useForm({
    title: '',
    author: '',
});

let submit = () => {
    form.post('/books');
};
</script>