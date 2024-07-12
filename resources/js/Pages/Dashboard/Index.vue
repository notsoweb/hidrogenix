<script setup>
import Welcome from '@/Components/Dashboard/Welcome.vue';
import Layout  from '@/Layouts/DashboardLayout.vue';
</script>

<template>
    <Layout title="Dashboard">
        <div class="py-4">
            Bienvenido, <b>{{ $page.props.user.name }}</b>.
        </div>
    </Layout>
</template>
