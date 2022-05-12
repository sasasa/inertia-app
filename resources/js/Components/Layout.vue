<template>
    <header>
        <h1 style="text-align: center">Logo</h1>
        <Nav />
    </header>
    <main>
        <slot />
    </main>
</template>

<script setup lang="ts">
import Nav from './Nav.vue';
</script>