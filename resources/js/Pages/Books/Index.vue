<template>
    <Head>
        <title>User一覧</title>
    </Head>

    <ul>
        <li v-for="book in books.data" :key="book.id">
            <Link :href="`/books/${book.id}`" v-text="book.title"/>
        </li>
    </ul>

    <div>
        <ul>
            <li v-for="link in books.links" :key="link.url">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    v-html="link.label"
                />
                <span
                    v-if="!link.url"
                    v-html="link.label"
                />
            </li>
        </ul>
    </div>
    <div>
        <Link href="/books/create">Create</Link>
    </div>
</template>

<script setup lang="ts">
import { Link, useForm, Head } from '@inertiajs/inertia-vue3';

interface BookModel {
    id: number;
    title: string;
    author: string;
}
interface LinkModel {
    url: string;
    label: string;
}

interface Props {
    books: {
        data: Array<BookModel>,
        links: Array<LinkModel>,
    },
}

const props = defineProps<Props>();
</script>