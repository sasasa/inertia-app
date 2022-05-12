<template>
    <nav>
        <ul>
            <li>
              <Link
                :class="{ active: $page.url === '/' }"
                href="/">Home</Link>
            </li>
            <li>
              <Link
                :class="{ active: $page.url === '/books' }"
                href="/books">Books</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/inertia-vue3';
</script>

<style scoped>
.active {
    font-weight: bold;
    color: navy;
    text-decoration: none;
}
</style>