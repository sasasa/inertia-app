<template>
    <Head>
        <title>User確認</title>
    </Head>

    <div>
        title: {{ book.title }}
    </div>
    <div>
        author: {{ book.author }}
    </div>

    <div>
        <Link :href="`/books/${book.id}/edit`">Edit</Link>
    </div>
    <div>
        <Link :href="`/books/${book.id}`" method="delete">Delete</Link>
    </div>
</template>

<script setup lang="ts">
import { Link, useForm, Head } from '@inertiajs/inertia-vue3';

interface BookModel {
    id: number;
    title: string;
    author: string;
}

interface Props {
    book: BookModel;
}

const props = defineProps<Props>();
</script>
